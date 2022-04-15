<?php
include('../db_connect.php');
$emailerror = '';
$contributionresponse = '';
if (isset($_POST["submit"])) {
    $idiom = mysqli_real_escape_string($conn, htmlspecialchars($_POST["idiom"]));
    $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST["username"]));
    $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST["email"]));
    $phone = mysqli_real_escape_string($conn, htmlspecialchars($_POST["phone"]));
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        global $emailerror;
        $emailerror = "This is not a valid email address";
    } else {
        $sqlcontribute = "INSERT INTO contributions (muhavra,name,email,phone) VALUES ('" . $idiom . "','" . $username . "','" . $email . "','" . $phone . "')";
        if (mysqli_query($conn, $sqlcontribute)) {
            global $contributionresponse;
            $contributionresponse = 'Congratulations! Your idiom has been submitted.';
        } else {
            $contributionresponse = 'I am sorry, there was some error in submitting your idiom. Please try again.';
        }
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>मात्रुशिक्षा - apne muhaavre ke saath apna yogdaan de</title>
    <meta name="description" content="Hume apna muhaavra bhej ke apna yogdaan de. Aapka muhaavra hum apni site me daalenge. Pramukh Hindi muhaavro ka vaakya me upyog, muhaavro ki uchchaaran or arth dhoondhe.">
    <link rel="canonical" href="https://www.maatrushiksha.org/contribute" />
    <meta name=”robots” content="index, follow">
    <?php include('../components/head.php') ?>
    <link rel="stylesheet" href="../assets/styles/styles.css" />
    <link rel="stylesheet" href="../assets/styles/toolsstyles.css" />
    <link rel="stylesheet" href="../assets/styles/globalstyles.css" />
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32.ico">
    <link rel="icon" type="image/png" sizes="152x152" href="../favicon-152.ico">
    <link rel="icon" type="image/png" sizes="192x192" href="../favicon-192.ico">
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
        <form method="POST" action="index.php" style="display:block;">
            <p class="lato-bold" id="idiom-contribution">
                अपना मुहावरा टाइप करें *<br />
                <span class="lato-regular small-text">
                    देवनागरी (हिन्दी) लिपि में या रोमन (अंग्रेजी) लिपि में
                </span>
            </p>
            <input type="text" class="input-box lato-regular" required name="idiom">
            <p class="form-input-heading lato-bold" id="name">
                आपका नाम *
            </p>
            <input type="text" class="input-box lato-regular" required name="username"><br /><br />
            <p class="form-input-heading lato-bold" id="email">
                आपका इ-मेल पता *
            </p>
            <input type="text" class="input-box lato-regular" required name="email">
            <?php
            if ($emailerror && strlen($emailerror) > 0) {
                echo '<p style="color:red;font-family:lato;">' . $emailerror . '</p>';
            } ?>
            <p class="form-input-heading lato-bold" id="phone">
                आपका फ़ोन नंबर
            </p>
            <input type="text" class="input-box lato-regular" name="phone">
            <input type="submit" name="submit" class="submit-button lato-regular" value="अपना सुझाव भेजें" id="submit" />
            <?php
            if ($contributionresponse && strlen($contributionresponse) > 0) {
                echo '<p style="color:' . ($contributionresponse == "Congratulations! Your idiom has been submitted." ? 'green' : 'red') . ';font-family:lato;">' . $contributionresponse . '</p>';
            } ?>
        </form>
    </div>
    <?php include('../components/footer.php') ?>
    <script>
        $(document).ready(function() {
            $("#vision-switch").click(function() {
                if ($("#vision-switch").is(':checked')) {
                    $(".pages-content-container>p").text("आप भी हमारे इस प्रयास में भागीदार बने और अपने मुहावरों को हमें भेजें। आवश्यकता पड़ने पर हम आपसे संपर्क भी कर सकते हैं।")
                    $(".pages-heading-container>h1").text("अपना योगदान दीजिए")
                    $("#idiom-contribution").html(`अपना मुहावरा टाइप करें *<br />
                <span class="lato-regular small-text">
                    देवनागरी (हिन्दी) लिपि में या रोमन (अंग्रेजी) लिपि में
                </span`)
                    $("#name").text("आपका नाम *")
                    $("#email").text("आपका इ-मेल पता *")
                    $("#phone").text("आपका फ़ोन नंबर")
                    $("#submit").val("अपना सुझाव भेजें")
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