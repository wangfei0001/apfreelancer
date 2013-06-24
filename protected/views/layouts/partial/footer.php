<div id="footer">
    <div id="footer_ver"></div>
    <div style="width:1024px; margin:0px auto;">

        <div class="left">
            <div class="footer_adv"></div>
            <div>' .L('LABEL_COPYRIGHT') .'</div>
        </div>

        <div class="right" style="padding:5px 0px;">

            <div id="footer_copyright">
                <a href="' .C('DOMAIN') .'privacy.php">' .L('MENU_PRIVACYPOLICY') .'</a>  -   <a href="' .C('DOMAIN') .'terms.php">' .L('MENU_TERMS') .'</a>  -   ';
                echo '<a href="' .C('DOMAIN') .'affiliate.php">' .L('MENU_AFFILIATES') .'</a>  -   ';
                echo '<a href="' .C('DOMAIN') .'sitemap.php">' .L('MENU_SITEMAP') .'</a>  -  <a href="' .C('DOMAIN') .'contact.php">' .L('MENU_CONTACT') .'</a>';
                // echo '  -   <a href="' .C('DOMAIN') .'faq">' .L('MENU_FAQ') .'</a>';
                if(Cookie::getInstance()->read('lang') == 'cn'){
                echo '&nbsp;外包QQ群(100879770) - 闽ICP备10008801号';
                }
                echo '
            </div>

            <div>
                <a href="http://weibo.com/2215369681" target="_blank"><img src="' .C('DOMAIN') .'images/weibo.png" alt="Follow Us on Weibo" /></a>
                <a href="http://www.facebook.com/pages/Adelaide-Australia/apfreelancer/269210833617" target="_blank"><img src="' .C('DOMAIN') .'images/facebook.png" alt="Find Us on Facebook" /></a>
                <a href="http://twitter.com/apfreelancer" target="_blank"><img src="' .C('DOMAIN') .'images/twitter.png" alt="Follow Us On Twitter" /></a>
                <a href="' .C('DOMAIN') .'rss/" target="_blank"><img src="' .C('DOMAIN') .'images/rss2.png" alt="Rss Feed" /></a>
            </div>

            <div>
                <img src="' .C('DOMAIN') .'images/paypal2.gif" alt="Payment" />&nbsp;<img src="' .C('DOMAIN') .'images/cncard2.gif" alt="Payment" /></div>
            <div class="HackBox"></div>
        </div>

    </div>
    <div class="HackBox"></div>

</div>

if(!preg_match('/^http:\/\/127.0.0.1\/.*?/is',C('DOMAIN'))){
/*echo '
<script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
    try {
        var pageTracker = _gat._getTracker("UA-7594649-2");
        pageTracker._trackPageview();
    } catch(err) {}</script>';*/
echo '
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
    _uacct = "UA-7594649-2";
    urchinTracker();
</script>
';
}

<div id="alertbox" style="display:none">
    <h2>Information</h2>
    <p id="message">This is some sample data from the current page</p>
    <center><a href="#" class="simplemodal-close" id="button">' .L('BUTTON_COMMON_CLOSE') .'</a></center>
</div>