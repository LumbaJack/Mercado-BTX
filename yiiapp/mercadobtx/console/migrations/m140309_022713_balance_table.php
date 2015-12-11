<?php
/**
 * TODO: Migration description
 *
 * @package migrations
 */
class m140309_022713_balance_table extends CDbMigration
{
    public function up() {
        CActiveRecord::model ( 'Balance' )->create_table ();
    }
    public function down() {
        $tblname = CActiveRecord::model ( 'Balance' )->tableName ();
        $this->dropTable ( $tblname );
    }
}

