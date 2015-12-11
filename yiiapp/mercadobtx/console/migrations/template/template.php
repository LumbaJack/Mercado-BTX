<?php
/**
 * TODO: Migration description
 *
 * @package migrations
 */
class {ClassName} extends CDbMigration
{
    public function up() {
        CActiveRecord::model ( '{TABLE_NAME}' )->create_table ();
    }
    public function down() {
        $tblname = CActiveRecord::model ( '{TABLE_NAME}' )->tableName ();
        $this->dropTable ( $tblname );
    }
}

