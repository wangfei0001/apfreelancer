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


    public function testGetStates()
    {
        $model = new Country();
        $countryName = 'Australia';

        $model->getStates($countryName);

    }

}
