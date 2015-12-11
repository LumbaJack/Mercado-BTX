<?php
use Clio\Console;

/**
 * A command to test your email configuration
 *
 * @package YiiBoilerplate\Console
 */
class InitdbCommand extends CConsoleCommand {
	
	/**
	 *
	 * @var array List of directory names of all entry points + common config dir.
	 */
	private $config_dirs;
	
	/**
	 * What to do before running any action.
	 *
	 * We are just setting up the defaults here.
	 */
	public function init() {
		$this->config_dirs = array (
				ROOT_DIR . '/common/config',
				ROOT_DIR . '/frontend/config',
				ROOT_DIR . '/console/config',
				ROOT_DIR . '/backend/config' 
		);
	}
	
	/**
	 * What to show to user when he run `yiic help environment`
	 *
	 * @see CConsoleCommand.getHelp
	 * @return string Short description of what this command does.
	 */
	public function getHelp() {
		return <<<EOD
USAGE
	yiic initdb
	yiic initdb 

DESCRIPTION
	drop all tables and re-create them all fresh.
EOD;
	}
	
	/**
	 * Default action.
	 *
	 * Will be called either by `yiic testmail index` or just by `yiic testmail`.
	 */
	public function actionIndex() {
		$config = (require ROOT_DIR . '/common/config/main.php');
		
		$table_names_man = array(
			'UserDetail',
			'Wallet',
			'RecoveryRequest',
			'Address',
			'Fiat',
			'Transaction',
			'User'
		);
		
		$model_files = array_merge(
			glob( ROOT_DIR . '/common/models/*.php'),
			glob( ROOT_DIR . '/frontend/models/*.php')
#			glob( ROOT_DIR . '/backend/models/*.php')
		);
		
		foreach ($model_files as $model_filename ) {
			$model_name = basename(str_replace(".php", "", $model_filename));
			if ( stristr($model_name, 'Form') ) {
				continue;
			}

			try {
				$model = CActiveRecord::model($model_name);
				if ( $model ) {
					$tblname = $model->tableSchema->rawName;
					Yii::app()->db->createCommand("DROP TABLE $tblname")->execute();
				}
			}
			catch (Exception $e) { echo "\n$e\n";}
		}
		try {
			Yii::app ()->db->createCommand ( "DROP TABLE tbl_migration" )->execute ();		
		}
		catch(Exception $e) {}
	}

	private function note($msg) {
		return "%B{$msg}%n";
	}
	private function value($msg) {
		return "`%C%_{$msg}%n`";
	}
}
