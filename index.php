<?php
$conn = mysqli_connect('localhost', 'root', 'nf16Mysql', 'vaidic_sanskriti_sansthaanam');
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}

$sqlallidioms = "SELECT english_muhavra,hindi_muhavra FROM idioms";
$resultallidioms = mysqli_query($conn, $sqlallidioms);
$allidioms = mysqli_fetch_all($resultallidioms, MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>वैदिक संस्कृति संस्थानं</title>
    <?php include('./components/head.php') ?>
    <link rel="stylesheet" href="./assets/styles/styles.css" />
    <link rel="stylesheet" href="./assets/styles/toolsstyles.css" />
    <link rel="stylesheet" href="./assets/styles/globalstyles.css" />

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
            <div class="switch-container">
                <span class="switch-options lato-regular">English</span>
                <label class="switch">
                    <input id="vision-switch" type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
                <span class="switch-options lato-regular">हिंदी</span>
            </div>
            <div class="vision-sub-section">
                <h2 class="subsectionheading lato-bold">हमारा उद्देश्य</h2>
                <p class="maintext lato-regular">वर्ष 2011 की जनगणना के अनुसार भारत में 121 भाषाएँ हैं जबकि यूरोप में केवल 24! इन 121 भाषाओं में से प्रत्येक में अभिव्यक्तियों का समृद्ध भंडार है जोकि उस समय प्रचलित ज्ञानसागर को गागर में समेटे है। इस वेबसाइट का उद्देश्य भारत की आधुनिक पीढ़ी और भावी पीढ़ियों के लिए इस विशाल भाषाई सांस्कृतिक विरासत को संजोना और बढ़ावा देना है। आधुनिक युग का इलेक्ट्रोनिक मीडिया और उसी तरह यह वेबसाइट इस कार्य के लिए उत्कृष्ट माध्यम है। यह उत्तर प्रदेश भारत में पंजीकृत न्यास वैदिक संस्कृति संस्थानम् (www.mantrayoga.org) की एक पहल है। हमारे इस प्रयास में आपके किसी भी प्रकार के योगदान का हम स्वागत करते हैं!</p>
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
        fetch("./assets/resources/popularidioms.json")
            .then(response => response.json())
            .then(data => {
                $(document).ready(function() {
                    for (var i = 0; i < data.length; i++) {
                        $("#important-idioms-container").append("<div class='popular-idioms-box lato-regular'>" + data[i] + "</div>")
                        $("#famous-idioms-container").append("<div class='popular-idioms-box lato-regular'>" + data[i] + "</div>")
                    }
                })
            })
            .catch(error => console.log(error));
    </script>
    <script>
        $(window).on('scroll', function() {
            if ($(window).scrollTop() >= 200) {
                $("#sub-header").addClass("header-animation");
            }
            if ($(window).scrollTop() < 200) {
                $("#sub-header").removeClass("header-animation");
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#mobile-menu-icon").click(function() {
                if ($(".mobile-menu-icon-bar").hasClass("fa-times")) {
                    $(".mobile-menu-icon-bar").removeClass("fa-times").addClass("fa-bars")
                    $("#mobile-menu-dropdown").slideUp(300)
                    $("#header").removeClass("header-menu-open");
                } else if ($(".mobile-menu-icon-bar").hasClass("fa-bars")) {
                    $("#mobile-menu-dropdown").slideDown(300)
                    $("#header").addClass("header-menu-open");
                    $(".mobile-menu-icon-bar").removeClass("fa-bars").addClass("fa-times")
                }
            })
        })
    </script>
    <script>
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
    </script>
    <script>
        function changeidiom() {
            var searchvalue = document.getElementById("search-idioms").value.trim();
            if (searchvalue && searchvalue.length > 3) {
                var allidioms = <?php echo json_encode($allidioms); ?>;
                if ((searchvalue[0].charCodeAt(0) >= 65 && searchvalue[0].charCodeAt(0) <= 90) || (searchvalue[0].charCodeAt(0) >= 97 && searchvalue[0].charCodeAt(0) <= 122)) {
                    allidioms = allidioms.map(i => {
                        return i.english_muhavra
                    });
                } else {
                    allidioms = allidioms.map(i => {
                        return i.hindi_muhavra
                    });
                }
                // console.log("allidioms", allidioms)
                var allidiomsarray = [];
                var re = new RegExp(searchvalue, "gi");
                for (var i = 0; i < allidioms.length; i++) {
                    var score = allidioms[i].match(re) ? allidioms[i].match(re).length : 0;
                    if (score > 0) {
                        allidiomsarray.push({
                            idiom: allidioms[i],
                            score: score
                        });
                    }
                }
                allidiomsarray = allidiomsarray.sort(function(a, b) {
                    return (b.score - a.score);
                }).slice(0, 10);
                if (allidiomsarray.length > 0) {
                    $(".idiomssuggestions").css("display", "block")
                } else {
                    $(".idiomssuggestions").css("display", "none")
                }

                var searchsuggestionshtml = ""
                for (var i = 0; i < allidiomsarray.length; i++) {
                    searchsuggestionshtml = searchsuggestionshtml + "<li>" + allidiomsarray[i].idiom + "</li>";
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