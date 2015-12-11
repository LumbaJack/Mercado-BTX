<?php
/**
 * TODO: Migration description
 *
 * @package migrations
 */
class m140204_065348_address_table extends CDbMigration {
	public function up() {
		CActiveRecord::model ( 'Address' )->create_table ();
	}
	public function down() {
		$tblname = CActiveRecord::model ( 'Address' )->tableName ();
		$this->dropTable ( $tblname );
	}
}

