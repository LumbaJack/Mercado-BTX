<?php
/**
 * TODO: Migration description
 *
 * @package migrations
 */
class m140218_014225_user_twofactor_settings_table extends CDbMigration
{

	public function up() 
	{
		SecureActiveRecord::model ( 'UserTwoFactorSettings' )->create_table ();
	}

	public function down() 
	{
		$tblname = SecureActiveRecord::model ( 'UserTwoFactorSettings' )->tableName ();
		$this->dropTable ( $tblname );
	}

}

