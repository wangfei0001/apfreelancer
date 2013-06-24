<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-6-24
 * Time: PM10:05
 * To change this template use File | Settings | File Templates.
 */

class LanguageSelector extends CWidget
{
    public function run()
    {
        $currentLang = Yii::app()->language;
        $languages = Yii::app()->params->languages;
        $this->render('languageSelector', array('currentLang' => $currentLang, 'languages'=>$languages));
    }
}