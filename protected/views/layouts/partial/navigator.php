<?php
    if(empty($idx)) $idx = 0;
?>
    <div id="menu">

    <div id="menu_left"></div>
    <div id="menu_center">
<?php if($idx == 0){ ?>
    <a class="menuselected"><span><?php echo Yii::t('common', 'Index');?></span></a>
<?php }else{ ?>
    <a href="<?php echo Yii::app()->request->baseUrl; ?>"><span><?php echo Yii::t('common', 'Index');?></span></a>
<?php }?>

<?php if($idx == 2){ ?>
    <span class="menuselected"><span><?php echo Yii::t('common', 'Top Rated Users');?></span></span>
<?php }else{ ?>
    <a href="<?php echo Yii::app()->createUrl('users/top'); ?>"><span><?php echo Yii::t('common', 'Top Rated Users');?></span></a>
<?php }?>


<?php if($idx == 3){ ?>
    <span class="menuselected"><span><?php echo Yii::t('common', 'Portfolio');?></span></span>
<?php }else{ ?>
    <a href="<?php echo Yii::app()->createUrl('portfolio/index'); ?>"><span><?php echo Yii::t('common', 'Portfolio');?></span></a>
<?php }?>

<?php if($idx == 9){ ?>
    <span class="menuselected"><span><?php echo Yii::t('common', 'Community');?></span></span>
<?php }else{ ?>
    <a href="<?php echo Yii::app()->createUrl('network/index'); ?>"><span><?php echo Yii::t('common', 'Community');?></span></a>
<?php }?>

<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo Yii::app()->language?>/new.gif" class="float_new" alt="New functions"/>

<?php if($idx == 7){ ?>
    <span class="menuselected"><span><?php echo Yii::t('common', 'Projects collection');?></span></span>
<?php }else{ ?>
    <a href="<?php echo Yii::app()->createUrl('pool/index'); ?>"><span><?php echo Yii::t('common', 'Projects collection');?></span></a>
<?php }?>

<?php if($idx == 7){ ?>
        <span class="menuselected"><span><?php echo Yii::t('common', 'Official Blog');?></span></span>
<?php }else{ ?>
    <a href="<?php echo Yii::app()->createUrl('blog/index'); ?>"><span><?php echo Yii::t('common', 'Official Blog');?></span></a>
<?php }?>

<!--
    if(!Session::getInstance()->get('userid')){
//			if($idx==5){
//				<span class="menuselected"><span>' .L('MENU_SIGNUP') .'</span></span>
//			}else{		
//				<a href="' .C('DOMAIN') .'users/signup.php"><span>' .L('MENU_SIGNUP') .'</span></a>
//			}
//			if($idx==6){
//				<span class="menuselected"><span>' .L('MENU_LOGIN') .'</span></span>
//			}else{				
//				<a href="' .C('DOMAIN') .'users/login.php"><span>' .L('MENU_LOGIN') .'</span></a>
//			}
    }else{	//member area, if login
        if($idx==4){
            <span class="menuselected"><span>' .L('MENU_MEMBERAREA') .'</span></span>
        }else{
            <a href="' .C('DOMAIN') .'member/account"><span>' .L('MENU_MEMBERAREA') .'</span></a>
        }

    }-->

	
    </div>
    <div id="menu_right"></div>

    <div class="HackBox"></div>
    </div>