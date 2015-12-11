<?php
/**
 * Create the wallet table
 *
 * @package migrations
 */
class m140201_163510_wallet_table extends CDbMigration {
	public function up() {
		CActiveRecord::model ( 'Wallet' )->create_table ();
	}
	public function down() {
		$tblname = CActiveRecord::model ( 'Wallet' )->tableName ();
		$this->dropTable ( $tblname );
	}
}

