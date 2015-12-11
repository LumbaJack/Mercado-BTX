<?php
/**
 * TODO: Migration description
 *
 * @package migrations
 */
class m140217_065522_secure_wallet_table extends CDbMigration
{
	public function up() {
		SecureActiveRecord::model ( 'SecureWallet' )->create_table ();
	}
	public function down() {
		$tblname = SecureActiveRecord::model ( 'SecureWallet' )->tableName ();
		$this->dropTable ( $tblname );
	}
}

