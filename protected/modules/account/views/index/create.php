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

        <div class="form">

        <?php echo CHtml::beginForm(); ?>

        <?php echo CHtml::errorSummary($model); ?>

        <div class="row">
            <?php echo CHtml::activeLabel($model,Yii::t('common','User Name')); ?>
            <?php echo CHtml::activeTextField($model,'username') ?>
        </div>
        <div class="row">
            <span class="red b"><?php echo Yii::t('common','Notice');?>:</span> ' .L('NOTICE_SIGNUP_USERNAME')
        </div>

        <div class="row">
            <?php echo CHtml::activeLabel($model,Yii::t('common','Email')); ?>
            <?php echo CHtml::activeTextField($model,'email') ?>
        </div>

        <div class="row">
            <?php echo CHtml::activeLabel($model,Yii::t('common','Prefer Language')); ?>
            <select id="preferlang" name="preferlang">
                <option value="en">English</option>
                <option value="cn">简体中文</option>
                <option value="zh">繁體中文</option>
            </select>
        </div>

        <div class="row submit">
            <?php echo CHtml::submitButton(Yii::t('common','submit')); ?>
        </div>

        <?php echo CHtml::endForm(); ?>
        </div>
    </div>
    <div class="left">

    </div>
    <div class="HackBox"></div>
    </div>

