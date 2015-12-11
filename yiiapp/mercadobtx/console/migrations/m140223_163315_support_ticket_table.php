<?php
/**
 * TODO: Migration description
 *
 * @package migrations
 */
class m140223_163315_support_ticket_table extends CDbMigration
{
	public function up() {
		SecureActiveRecord::model ( 'SupportTicket' )->create_table ();
	}
	public function down() {
		$tblname = SecureActiveRecord::model ( 'SupportTicket' )->tableName ();
		$this->dropTable ( $tblname );
	}
}

