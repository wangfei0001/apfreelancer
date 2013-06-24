<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jacky
 * Date: 24/06/13
 * Time: 4:29 PM
 * To change this template use File | Settings | File Templates.
 */
class IndexController extends Controller
{

    /***
     * Default action
     */
    public function actionIndex()
    {
        $this->render('index', array(
            'var1'=>1,
            'var2'=>2,
        ));
    }

}
