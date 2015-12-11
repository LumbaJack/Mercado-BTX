<?php
/**
 * TODO: Migration description
 *
 * @package migrations
 */
class m140324_152121_ip_block_table extends CDbMigration
{
    public function up() {
        CActiveRecord::model ( 'IpBlock' )->create_table ();
    }
    public function down() {
        $tblname = CActiveRecord::model ( 'IpBlock' )->tableName ();
        $this->dropTable ( $tblname );
    }
}

