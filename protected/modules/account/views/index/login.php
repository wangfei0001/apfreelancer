<div id="main">
    <div class="left w754">
        <h1><?php echo Yii::t('common','Login');?></h1><hr/>
        <form method="post" action="#" onsubmit="return checkLogin(this)">
            <table width="100%" cellpadding="5" cellspacing="0">
                <tr>
                    <td style="width:20%"><strong><?php echo Yii::t('common','User Name');?></strong></td>
                    <td style="width:80%"><input type="text" name="username" id="username" maxlength="64" size="32" class="bg_textbox" autoComplete="off" /></td>
                </tr>
                <tr>
                    <td><strong><?php echo Yii::t('common','Password');?></strong></td>
                    <td><input type="password" name="password" id="password" maxlength="64" size="32" class="bg_textbox" />
                        <input type="hidden" name="encode_code" id="encode_code" value="" />
                        <input type="hidden" name="sid" id="sid" value="' .$mysession->get("sid") .'"/>
                    </td>
                </tr>
                <!--tr>
                <td><strong>' .L('LABEL_VERIFY_CODE') .':</strong></td>
                <td>
                <input type="text" name="verifycode" id="verifycode" size="8" class="bg_textbox" autoComplete="off" />
                <a href="javascript:loadVerifyCode();">' .L('LABEL_RELOAD_CAPTCHA') .'?</a>
                <p><img id="vcframe" src="' .C('DOMAIN') .'captcha/freecap.php" alt="APFreelancer.com" /></p>
                </td>
                </tr-->
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="token" id="token" value="' .Request::getToken() .'"/>
                        <input type="submit" name="butsubmit" id="butsubmit" value="<?php echo Yii::t('common','Login'); ?>" />
                    </td>
                </tr>
            </table>
        </form>
        <div><a href="<?php echo Yii::app()->createUrl('account/index/create'); ?>"><?php echo Yii::t('common','Sign up'); ?></a></div>
        <div><a href="<?php echo Yii::app()->createUrl('account/index/forgot'); ?>"><?php echo Yii::t('common','Find my password'); ?></a></div>
        </div>
    <div class="right w255">
        <div class="top_right_content">
            <div id="login_tips">
                <?php
                $lang = Yii::app()->language;

                if($lang == 'en'){
?>
                <strong>Protect your account</strong>
                <ul>
                    <li>Check that the Web address in your browser.</li>
                    <li>Don\'t share your password with others even with us. </li>
                    <li>Choose a strong password. Use capitals and numbers for a strong password. </li>
                    <li>Change password periodically. </li>
                </ul>
<?php
                }else if($lang == 'zh'){
?>
                <strong>保護您的賬戶</strong>
                <ul>
                    <li>檢查您在瀏覽器地址欄輸入的地址.</li>
                    <li>不要和其他人共享您的賬戶.</li>
                    <li> 使用複雜的密��?推薦使用大小寫字��?數字和下劃線組成的密��?</li>
                    <li>定期更改密碼.</li>
                </ul>
<?php
                }else{
?>
                <strong>保护您的账户</strong>
                <ul>
                    <li>检查您在浏览器地址栏输入的地址.</li>
                    <li>不要和其他人共享您的账户.</li>
                    <li>使用复杂的密��?推荐使用大小写字��?数字和下划线组成的密��?</li>
                    <li>定期更改密码.</li>
                </ul>
<?php
                }
?>
            </div>
            <div id="adverts">

//                include_once(root ."adverts/adverts_right.html");

            </div>
        </div>
    </div>
    <div class="HackBox"></div>
</div>