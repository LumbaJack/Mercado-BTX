<?php
/**
 * Installation of fiat table.
 *
 * @package migrations
 */
class m140128_042920_fiat_table_migration extends CDbMigration
{

    public function up() 
    {
        CActiveRecord::model('Fiat')->create_table();
    }

    public function down() 
    {
        $tblname = CActiveRecord::model('Fiat')->tableName();
        $this->dropTable($tblname);
    }

}

