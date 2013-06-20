<?php

class m130620_035034_init_database extends CDbMigration
{
	public function up()
	{

        $basePath = Yii::app()->basePath;
        $fileContent = file_get_contents($basePath .'/data/apfreelancer.sql');

        $this->execute($fileContent);
	}

	public function down()
	{
		echo "m130620_035034_init_database does not support migration down.\n";

        $rows = Yii::app()->db->createCommand("SHOW TABLES;")->query();
        foreach($rows as $row) {

            $tableName = current($row);

            if($tableName != 'tbl_migration'){
                $this->execute("DROP TABLE `$tableName`;");

                echo " deleted table $tableName\n";

            }

        }

        echo "\n all tables deleted \n";

		return true;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}