<div id="main">
    <div class="left w754">
        <h1><?php echo Yii::t('commont', 'Step 1'); ?>. <?php echo Yii::t('commont', 'Register Account'); ?></h1><hr/>

        <table width="100%" cellpadding="5" cellspacing="0">
            <tr>
                <td>01 <?php echo Yii::t('common', 'Register Account'); ?></td>
                <td>02 <?php echo Yii::t('common', 'Verify Email'); ?></td>
                <td>03 <?php echo Yii::t('common', 'Personal Details'); ?></td>
            </tr>
            <tr>
                <td style="background-color:#CED0D1; background-image:url(<?php echo Yii::app()->request->baseUrl; ?>/images/drop.gif); background-repeat: no-repeat; background-position:2px 1px; height:8px;"></td>
                <td style="background-color:#29577B"></td>
                <td style="background-color:#29577B"></td>
            </tr>

        </table>
        <form method="post" action="#" onsubmit="return checkSignup(this);">
            <table width="100%" cellpadding="5" cellspacing="0">
                <tr>
                    <td style="width:20%"><strong><?php echo Yii::t('common','User Name');?>:</strong></td>
                    <td style="width:80%"><input type="text" name="username" id="username" maxlength="64" size="24" tabindex="1" class="bg_textbox" autoComplete="off" />&nbsp;
                        <a href="../tips.php?id=1" class="jTip" id="tip_username" name="' .str_replace("{field}",L('LABEL_LOGIN_USERNAME'),L('LABEL_FIELDS_RULE')) .'"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tips.gif" alt=""/></a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><span class="red b"><?php echo Yii::t('common','Notice');?>:</span> ' .L('NOTICE_SIGNUP_USERNAME') .'</td>
                </tr>
                <tr>
                    <td><strong><?php echo Yii::t('commont', 'Email'); ?>:</strong></td>
                    <td><input type="text" name="email" id="email" maxlength="64" size="48" tabindex="2" class="bg_textbox" />&nbsp;
                        (<?php echo Yii::t('commont', 'Privacy Policy'); ?>)&nbsp;
                        <a href="../tips.php?id=2" class="jTip" id="tip_email" name="' .str_replace("{field}",L('LABEL_SIGNUP_EMAIL'),L('LABEL_FIELDS_RULE')) .'"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tips.gif" alt=""/></a>
                    </td>
                </tr>
                <tr>
                    <td><strong><?php echo Yii::t('common','Prefer Language'); ?>:</strong></td>
                    <td>
                        <select id="preferlang" name="preferlang">
                            <option value="en">English</option>
                            <option value="cn">简体中文</option>
                            <option value="zh">繁體中文</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Submit"> </td>
                </tr>
            </table>
        </form>


        </div>
    <div class="left">

    </div>
    <div class="HackBox"></div>
    </div>

