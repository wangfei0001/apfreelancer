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
        $model = new CreateForm();

        if(isset($_POST['CreateForm'])){

            $model->attributes=$_POST['CreateForm'];

            if($model->validate()){
                $user = $model->save();
                if($user){
                    $this->redirect(array('verify','uid'=>$user->id_user));
                }
            }

        }

        $this->render('create', array('model' => $model));
    }

    public function actionForgot()
    {
        $this->render('forgot');
    }

    public function actionVerify()
    {
        $this->render('verify');
    }
}
