<?php
/**
 * TODO: Migration description
 *
 * @package migrations
 */
class m140304_042354_invoices_table extends CDbMigration
{
    public function up() {
        CActiveRecord::model ( 'Invoices' )->create_table ();
    }
    public function down() {
        $tblname = CActiveRecord::model ( 'Invoices' )->tableName ();
        $this->dropTable ( $tblname );
    }
}
