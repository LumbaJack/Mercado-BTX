<?php
/**
 * TODO: Migration description
 *
 * @package migrations
 */
class m140223_174255_support_ticket_message_table extends CDbMigration
{
	public function up() {
		SecureActiveRecord::model ( 'SupportTicketMessage' )->create_table ();
	}
	public function down() {
		$tblname = SecureActiveRecord::model ( 'SupportTicketMessage' )->tableName ();
		$this->dropTable ( $tblname );
	}
}

