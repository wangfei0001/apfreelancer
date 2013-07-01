<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-7-1
 * Time: PM10:20
 * To change this template use File | Settings | File Templates.
 */
class CreateForm extends CFormModel
{
    public $username;

    public $email;

    public $preferlang;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            // username and password are required
            array('username, email', 'required'),
            // rememberMe needs to be a boolean
            array('email', 'email'),
            // password needs to be authenticated
            //array('password', 'authenticate'),
        );
    }


    /***
     * @return bool
     */
    public function save()
    {
        $user = new User;
        //we need to send verification email

        return $user->create($this->username, $this->email);
    }
}
