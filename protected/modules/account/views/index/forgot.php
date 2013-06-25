<div id="main">';
    <div class="left w754">
        <h1>' .L('LABEL_LOGIN_FORGET') .'</h1><hr/>

        <form action="#" method="post">
            <table width="100%" cellpadding="5" cellspacing="0">
                <tr>
                    <td colspan="2">' .L('NOTICE_FORGETPASSWORD') .'</td>
                </tr>


                <tr>
                    <td><strong><?php echo Yii::t('common','Email');?></strong></td>
                    <td><input type="text" name="email" id="email" size="32" class="bg_textbox" />
                    </td>
                </tr>
                <tr>
                    <td><strong>' .L('LABEL_VERIFY_CODE') .':</strong></td>
                    <td>
                        <input type="text" name="verifycode" id="verifycode" size="8" class="bg_textbox" autoComplete="off" />
                        <a href="javascript:loadVerifyCode();">' .L('LABEL_RELOAD_CAPTCHA') .'?</a>
                        <p><img id="vcframe" src="' .C('DOMAIN') .'captcha/freecap.php" alt="APFreelancer.com" /></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="token" id="token" value="' .Request::getToken() .'"/>
                        <input type="submit" value="<?php echo Yii::t('common','Submit');?>"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div class="right w255">
        <div class="top_right_content">

            <div id="adverts">

            </div>
        </div>
    </div>
    <div class="HackBox"></div>
</div>