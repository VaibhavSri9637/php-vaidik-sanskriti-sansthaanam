<?php
include('./db_connect.php');
$loggedin = false;
$contributionresponse = "";
$sqlallidioms = "SELECT id,english_muhavra,hindi_muhavra FROM idioms";
$resultallidioms = mysqli_query($conn, $sqlallidioms);
$allidioms = mysqli_fetch_all($resultallidioms, MYSQLI_ASSOC);

if (isset($_POST["submit"])) {
    global $loggedin;
    $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST["email"]));
    $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST["password"]));
    if ($email == "vaibhavsri9637@gmail.com" && $password == "1234") {
        $loggedin = true;
    }
}

if (isset($_POST["submit-idiom"])) {
    $hindiidiom = htmlspecialchars($_POST["hindi-idiom"]);
    $englishidiom = htmlspecialchars($_POST["english-idiom"]);
    $hindimeaning = htmlspecialchars($_POST["hindi-meaning"]);
    $englishmeaning = htmlspecialchars($_POST["english-meaning"]);
    $hindiexample = htmlspecialchars($_POST["hindi-example"]);
    $englishexample = htmlspecialchars($_POST["english-example"]);
    $createdby = htmlspecialchars($_POST["created-by"]) ? htmlspecialchars($_POST["created-by"]) : "";
    $sqlidiomadd = "INSERT INTO idioms (english_muhavra,hindi_muhavra,english_meaning,hindi_meaning,english_example,hindi_example,created_by) VALUES ('" . $englishidiom . "','" . $hindiidiom . "','" . $englishmeaning . "','" . $hindimeaning . "','" . $englishexample . "','" . $hindiexample . "','" . $createdby . "')";
    if (mysqli_query($conn, $sqlidiomadd)) {
        global $contributionresponse;
        $contributionresponse = 'Congratulations! Your idiom has been submitted.';
    } else {
        $contributionresponse = 'I am sorry, there was some error in submitting your idiom. Please try again.';
    }
    $loggedin = true;
}


if (isset($_POST["delete-idiom"])) {
    $idiomid = htmlspecialchars($_POST["idiom-id"]);
    $sqlidiomdelete = "DELETE FROM idioms WHERE id='" . $idiomid . "'";
    if (mysqli_query($conn, $sqlidiomdelete)) {
        global $contributionresponse;
        $contributionresponse = 'Congratulations! Your idiom has been deleted.';
    } else {
        $contributionresponse = 'I am sorry, there was some error in deleting your idiom. Please try again.';
    }
    $loggedin = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
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
        <h1 class="lato-bold">Admin</h1>
    </div>
    <div class="pages-content-container lato-regular">
        <?php if (!$loggedin) { ?>
            <form method="POST" action="admin.php" style="display:block;">
                <p class="form-input-heading lato-bold" id="email">
                    Email
                </p>
                <input type="text" class="input-box lato-regular" required name="email">
                <p class="form-input-heading lato-bold" id="phone">
                    Password
                </p>
                <input type="password" class="input-box lato-regular" name="password">
                <input type="submit" name="submit" class="submit-button lato-regular" value="Log in" id="submit" />
            </form>
        <?php } ?>
        <?php if ($loggedin) { ?>
            <button id="showaddidiomform" class="submit-button">Add Idiom to Database</button>
            <button id="showremoveidiomform" class="submit-button">Remove Idiom from Database</button>
            <p><?php echo $contributionresponse; ?></p>
            <div id="addidiomform" style="display:none;">
                <form method="POST" action="admin.php" style="display:block;">
                    <p class="lato-bold" id="idiom-contribution">
                        Hindi idiom
                    </p>
                    <input type="text" class="input-box lato-regular" required name="hindi-idiom">
                    <p class="lato-bold" id="idiom-contribution">
                        English idiom
                    </p>
                    <input type="text" class="input-box lato-regular" required name="english-idiom">
                    <p class="lato-bold" id="idiom-contribution">
                        Hindi meaning
                    </p>
                    <input type="text" class="input-box lato-regular" required name="hindi-meaning">
                    <p class="lato-bold" id="idiom-contribution">
                        English meaning
                    </p>
                    <input type="text" class="input-box lato-regular" required name="english-meaning">
                    <p class="lato-bold" id="idiom-contribution">
                        Hindi example
                    </p>
                    <input type="text" class="input-box lato-regular" required name="hindi-example">
                    <p class="lato-bold" id="idiom-contribution">
                        English example
                    </p>
                    <input type="text" class="input-box lato-regular" required name="english-example">
                    <p class="lato-bold" id="idiom-contribution">
                        Contributed By
                    </p>
                    <input type="text" class="input-box lato-regular" name="created-by">
                    <input type="submit" name="submit-idiom" class="submit-button lato-regular" value="Submit" id="submit" />
                </form>
            </div>
            <div id="removeidiomform" style="display:none;">
                <p class="lato-bold">
                    Enter your muhavra in Hindi exactly.
                </p>
                <input type="text" class="input-box lato-regular" name="hindi-idiom-delete-id">
                <button type="button" name="hindi-idiom-delete-submit" class="submit-button lato-regular" id="submit-delete-idiom">Get muhavra id</button>


                <form method="POST" id="delete-idiom" action="admin.php" style="display:none;">
                    <p class="lato-bold">
                        Idiom id
                    </p>
                    <input type="text" class="input-box lato-regular" name="idiom-id">
                    <input type="submit" name="delete-idiom" class="submit-button lato-regular" value="Delete" id="submit" />
                </form>
            </div>
        <?php } ?>
    </div>
    <?php include('./components/footer.php') ?>
    <script>
        var allidioms = <?php echo json_encode($allidioms); ?>;
        console.log("allidioms", allidioms)
        $(document).ready(function() {
            $("#showaddidiomform").click(function() {
                $("#addidiomform").css("display", "block")
            })
            $("#showremoveidiomform").click(function() {
                $("#removeidiomform").css("display", "block")
            })
            $("#showuploadaudioform").click(function() {
                $("#uploadaudioform").css("display", "block")
            })
            $("#submit-delete-idiom").click(function() {
                var inputidiomhindi = $("input[name=hindi-idiom-delete-id]").val();
                var hindiid = allidioms.filter(i => (i.hindi_muhavra == inputidiomhindi))[0].id;
                $("#delete-idiom").css("display", "block");
                $("input[name=idiom-id]").val(hindiid);
            })

        })
    </script>
</body>

</html>