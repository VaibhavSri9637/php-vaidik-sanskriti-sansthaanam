<?php
include('./db_connect.php');
$idiomid = htmlspecialchars($_GET["id"]);

$sqlidiom = "SELECT * FROM idioms WHERE id='" . $idiomid . "'";
$resultidiom = mysqli_query($conn, $sqlidiom);
$idiom = mysqli_fetch_assoc($resultidiom);
mysqli_free_result($resultidiom);
$sqlsimilaridioms = "SELECT id,english_muhavra,hindi_muhavra FROM idioms WHERE MATCH (english_muhavra,hindi_muhavra) AGAINST ('" . $idiom['hindi_muhavra'] . "' IN NATURAL LANGUAGE MODE)";
$resultsimilaridioms = mysqli_query($conn, $sqlsimilaridioms);
$similaridioms = array();
while ($row = mysqli_fetch_assoc($resultsimilaridioms)) {
    $similaridioms[] = $row;
}
print_r($similaridioms);
mysqli_free_result($resultsimilaridioms);

$sqlupdatecount = 'UPDATE idioms SET count = count+1 WHERE id=' . $idiomid;
mysqli_query($conn, $sqlupdatecount);

mysqli_close($conn);
$found = false;
foreach ($similaridioms as $key => $value) {
    if ($value['id'] == $idiom['id']) {
        $found = true;
        break;
    }
}
if ($found) {
    \array_splice($similaridioms, $key, 1);
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
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon-16.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32.ico">
    <link rel="icon" type="image/png" sizes="152x152" href="./favicon-152.ico">
    <link rel="icon" type="image/png" sizes="192x192" href="./favicon-192.ico">
</head>

<body>
    <?php include('./components/header.php') ?>
    <div class="pages-heading-container" id="mainheading">
        <h1 class="lato-bold"><?php if ($idiom['hindi_muhavra'] && strlen($idiom['hindi_muhavra']) > 0) {
                                    echo "'" . $idiom['hindi_muhavra'] . "'";
                                } ?></h1>
        <div class="switch-container">
            <span class="switch-options lato-regular">English</span>
            <label class="switch">
                <input id="vision-switch" type="checkbox" checked>
                <span class="slider round"></span>
            </label>
            <span class="switch-options lato-regular">हिंदी</span>
        </div>
    </div>
    <div class="pages-content-container lato-regular">
        <div class="idiomresultcontainer" id="searchresult">
            <h2 class="idiomresulttitle lato-bold"><?php echo $idiom['hindi_muhavra'] ?></h2>
            <div class="meaningcontainer">
                <p class="idiomresulttext idiomresultmeaning lato">
                    <b><?php echo "अर्थ: " ?></b>
                    <?php echo $idiom['hindi_meaning'] ?>
                </p>
                <?php if (file_exists("./assets/audio/" . $idiomid . ".mp3")) { ?>
                    <button type="button" class="audiobutton" value="PLAY" onclick="play()"><i class="fa-solid fa-volume-high"></i></button>
                    <audio id="audio" src="./assets/audio/<?php echo $idiom['id'] ?>.mp3"></audio>
                <?php } ?>
            </div>
            <?php if ($idiom['english_example']) { ?>
                <p class="idiomresulttext idiomresultexample lato">
                    <b><?php echo "उदाहरण: " ?></b>
                    <?php echo $idiom['hindi_example'] ?>
                </p>
            <?php } ?>
        </div>
    </div>
    <div class="pages-heading-container pages-more-heading-container">
        <h1 class="lato-bold">मिलते-जुलते मुहावरे</h1>
    </div>
    <div class="pages-content-container lato-regular">
        <div id="similar-idioms-container" class="popular-idioms-container"></div>
    </div>
    <?php include('./components/footer.php') ?>

    <script>
        var similaridioms = <?php echo json_encode($similaridioms); ?>;

        var idiom = <?php echo json_encode($idiom); ?>;
        $("#vision-switch").click(function() {
            console.log($("#searchresult #vision-switch").is(':checked'));
            if ($("#vision-switch").is(':checked')) {
                $("#mainheading h1").text(idiom.hindi_muhavra)
                $("#searchresult .idiomresulttitle").text(idiom.hindi_muhavra);
                $("#searchresult .idiomresultmeaning").html('<b>अर्थ: </b>' + idiom['hindi_meaning']);
                $("#searchresult .idiomresultexample").html('<b>उदाहरण: </b>' + idiom.hindi_example);
                $(".pages-more-heading-container h1").text("मिलते-जुलते मुहावरे");
                var similarhtml = ""
                for (var i = 0; i < similaridioms.length; i++) {
                    similarhtml = similarhtml + "<div class='popular-idioms-box lato-regular'><a class='unstyled-link' href='/idiom.php?id=" + similaridioms[i].id + "'>" + similaridioms[i].hindi_muhavra + "</a></div>"
                }
                $("#similar-idioms-container").html(similarhtml);
            } else {
                $("#mainheading h1").text(idiom.english_muhavra)
                $("#searchresult .idiomresulttitle").text(idiom.english_muhavra);
                $("#searchresult .idiomresultmeaning").html('<b>Meaning: </b>' + idiom.english_meaning);
                $("#searchresult .idiomresultexample").html('<b>Example: </b>' + idiom.english_example);
                $(".pages-more-heading-container h1").text("Similar idioms")
                var similarhtml = ""
                for (var i = 0; i < similaridioms.length; i++) {
                    similarhtml = similarhtml + "<div class='popular-idioms-box lato-regular'><a class='unstyled-link' href='/idiom.php?id=" + similaridioms[i].id + "'>" + similaridioms[i].english_muhavra + "</a></div>"
                }
                $("#similar-idioms-container").html(similarhtml);
            }
        })

        function play(id) {
            document.querySelector("#searchresult #audio").play();
            $("#searchresult .audiobutton").html('<i class="fa-solid fa-stop"></i>')
            $("#searchresult .audiobutton").attr("onclick", "stopaudio()")
        }

        function stopaudio(id) {
            document.querySelector("#searchresult #audio").pause();
            document.querySelector("#searchresult #audio").currentTime = 0;
            $("#searchresult .audiobutton").html('<i class="fa-solid fa-volume-high"></i>');
            $("#searchresult .audiobutton").attr("onclick", "play()");
        }
        $(document).ready(function() {
            var similarhtml = ""
            for (var i = 0; i < similaridioms.length; i++) {
                similarhtml = similarhtml + "<div class='popular-idioms-box lato-regular'><a class='unstyled-link' href='/idiom.php?id=" + similaridioms[i].id + "'>" + similaridioms[i].hindi_muhavra + "</a></div>"
            }
            $("#similar-idioms-container").html(similarhtml);
        })
    </script>
</body>

</html>