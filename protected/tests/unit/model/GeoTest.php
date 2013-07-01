<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jacky
 * Date: 1/07/13
 * Time: 4:59 PM
 * To change this template use File | Settings | File Templates.
 */
class GeoTest extends CTestCase
{


    /***
     * Get State by name
     */
    public function testGetStates()
    {
        $model = new Country();
        $countryName = 'Australia';

        $result = $model->getStates($countryName);

        $this->assertTrue(is_array($result) && count($result) > 0);
    }

}
