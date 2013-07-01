<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jacky
 * Date: 20/06/13
 * Time: 4:21 PM
 * To change this template use File | Settings | File Templates.
 */
class UserTest extends CTestCase
{
    protected $model;

    public function setUp()
    {
        $this->model = new User();
    }

    public function testCreate()
    {
        $result = $this->model->create('wangfei0001', 'wangfei001@hotmail.com', 'cn');

        $this->assertTrue(false != $result);

        $this->assertTrue(!empty($result->verification));       //we will send out varification email;
    }
}
