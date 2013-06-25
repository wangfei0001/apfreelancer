<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/menu.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js"></script>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div  id="language-selector" style="float:right; margin:5px;">
    <?php
    $this->widget('application.components.widgets.LanguageSelector');
    ?>
</div>

<div id="header">
    <div id="zone">

        <ul id="zone1">
            <?php
            if(!empty($meObj)){
                ?>
                <script type="text/javascript">
                    $(function(){
                        $("li.submenu1").children(".button").toggle(function() {
                            $(this).parent().find("ul").slideDown("fast");
                            $(this).addClass("selected");
                        }, function() {
                            $(this).parent().find("ul").slideUp("fast");
                            $(this).removeClass("selected");
                        });
                        $("body").bind("click",function(){
                            $("li.submenu1").find("ul").hide();
                            $("li.submenu1").children(".button").removeClass("selected");
                        })
                    });
                </script>

                <li>L('LABEL_WELCOME_BACK') , <a href="' .$meObj->getProfilelink() .'"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/home.gif" /></a>&nbsp;<a href="' .$meObj->getProfilelink() .'" class="white">' .Session::getInstance()->get('username')</a></li>
                <li class="submenu1"><a href="<?php echo Yii::app()->request->baseUrl; ?>/member/account" class="white">' .L('MENU_MY') .'</a><a class="button" href="javascript:void(0);"></a><ul>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/member/groups">' .L('MENU_MYGROUP') .'</a></li>
                    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/member/portfolio">' .L('MENU_PROVIDER_PORTFOLIO') .'</a></li>
                </ul>
                </li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/member/inbox" class="white"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/email.gif" style="margin-top:6px;" />
                    <?php
                    $mailcount = $meObj->getMessagesCount();
                    echo $mailcount['unread'] .'/' .$mailcount['total'];
                    ?>
                </a></li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/users/logout.php" class="white">' .L('MENU_LOGOUT') .'</a></li>
                <?php
            }else{
                ?>
                <li>
                    <a href="<?php echo Yii::app()->createUrl('account/index/create'); ?>" class="white"><?php echo Yii::t('common','Signup'); ?></a> |
                    <a href="<?php echo Yii::app()->createUrl('account/index/login'); ?>" class="white"><?php echo Yii::t('common','Login'); ?></a>
                </li>
                <?php
            }
            ?>
        </ul>
        <ul id="zone2">
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/rss/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/rss2.gif" /></a></li>

            <li class="submenu">
                <a href="#" class="button">
                    <?php
                    $lang = Yii::app()->language;
                    if($lang == "cn"){
                        ?><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/cn.gif" alt="简体中文"/>&nbsp;简体中文<?php
                    }else if($lang == "zh"){
                        ?><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/zh.gif" alt="繁體中文"/>&nbsp;繁體中文<?php
                    }else{
                        ?><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/en.gif" alt="English"/>&nbsp;English<?php
                    }
                    ?>
                </a>
                <ul>
                    <li><a href="javascript:void(0);" onclick="changeLang('en')"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/en.gif" alt="English" />&nbsp;English</a></li>
                    <li><a href="javascript:void(0);" onclick="changeLang('cn')"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/cn.gif" alt="简体中文"/>&nbsp;简体中文</a></li>
                    <li><a href="javascript:void(0);" onclick="changeLang('zh')"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/zh.gif" alt="繁体中文"/>&nbsp;繁体中文</a></li>
                </ul>
            </li>
            <li>
                <form method="get" action="<?php echo Yii::app()->request->baseUrl; ?>/search.php">
                    <div>
                        <input type="text" value="<?php echo Yii::t('common','Input content'); ?>" name="keyword" id="keyword" class="searchbox" onfocus="this.value=''"/>
                        <input type="image" src="<?php echo Yii::app()->request->baseUrl; ?>/images/bt_go.gif" class="searchbutton"/>
                    </div>
                </form>
            </li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/help" class="white" target="_blank"><?php echo Yii::t('common','Help Center'); ?></a></li>

        </ul>
    </div>
</div>
<!--header_row begin-->
<div id="header_row">
    <a href="' .C('DOMAIN') .'index.php"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/en/logo.gif" width="364" height="90" alt="APFreelancer.com" /></a>
    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/adv.jpg" width="660" height="90" alt="APFreelancer.com" />
    <div class="HackBox"></div>
</div>
<!--header_row end-->