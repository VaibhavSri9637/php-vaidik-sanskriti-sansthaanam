<?php
$conn = mysqli_connect('localhost', 'root', 'nf16Mysql', 'vaidic_sanskriti_sansthaanam');
$searchvalue = "";
$language = "hindi";
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}
if (isset($_POST['submit'])) {
    if (empty($_POST['search-idioms'])) {
        $error = 'No input';
    } else {
        $searchvalue = htmlspecialchars($_POST['search-idioms']);
        if ((ord($searchvalue) >= 65 && ord($searchvalue) <= 90) || (ord($searchvalue) >= 97 && ord($searchvalue) <= 122)) {
            $language = "english";
        } else {
            $language = "hindi";
        }
        $sql = "SELECT * FROM idioms WHERE MATCH (english_muhavra,hindi_muhavra) AGAINST ('" . $searchvalue . "' IN NATURAL LANGUAGE MODE)";
        $result = mysqli_query($conn, $sql);
        $idioms = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <?php include('./components/head.php') ?>
    <link rel="stylesheet" href="./assets/styles/styles.css" />
    <link rel="stylesheet" href="./assets/styles/toolsstyles.css" />
    <link rel="stylesheet" href="./assets/styles/globalstyles.css" />
</head>

<body>
    <?php include('./components/header.php') ?>
    <div class="pages-heading-container">
        <h1 class="lato-bold"><?php if ($searchvalue && strlen($searchvalue) > 0) {
                                    if ($language == "english") {
                                        echo "Idioms for '" . $searchvalue . "'.";
                                    } else {
                                        echo "'" . $searchvalue . "' के लिए मुहावरे |";
                                    }
                                } ?></h1>
    </div>
    <div class="pages-content-container lato-regular">
        <?php foreach ($idioms as $idiom) { ?>
            <div class="idiomresultcontainer" id="searchresult<?php echo $idiom["id"] ?>">
                <div class="switch-container">
                    <span class="switch-options lato-regular">English</span>
                    <label class="switch">
                        <input id="vision-switch" onclick="clickcheckbox(<?php echo $idiom['id'] ?>)" type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                    <span class="switch-options lato-regular">हिंदी</span>
                </div>
                <h2 class="idiomresulttitle lato-semi-bold"><?php echo $language == "english" ? $idiom['english_muhavra'] : $idiom['hindi_muhavra'] ?></h2>
                <p class="idiomresulttext idiomresultmeaning lato">
                    <b><?php echo $language == "english" ? "Meaning: " : "अर्थ: " ?></b>
                    <?php echo $language == "english" ? $idiom['english_meaning'] : $idiom['hindi_meaning'] ?>
                </p>
                <?php if ($idiom['english_example']) { ?>
                    <p class="idiomresulttext idiomresultexample lato">
                        <b><?php echo $language == "english" ? "Example: " : "उदाहरण: " ?></b>
                        <?php echo $language == "english" ? $idiom['english_example'] : $idiom['hindi_example'] ?>
                    </p>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    <script>
        $(document).ready(function() {
            var language = '<?php echo $language; ?>';
            if (language == "english") {
                $(".idiomresultcontainer input[type=checkbox]").prop("checked", false);
            } else {
                $(".idiomresultcontainer input[type=checkbox]").prop("checked", true);
            }
        });
    </script>
    <script>
        function clickcheckbox(id) {
            var idioms = <?php echo json_encode($idioms); ?>;
            var idiom = idioms.filter(i => (i.id == id))[0];
            console.log("idiom", idiom)
            if ($("#searchresult" + idiom.id + " #vision-switch").is(':checked')) {
                $("#searchresult" + idiom.id + " .idiomresulttitle").text(idiom.hindi_muhavra);
                $("#searchresult" + idiom.id + " .idiomresultmeaning").text(idiom.hindi_meaning);
                $("#searchresult" + idiom.id + " .idiomresultexample").text(idiom.hindi_example);
            } else {
                $("#searchresult" + idiom.id + " .idiomresulttitle").text(idiom.english_muhavra);
                $("#searchresult" + idiom.id + " .idiomresultmeaning").text(idiom.english_meaning);
                $("#searchresult" + idiom.id + " .idiomresultexample").text(idiom.english_example);
            }
        }
    </script>
</body>

</html>