<?php
/**
 * TODO: Migration description
 *
 * @package migrations
 */
class m140215_063840_recovery_request_table extends CDbMigration
{
	public function up() {
		CActiveRecord::model ( 'RecoveryRequest' )->create_table ();
	}
	public function down() {
		$tblname = CActiveRecord::model ( 'RecoveryRequest' )->tableName ();
		$this->dropTable ( $tblname );
	}
}

