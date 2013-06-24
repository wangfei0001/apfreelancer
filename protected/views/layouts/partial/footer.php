<div id="footer">
    <div id="footer_ver"></div>
    <div style="width:1024px; margin:0px auto;">

        <div class="left">
            <div class="footer_adv"></div>
            <div>L('LABEL_COPYRIGHT') </div>
        </div>

        <div class="right" style="padding:5px 0px;">

            <div id="footer_copyright">
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/privacy.php">' .L('MENU_PRIVACYPOLICY') .'</a>  -   <a href="<?php echo Yii::app()->request->baseUrl; ?>/terms.php">' .L('MENU_TERMS') .'</a>  -   ';
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/affiliate.php">' .L('MENU_AFFILIATES') .'</a>  -
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/sitemap.php">' .L('MENU_SITEMAP') .'</a>  -  <a href="<?php echo Yii::app()->request->baseUrl; ?>/contact.php">' .L('MENU_CONTACT') .'</a>
                // echo '  -   <a href="<?php echo Yii::app()->request->baseUrl; ?>/faq">' .L('MENU_FAQ') .'</a>';
                if(Cookie::getInstance()->read('lang') == 'cn'){
                echo '&nbsp;外包QQ群(100879770) - 闽ICP备10008801号';
                }
            </div>

            <div>
                <a href="http://weibo.com/2215369681" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/weibo.png" alt="Follow Us on Weibo" /></a>
                <a href="http://www.facebook.com/pages/Adelaide-Australia/apfreelancer/269210833617" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/facebook.png" alt="Find Us on Facebook" /></a>
                <a href="http://twitter.com/apfreelancer" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/twitter.png" alt="Follow Us On Twitter" /></a>
                <a href="<?php echo Yii::app()->request->baseUrl; ?>/rss/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/rss2.png" alt="Rss Feed" /></a>
            </div>

            <div>
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/paypal2.gif" alt="Payment" />&nbsp;<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/cncard2.gif" alt="Payment" /></div>
            <div class="HackBox"></div>
        </div>

    </div>
    <div class="HackBox"></div>

</div>


<!--script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
    try {
        var pageTracker = _gat._getTracker("UA-7594649-2");
        pageTracker._trackPageview();
    } catch(err) {}
</script>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
    _uacct = "UA-7594649-2";
    urchinTracker();
</script-->

<div id="alertbox" style="display:none">
    <h2>Information</h2>
    <p id="message">This is some sample data from the current page</p>
    <center><a href="#" class="simplemodal-close" id="button">' .L('BUTTON_COMMON_CLOSE') .'</a></center>
</div>