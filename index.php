<?php
include('./db_connect.php');
include('./assets/resources/popularIdioms.php');
$allidioms = array();
try {
    $sqlallidioms = "SELECT id,english_muhavra,hindi_muhavra,`count` FROM idioms";
    $resultallidioms = mysqli_query($conn, $sqlallidioms);
    while ($row = mysqli_fetch_assoc($resultallidioms)) {
        $allidioms[] = $row;
    }
    mysqli_free_result($resultallidioms);
    mysqli_close($conn);
} catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>मात्रुशिक्षा - Apne priya muhaavro ke arth dhoondhe</title>
    <meta name="description" content="Apne priya muhaavro ke arth dhoondhe. Pramukh Hindi muhaavro ka vaakya me upyog, muhaavro ki uchchaaran or arth dhoondhe.">
    <link rel="canonical" href="https://www.maatrushiksha.org" />
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
    <div class="landing-background">
        <div class="landing-mainsection">
            <div class="landing-mainsubsection">
                <h1 class="main-heading lato-bold">अपने प्रिय मुहावरों के अर्थ ढूंढें </h1>
                <form method="POST" action="idioms-results.php" style="display:block;">
                    <input type="text" onkeyup="changeidiom()" class="input-box searchidioms lato-regular" id="search-idioms" name="search-idioms"><button type="submit" name="submit" class="search-idioms-button"><i class="fa fa-search"></i></button>
                </form>
                <div class="idiomssuggestions" style="display:none">
                    <ul class="search-suggestions lato-regular" id="search-suggestions"></ul>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="vision-section content-section">
            <div class="switch-container" style="float:right;">
                <span class="switch-options lato-regular">English</span>
                <label class="switch">
                    <input id="vision-switch" type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
                <span class="switch-options lato-regular">हिंदी</span>
            </div>
            <div class="vision-sub-section">
                <h2 class="subsectionheading lato-bold">हमारा उद्देश्य</h2>
                <p class="maintext lato-regular" style="text-align:left;">वर्ष 2011 की जनगणना के अनुसार भारत में 121 भाषाएँ हैं जबकि यूरोप में केवल 24! इन 121 भाषाओं में से प्रत्येक में अभिव्यक्तियों का समृद्ध भंडार है जोकि उस समय प्रचलित ज्ञानसागर को गागर में समेटे है। इस वेबसाइट का उद्देश्य भारत की आधुनिक पीढ़ी और भावी पीढ़ियों के लिए इस विशाल भाषाई सांस्कृतिक विरासत को संजोना और बढ़ावा देना है। आधुनिक युग का इलेक्ट्रोनिक मीडिया और उसी तरह यह वेबसाइट इस कार्य के लिए उत्कृष्ट माध्यम है। यह उत्तर प्रदेश भारत में पंजीकृत न्यास वैदिक संस्कृति संस्थानम् (www.mantrayoga.org) की एक पहल है। हमारे इस प्रयास में आपके किसी भी प्रकार के योगदान का हम स्वागत करते हैं!</p>
            </div>
        </div>
    </div>
    <div class="content-container">
        <div class="content-section">
            <h2 class="subsectionheading lato-bold">महत्वपूर्ण मुहावरे</h2>
            <div id="important-idioms-container" class="popular-idioms-container"></div>
        </div>
    </div>
    <div class="content-container">
        <div class="content-section">
            <h2 class="subsectionheading lato-bold">लोकप्रिय मुहावरे</h2>
            <div id="famous-idioms-container" class="popular-idioms-container"></div>
        </div>
    </div>
    <?php include('./components/footer.php') ?>
    <script>
        var allidioms = <?php echo json_encode($allidioms); ?>;
        var popularidioms = allidioms.sort(function(a, b) {
            return b.count - a.count
        }).slice(0, 20);
        var importantIdioms = <?php echo json_encode($popularIdioms); ?>;
        $(document).ready(function() {
            for (var i = 0; i < importantIdioms.length; i++) {
                $("#important-idioms-container").append("<div class='popular-idioms-box lato-regular'><a class='unstyled-link' href='/idiom.php?id=" + (allidioms.filter(ai => (ai.hindi_muhavra == importantIdioms[i]))[0] ? allidioms.filter(ai => (ai.hindi_muhavra == importantIdioms[i]))[0].id : "") + "'>" + importantIdioms[i] + "</a></div>")
            }
        })
        for (var i = 0; i < popularidioms.length; i++) {
            $("#famous-idioms-container").append("<a class='unstyled-link' href='/idiom.php?id=" + (popularidioms[i].id) + "'><div class='popular-idioms-box lato-regular'>" + popularidioms[i].hindi_muhavra + "</div></a>")
        }
        $(window).on('scroll', function() {
            if ($(window).scrollTop() >= 200) {
                $("#sub-header").addClass("header-animation");
            }
            if ($(window).scrollTop() < 200) {
                $("#sub-header").removeClass("header-animation");
            }
        });
        $(document).ready(function() {
            $("#vision-switch").click(function() {
                if ($("#vision-switch").is(':checked')) {
                    $(".vision-sub-section>h2").text("हमारा उद्देश्य")
                    $(".vision-sub-section>p").text("वर्ष 2011 की जनगणना के अनुसार भारत में 121 भाषाएँ हैं जबकि यूरोप में केवल 24! इन 121 भाषाओं में से प्रत्येक में अभिव्यक्तियों का समृद्ध भंडार है जोकि उस समय प्रचलित ज्ञानसागर को गागर में समेटे है। इस वेबसाइट का उद्देश्य भारत की आधुनिक पीढ़ी और भावी पीढ़ियों के लिए इस विशाल भाषाई सांस्कृतिक विरासत को संजोना और बढ़ावा देना है। आधुनिक युग का इलेक्ट्रोनिक मीडिया और उसी तरह यह वेबसाइट इस कार्य के लिए उत्कृष्ट माध्यम है। यह उत्तर प्रदेश भारत में पंजीकृत न्यास वैदिक संस्कृति संस्थानम् (www.mantrayoga.org) की एक पहल है। हमारे इस प्रयास में आपके किसी भी प्रकार के योगदान का हम स्वागत करते हैं!")
                } else {
                    $(".vision-sub-section>h2").text("Our Vision")
                    $(".vision-sub-section>p").text("As per the 2011 census, there are 121 languages in India while Europe has only 24! Each of these 121 languages have a rich repertoire of expressions that are succinct but carry deep knowledge prevalent in its times. The purpose of this website is preserving and promoting this vast linguistic cultural heritage of Bharat for the modern generation and for the future generations to come! The electronic media of the modern age is the perfect tool for this and so this website. Organizationally it is an initiative of Vedic Sanskriti Sansthanam (www.mantrayoga.org), a trust registered in U.P. India. We welcome any and all contributions in this endeavor!")
                }
            });
        });

        function changeidiom() {
            var searchvalue = document.getElementById("search-idioms").value.trim();
            if (searchvalue && searchvalue.length > 3) {
                if ((searchvalue[0].charCodeAt(0) >= 65 && searchvalue[0].charCodeAt(0) <= 90) || (searchvalue[0].charCodeAt(0) >= 97 && searchvalue[0].charCodeAt(0) <= 122)) {
                    var relevantallidioms = allidioms.map(i => {
                        return {
                            id: i.id,
                            idiom: i.english_muhavra
                        }
                    });
                } else {
                    var relevantallidioms = allidioms.map(i => {
                        return {
                            id: i.id,
                            idiom: i.hindi_muhavra
                        }
                    });
                }
                // console.log("allidioms", allidioms)
                var allidiomsarray = [];
                var re = new RegExp(searchvalue, "gi");
                for (var i = 0; i < relevantallidioms.length; i++) {
                    var score = relevantallidioms[i].idiom.match(re) ? relevantallidioms[i].idiom.match(re).length : 0;
                    if (score > 0) {
                        allidiomsarray.push({
                            id: relevantallidioms[i].id,
                            idiom: relevantallidioms[i].idiom,
                            score: score
                        });
                    }
                }
                var relevantallidiomsarray = allidiomsarray.sort(function(a, b) {
                    return (b.score - a.score);
                }).slice(0, 10);
                if (relevantallidiomsarray.length > 0) {
                    $(".idiomssuggestions").css("display", "block")
                } else {
                    $(".idiomssuggestions").css("display", "none")
                }

                var searchsuggestionshtml = ""
                for (var i = 0; i < relevantallidiomsarray.length; i++) {
                    searchsuggestionshtml = searchsuggestionshtml + "<a class='unstyled-link' href='/idiom.php?id=" + relevantallidiomsarray[i].id + "'><li>" + relevantallidiomsarray[i].idiom + "</li></a>";
                }
                $("#search-suggestions").html(searchsuggestionshtml);
            } else {
                $(".idiomssuggestions").css("display", "none")
                $("#search-suggestions").html("");
            }
        }
    </script>
</body>

</html>