<div id="main">
    <div class="left w754">
        <h1><?php echo Yii::t('common','Login');?></h1><hr/>

        <div class="form">
            <?php echo CHtml::beginForm(); ?>

            <?php echo CHtml::errorSummary($model); ?>

            <div class="row">
                <?php echo CHtml::activeLabel($model,Yii::t('common','User Name')); ?>
                <?php echo CHtml::activeTextField($model,'username') ?>
            </div>

            <div class="row">
                <?php echo CHtml::activeLabel($model,Yii::t('common','Password')); ?>
                <?php echo CHtml::activePasswordField($model,'password') ?>
            </div>

            <div class="row submit">
                <?php echo CHtml::submitButton(Yii::t('common','Login')); ?>
            </div>

            <?php echo CHtml::endForm(); ?>
        </div><!-- form -->


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