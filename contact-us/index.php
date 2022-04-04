<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact us - वैदिक संस्कृति संस्थानं</title>
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
        <h1 class="lato-bold">संपर्क करें</h1>
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
            वैदिक संस्कृति संस्थानम का उद्देश्य हमारी मातृभूमि भारत की निस्वार्थ सेवा है। हमारे भारत की हर वस्तु और हर व्यक्ति हमारे लिए पूजनीय है और सबसे उत्तम पूजा
            निस्वार्थ सेवा है। अभी तक इस संस्था ने गरीबों के बीच कोरोनामहामारी के कारण होने वाली भयावह मानवीय पीड़ा को कम करने के लिए थोड़ा सा योगदान दिया है। आगे यह संस्था बाल शिक्षा,स्वास्थ्य और संस्कृति की दिशाओं में अग्रसर होने के लिए प्रत्यनशील है।
            <br />
            यदि आप अपने निजी धन का कुछ अंश हमें दान देना चाहें तो कृपया हमसे संपर्क करें। वैदिक संस्कृति संस्थानम को दिया दान आयकर से मुक्त है। आप अपनी कंपनी के कॉर्पोरेट माध्यम से भी दान दे सकते हैं। यदि आप अन्य माध्यमों से दान करना चाहते हैं या कोई प्रश्न पूछना चाहते हैं,तो कृपया हमें ई-मेल करें।
            <br />
            आपके दान किए गए धन का प्रत्येक अंश समाज सेवा में लगता है। वैदिक संस्कृति संस्थानमके संस्थापक और अन्य कर्मचारी पूरी तरह से स्वयंसेवकों के रूप में काम करते हैं।
            धन्यवाद!
            <br /><br />
            डॉ. प्रदीप गोयल<br />
            संस्थाप,वैदिक संस्कृति संस्थानम<br />
            founder@mantrayoga.org

        </p>
    </div>
    <?php include('../components/footer.php') ?>
    <script>
        $(document).ready(function() {
            $("#vision-switch").click(function() {
                if ($("#vision-switch").is(':checked')) {
                    $(".pages-content-container>p").html(`वैदिक संस्कृति संस्थानम का उद्देश्य हमारी मातृभूमि भारत की निस्वार्थ सेवा है। हमारे भारत की हर वस्तु और हर व्यक्ति हमारे लिए पूजनीय है और सबसे उत्तम पूजा
            निस्वार्थ सेवा है। अभी तक इस संस्था ने गरीबों के बीच कोरोनामहामारी के कारण होने वाली भयावह मानवीय पीड़ा को कम करने के लिए थोड़ा सा योगदान दिया है। आगे यह संस्था बाल शिक्षा,स्वास्थ्य और संस्कृति की दिशाओं में अग्रसर होने के लिए प्रत्यनशील है।
            <br />
            यदि आप अपने निजी धन का कुछ अंश हमें दान देना चाहें तो कृपया हमसे संपर्क करें। वैदिक संस्कृति संस्थानम को दिया दान आयकर से मुक्त है। आप अपनी कंपनी के कॉर्पोरेट माध्यम से भी दान दे सकते हैं। यदि आप अन्य माध्यमों से दान करना चाहते हैं या कोई प्रश्न पूछना चाहते हैं,तो कृपया हमें ई-मेल करें।
            <br />
            आपके दान किए गए धन का प्रत्येक अंश समाज सेवा में लगता है। वैदिक संस्कृति संस्थानमके संस्थापक और अन्य कर्मचारी पूरी तरह से स्वयंसेवकों के रूप में काम करते हैं।
            धन्यवाद!
            <br /><br />
            डॉ. प्रदीप गोयल<br />
            संस्थाप,वैदिक संस्कृति संस्थानम<br />
            founder@mantrayoga.org`)
                    $(".pages-heading-container>h1").text("संपर्क करें")
                } else {
                    $(".pages-content-container>p").html(`Vedic Sanskriti Sansthanam’s mission is to undertake and promote selfless service to our Bharat. So far, we have focused our efforts on mitigating catastrophic human suffering caused by the COVID-19 pandamic.  Our longterm vision is to start activities in education, health and culture arenas, and we are looking for ways to make our contributions.
                    <br />
                                    Please note that your donations are used directly for helping the poor and those less fortunate than us and are income tax - deductable.Vedic Sanskriti Sansthanam’ s founder and other staff work purely as volunteers, donating their own time and money on top of your kind contributions.
                                    <br />
                                    If you want to participate through your company’ s corporate giving programs or have a question, please contact us.Thanks!
                                    <br /><br />
                                    Dr.Pradeep Goel,<br />
                                    Founder @mantrayoga.org`)
                    $(".pages-heading-container>h1").text("Contact Us")
                }
            });
        });
    </script>
</body>

</html>