<?php
/**
 * Installation of users table.
 *
 * @package migrations
 */
class m120805_131754_user_table_migration extends CDbMigration
{
	public function up()
	{
		CActiveRecord::model('User')->create_table();
	}

	public function down()
	{
		$tblname = CActiveRecord::model('User')->tableName();
		$this->dropTable($tblname);
	}
}
