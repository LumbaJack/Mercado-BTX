<?php
/**
 * TODO: Migration description
 *
 * @package migrations
 */
class m140210_021932_userdetail_table extends CDbMigration
{
	public function up()
	{
		CActiveRecord::model('UserDetail')->create_table();
	}
	
	public function down()
	{
		$tblname = CActiveRecord::model('UserDetail')->tableName();
		$this->dropTable($tblname);
	}

}

