<?php
/**
 * TODO: Migration description
 *
 * @package migrations
 */
class m140323_173708_transaction_bankinfo_table extends CDbMigration
{
    public function up() {
        CActiveRecord::model ( 'TransactionBankInfo' )->create_table ();
    }
    public function down() {
        $tblname = CActiveRecord::model ( 'TransactionBankInfo' )->tableName ();
        $this->dropTable ( $tblname );
    }
}

