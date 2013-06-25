<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-6-25
 * Time: PM9:01
 * To change this template use File | Settings | File Templates.
 */
class UserIdentity extends CUserIdentity
{

    private $_id;

    public function authenticate()
    {


        return true;
    }

}
