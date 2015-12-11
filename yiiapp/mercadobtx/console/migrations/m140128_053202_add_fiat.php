<?php
/**
 * TODO: Migration description
 *
 * @package migrations
 */
class m140128_053202_add_fiat extends CDbMigration
{

	public function safeUp() 
	{
		$usd = new Fiat();
		$usd->short_name = 'usd';
		$usd->name = 'US Dollars';
		$usd->save();

		$mxn = new Fiat();
		$mxn->short_name = 'usd';
		$mxn->name = 'US Dollars';
		$mxn->save();
	}

	public function safeDown() 
	{
		$fiatTable = CActiveRecord::model('Fiat')->tableName();
		$this->delete($fiatTable, 'short_name in ("usd", "mxn")');
	}

}

