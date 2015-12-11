<?php
/**
 * TODO: Migration description
 *
 * @package migrations
 */
class m140201_165003_transaction_table extends CDbMigration
{
	public function up() {
		CActiveRecord::model ( 'Transaction' )->create_table ();
	}
	public function down() {
		$tblname = CActiveRecord::model ( 'Transaction' )->tableName ();
		$this->dropTable ( $tblname );
	}
}

