<?php
$searchvalue = "";
$language = "hindi";
include('./db_connect.php');
if (isset($_POST['submit']) && !empty(htmlspecialchars($_POST['search-idioms']))) {
    $error = 'No input';
    $searchvalue = htmlspecialchars($_POST['search-idioms']);
    if ((ord($searchvalue) >= 65 && ord($searchvalue) <= 90) || (ord($searchvalue) >= 97 && ord($searchvalue) <= 122)) {
        $language = "english";
    } else {
        $language = "hindi";
    }
    $sql = "SELECT * FROM idioms WHERE MATCH (english_muhavra,hindi_muhavra) AGAINST ('" . $searchvalue . "' IN NATURAL LANGUAGE MODE)";
    $result = mysqli_query($conn, $sql);
    $idioms = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $idioms[] = $row;
    }
    mysqli_free_result($result);
    mysqli_close($conn);
} else {
    header('Location: ');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $searchvalue ?> se jude hue muhaavro ke arth</title>
    <meta name="description" content="<?php echo $searchvalue ?> se jude hue muhaavro ke baar me jaaniye. Pramukh Hindi muhaavro ka vaakya me upyog, muhaavro ki uchchaaran or arth dhoondhe.">
    <link rel="canonical" href="https://www.maatrushiksha.org/idiom-results.php" />
    <meta name=”robots” content="index, follow">
    <?php include('./components/head.php') ?>
    <link rel="stylesheet" href="./assets/styles/styles.css" />
    <link rel="stylesheet" href="./assets/styles/toolsstyles.css" />
    <link rel="stylesheet" href="./assets/styles/globalstyles.css" />
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon-16.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32.ico">
    <link rel="icon" type="image/png" sizes="152x152" href="./favicon-152.ico">
    <link rel="icon" type="image/png" sizes="192x192" href="./favicon-192.ico">
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
                <h2 class="idiomresulttitle lato-bold"><?php echo $language == "english" ? $idiom['english_muhavra'] : $idiom['hindi_muhavra'] ?></h2>
                <div class="meaningcontainer">
                    <p class="idiomresulttext idiomresultmeaning lato">
                        <b><?php echo $language == "english" ? "Meaning: " : "अर्थ: " ?></b>
                        <?php echo $language == "english" ? $idiom['english_meaning'] : $idiom['hindi_meaning'] ?>
                    </p>
                    <?php if (file_exists("./assets/audio/" . $idiom['id'] . ".mp3")) { ?>
                        <button type="button" class="audiobutton" value="PLAY" onclick="play(<?php echo $idiom['id'] ?>)"><i class="fa-solid fa-volume-high"></i></button>
                        <audio id="audio" src="./assets/audio/<?php echo $idiom['id'] ?>.mp3"></audio>
                    <?php } ?>
                </div>
                <?php if ($idiom['english_example']) { ?>
                    <p class="idiomresulttext idiomresultexample lato">
                        <b><?php echo $language == "english" ? "Example: " : "उदाहरण: " ?></b>
                        <?php echo $language == "english" ? $idiom['english_example'] : $idiom['hindi_example'] ?>
                    </p>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    <?php include('./components/footer.php') ?>
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

        function play(id) {
            document.querySelector("#searchresult" + id + " #audio").play();
            $("#searchresult" + id + " .audiobutton").html('<i class="fa-solid fa-stop"></i>')
            $("#searchresult" + id + " .audiobutton").attr("onclick", "stopaudio(" + id + ")")
        }

        function stopaudio(id) {
            document.querySelector("#searchresult" + id + " #audio").pause();
            document.querySelector("#searchresult" + id + " #audio").currentTime = 0;
            $("#searchresult" + id + " .audiobutton").html('<i class="fa-solid fa-volume-high"></i>');
            $("#searchresult" + id + " .audiobutton").attr("onclick", "play(" + id + ")");
        }
    </script>
</body>

</html>