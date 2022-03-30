<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contribute - वैदिक संस्कृति संस्थानं</title>
    <?php include('../components/head.php') ?>
    <link rel="stylesheet" href="../assets/styles/styles.css" />
    <link rel="stylesheet" href="../assets/styles/toolsstyles.css" />
    <link rel="stylesheet" href="../assets/styles/globalstyles.css" />
</head>

<body>
    <?php include('../components/header.php') ?>
    <div class="pages-heading-container">
        <h1 class="lato-bold">अपना योगदान दीजिए</h1>
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
        <p>
            आप भी हमारे इस प्रयास में भागीदार बने और अपने मुहावरों को हमें भेजें। आवश्यकता पड़ने पर हम आपसे संपर्क भी कर सकते हैं।
        </p>
        <form style="display:block;">
            <p class="lato-semi-bold" id="idiom-contribution">
                अपना मुहावरा लिखें *<br />
                <span class="lato-regular small-text">
                    देवनागरी (हिन्दी) लिपि में या रोमन (अंग्रेजी) लिपि में
                </span>
            </p>
            <input type="text" class="input-box lato-regular" name="search-idioms">
            <p class="form-input-heading lato-semi-bold" id="name">
                आपका नाम *
            </p>
            <input type="text" class="input-box lato-regular" required name="search-idioms"><br /><br />
            <p class="form-input-heading lato-semi-bold" id="email">
                आपका इ-मेल पता *
            </p>
            <input type="text" class="input-box lato-regular" required name="search-idioms"><br /><br />
            <p class="form-input-heading lato-semi-bold" id="phone">
                आपका फ़ोन नंबर
            </p>
            <input type="text" class="input-box lato-regular" name="search-idioms">
            <input type="submit" class="submit-button lato-regular" value="मेरा सुझाव भेजें" id="submit" />
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $("#vision-switch").click(function() {
                if ($("#vision-switch").is(':checked')) {
                    $(".pages-content-container>p").text("आप भी हमारे इस प्रयास में भागीदार बने और अपने मुहावरों को हमें भेजें। आवश्यकता पड़ने पर हम आपसे संपर्क भी कर सकते हैं।")
                    $(".pages-heading-container>h1").text("अपना योगदान दीजिए")
                    $("#idiom-contribution").html(`अपना मुहावरा लिखें *<br />
                <span class="lato-regular small-text">
                    देवनागरी (हिन्दी) लिपि में या रोमन (अंग्रेजी) लिपि में
                </span`)
                    $("#name").text("आपका नाम *")
                    $("#email").text("आपका इ-मेल पता *")
                    $("#phone").text("आपका फ़ोन नंबर")
                    $("#submit").val("मेरा सुझाव भेजें")
                } else {
                    $(".pages-content-container>p").text("You can also be a part of our vision to cultivate the culture of Hindi in India by sending your idiom to use. If needed, we will contact you for further discussion.")
                    $(".pages-heading-container>h1").text("Your Contribution")
                    $("#idiom-contribution").html(`Your Idiom *<br />
                <span class="lato-regular small-text">
                    In Devanagari (Hindi) script or Roman (English) script 
                </span`)
                    $("#name").text("Your name *")
                    $("#email").text("Your e-mail address*")
                    $("#phone").text("Your phone number")
                    $("#submit").val("Submit")
                }
            });
        });
    </script>
</body>

</html>