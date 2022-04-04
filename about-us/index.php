<!DOCTYPE html>
<html lang="en">

<head>
    <title>About us - वैदिक संस्कृति संस्थानं</title>
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
        <h1 class="lato-bold">हमारे बारे में जानिए</h1>
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
            “लातों के भूत बातों से नहीं मानते” यह मुहावरा हममें से कई को बचपन से याद होगा! माँ की छड़ी की तेज मार पीठ पर पड़ते ही उनके मुंह से निकले इस मुहावरे को सुनकर हमारी जो घिग्घी बंधती और कंपकंपी छूटती थी क्या उसे भुलाया जा सकता है! वैसे ये मुहावरे, जिन्हें अंग्रेजी में ‘इडियम’ कहते हैं, संभवतः किसी भी सभ्यता के शब्दकोश की सबसे बड़ी संपत्ति है। ये मुहावरे कुछ ही शब्दों में एक चित्र से भी अधिक अनमोल और गहरा संदेश दे जाते हैं! चित्र में क्रोध, भय, आनंद, निराशा जैसी भावनाओं का अभाव होता है जिन्हें मुहावरे शब्दों के साथ जीवन दे देते हैं! इतना ही नहीं, इसके शब्दों में केवल एक संदेश ही निहित नहीं होता, बल्कि यह उस समय प्रचलित संस्कृति का आरेख अक्सर प्रगाढ़ता के साथ हमारे मस्तिष्क में सजीव कर देते हैं। उदाहरण के लिए, अध जल गगरी छलकत जाए को देखें – आधा भरा घड़ा शोर करता है – ये शब्द हमारे मस्तिष्क में सिर पर पानी का मटका लेकर मंद-मंद बातें करती घर की ओर जाती औरतों का बिंब प्रस्तुत करते हैं! इनडोर प्लम्बिंग और नल से तुरंत जल आपूर्ति की इस तथाकथित आधुनिक सभ्यता में अगर यह मुहावरा न होता तो शायद इस थोड़ी ही पुरानी सभ्यता को हम भूल चुके होते! आम के आम गुठलियों के दाम मुहावरे के बारे में तो क्या ही कहें – सुनते ही हमारे दिमाग में आम की ऐसी जीवंत छवि सामने आती है कि व्यापार के महत्वपूर्ण सिद्धांतों की बात करते-करते भी मुंह में पानी आ ही जाता है!
            साठ की अवस्था में वानप्रस्थ को अपनाते हुए जो कि वैदिक सामाजिक जीवन का तीसरा चरण है और जिसमें व्यक्ति को समाज का ऋण चुकाने की ओर आगे बढ़ने का निर्देश मिलता है, मैं वैदिक आचार को ध्यान में रखते हुए कार्यकलाप आरंभ कर रहा हूँ। आधुनिक और भावी पीढ़ी के लिए मुहावरों की विशाल भाषायी सांस्कृतिक विरासत को सँजोने और बढ़ावा देने के भाव ने मुझे यह परियोजना शुरू करने के लिए प्रेरित किया। आधुनिक युग का इलेक्ट्रोनिक मीडिया और उसी तरह यह वेबसाइट इस कार्य के लिए उत्कृष्ट माध्यम है। यह वैदिक संस्कृति संस्थानम् (www.mantrayoga.org) की एक पहल है।
            यद्यपि यह वेबसाइट हम हिन्दी के साथ शुरुआत कर रहे हैं, परंतु जल्द ही अन्य भारतीय भाषाओं के मुहावरे भी इस पोर्टल में सम्मिलित किए जाएंगे। उपयोगकर्ता अपनी अपनी पसंद की भाषा में अपने मुहावरे भी इस पोर्टल पर जोड़ पाएंगे।
            मैं अनुरोध करता हूँ कि आप बोलचाल और लेखन में इस वेबसाइट की जानकारी का उपयोग करें और अगली पीढ़ी तक इस ज्ञान को बढ़ाएँ। इस प्रयास में आपके किसी भी प्रकार के योगदान का हम स्वागत करते हैं!!
        </p>
    </div>
    <script>
        $(document).ready(function() {
            $("#vision-switch").click(function() {
                if ($("#vision-switch").is(':checked')) {
                    $(".pages-content-container>p").text("“लातों के भूत बातों से नहीं मानते” यह मुहावरा हममें से कई को बचपन से याद होगा! माँ की छड़ी की तेज मार पीठ पर पड़ते ही उनके मुंह से निकले इस मुहावरे को सुनकर हमारी जो घिग्घी बंधती और कंपकंपी छूटती थी क्या उसे भुलाया जा सकता है! वैसे ये मुहावरे, जिन्हें अंग्रेजी में ‘इडियम’ कहते हैं, संभवतः किसी भी सभ्यता के शब्दकोश की सबसे बड़ी संपत्ति है। ये मुहावरे कुछ ही शब्दों में एक चित्र से भी अधिक अनमोल और गहरा संदेश दे जाते हैं! चित्र में क्रोध, भय, आनंद, निराशा जैसी भावनाओं का अभाव होता है जिन्हें मुहावरे शब्दों के साथ जीवन दे देते हैं! इतना ही नहीं, इसके शब्दों में केवल एक संदेश ही निहित नहीं होता, बल्कि यह उस समय प्रचलित संस्कृति का आरेख अक्सर प्रगाढ़ता के साथ हमारे मस्तिष्क में सजीव कर देते हैं। उदाहरण के लिए, अध जल गगरी छलकत जाए को देखें – आधा भरा घड़ा शोर करता है – ये शब्द हमारे मस्तिष्क में सिर पर पानी का मटका लेकर मंद-मंद बातें करती घर की ओर जाती औरतों का बिंब प्रस्तुत करते हैं! इनडोर प्लम्बिंग और नल से तुरंत जल आपूर्ति की इस तथाकथित आधुनिक सभ्यता में अगर यह मुहावरा न होता तो शायद इस थोड़ी ही पुरानी सभ्यता को हम भूल चुके होते! आम के आम गुठलियों के दाम मुहावरे के बारे में तो क्या ही कहें – सुनते ही हमारे दिमाग में आम की ऐसी जीवंत छवि सामने आती है कि व्यापार के महत्वपूर्ण सिद्धांतों की बात करते-करते भी मुंह में पानी आ ही जाता है! साठ की अवस्था में वानप्रस्थ को अपनाते हुए जो कि वैदिक सामाजिक जीवन का तीसरा चरण है और जिसमें व्यक्ति को समाज का ऋण चुकाने की ओर आगे बढ़ने का निर्देश मिलता है, मैं वैदिक आचार को ध्यान में रखते हुए कार्यकलाप आरंभ कर रहा हूँ। आधुनिक और भावी पीढ़ी के लिए मुहावरों की विशाल भाषायी सांस्कृतिक विरासत को सँजोने और बढ़ावा देने के भाव ने मुझे यह परियोजना शुरू करने के लिए प्रेरित किया। आधुनिक युग का इलेक्ट्रोनिक मीडिया और उसी तरह यह वेबसाइट इस कार्य के लिए उत्कृष्ट माध्यम है। यह वैदिक संस्कृति संस्थानम् (www.mantrayoga.org) की एक पहल है। यद्यपि यह वेबसाइट हम हिन्दी के साथ शुरुआत कर रहे हैं, परंतु जल्द ही अन्य भारतीय भाषाओं के मुहावरे भी इस पोर्टल में सम्मिलित किए जाएंगे। उपयोगकर्ता अपनी अपनी पसंद की भाषा में अपने मुहावरे भी इस पोर्टल पर जोड़ पाएंगे। मैं अनुरोध करता हूँ कि आप बोलचाल और लेखन में इस वेबसाइट की जानकारी का उपयोग करें और अगली पीढ़ी तक इस ज्ञान को बढ़ाएँ। इस प्रयास में आपके किसी भी प्रकार के योगदान का हम स्वागत करते हैं!!")
                    $(".pages-heading-container>h1").text("हमारे बारे में जानिए")
                } else {
                    $(".pages-content-container>p").text("“Laato ke bhut haatho se nahin mante” is the idiom many of us will remember from our childhood! Do we forget the fear and shivering that it gave us then when it was uttered by our mothers while giving us a good thrash on our back with a stick! Well, such muhavare, name of idioms in Hindi, are perhaps the greatest asset a civilization has in its vocabulary.  In just a few words, they convey a message richer and deeper than even a picture! A picture lacks the feelings-anger, fear, joy, desperation that a muhavare vividly captures in its words! Moreover, the words in it not only has a message, often profound, but also throws vividly in our minds a picture of the prevailing culture of its time. For instance, see adh bhari gagri chalki jaye-a half-filled pot always makes noise-brings an image in our minds of women carrying water pots on their heads while engaged in deep conversations on their way home! In the so-called modern civilization of indoor plumbing and instant water supply, this not-so-old culture would be soon forgotten were it not for this muhavare! What about aam ke aam gutliyo ke daam-a picture of a mango is thrown in our minds intense enough to tantalize our taste buds while teaching an important business principle! On turning sixty and embracing Vanprastha, the third stage of Vedic social life where one is enjoined to give back to one’s society, I am in the process of starting activities with that scriptural ethos in my mind. Preserving and promoting our vast linguistic cultural heritage of muhavare for the modern generation and for the future compelled me to initiate this project. The electronic media of the modern age is the perfect tool for this and so this website. It is an initiative of Vedic Sanskriti Sansthanam (www.mantrayoga.org). While we begin with Hindi, muhavare from other Indian languages would soon be added to this portal. Users would be able to add theirs to this portal in the language of their choice. I request you to use the information contained in this website-in your conversations, writing and by passing on to your next generation. You are always welcome to contribute in any way you are able to!")
                    $(".pages-heading-container>h1").text("About Us")
                }
            });
        });
    </script>
</body>

</html>