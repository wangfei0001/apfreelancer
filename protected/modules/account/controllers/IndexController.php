<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-6-24
 * Time: PM11:45
 * To change this template use File | Settings | File Templates.
 */
class IndexController extends Controller
{
    public function actionLogin()
    {
        $model=new LoginForm;

        if(isset($_POST['LoginForm'])){

            $model->attributes=$_POST['LoginForm'];

            if($model->validate() && $model->login()){

                die('ok');
            }


        }

        $this->render('login', array('model'=>$model));
    }

    public function actionCreate()
    {
        $this->render('create');
    }

    public function actionForgot()
    {
        $this->render('forgot');
    }
}
