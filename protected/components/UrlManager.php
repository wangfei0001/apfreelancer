<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-6-24
 * Time: PM10:07
 * To change this template use File | Settings | File Templates.
 */
class UrlManager extends CUrlManager
{
    public function createUrl($route,$params=array(),$ampersand='&')
    {
        if (!isset($params['language'])) {
            if (Yii::app()->user->hasState('language'))
                Yii::app()->language = Yii::app()->user->getState('language');
            else if(isset(Yii::app()->request->cookies['language']))
                Yii::app()->language = Yii::app()->request->cookies['language']->value;
            $params['language']=Yii::app()->language;
        }

        return parent::createUrl($route, $params, $ampersand);
    }
}
