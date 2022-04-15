<div id="header" class="header">
    <div id="sub-header" class="sub-header">
        <div class="header-logo-container">
            <a class="unstyled-link" href="/">
                <h1 class="muli-regular">मात्रुशिक्षा</h1>
                <p class="lato-regular" style="margin:0;text-align:left;font-size:14px;">स्वार्थ नहीं, परमार्थ</p>
            </a>
        </div>
        <div>
            <ul class="header-menu-container lato-regular">
                <a class="unstyled-link" href="/">
                    <li>Home</li>
                </a>
                <a class="unstyled-link" href="/about-us">
                    <li>About Us</li>
                </a>
                <a class="unstyled-link" href="/contribute">
                    <li>Contribute</li>
                </a>
                <a class="unstyled-link" href="/contact-us">
                    <li>Contact Us</li>
                </a>
            </ul>
        </div>
        <div class="mobile-menu-icon" id="mobile-menu-icon">
            <i class="mobile-menu-icon-bar fa fa-bars" aria-hidden="true"></i>
        </div>
    </div>
    <div class="mobile-menu-dropdown" id="mobile-menu-dropdown">
        <ul class="mobile-menu-list-container">
            <a class="unstyled-link" href="/">
                <li class="mobile-menu-list lato-regular">Home</li>
            </a>
            <a class="unstyled-link" href="/about-us">
                <li class="mobile-menu-list lato-regular">About Us</li>
            </a>
            <a class="unstyled-link" href="/contribute">
                <li class="mobile-menu-list lato-regular">Contribute</li>
            </a>
            <a class="unstyled-link" href="/contact-us">
                <li class="mobile-menu-list lato-regular">Contact Us</li>
            </a>
        </ul>
    </div>
</div>
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