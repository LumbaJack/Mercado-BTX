<?php

use Clio\Console;

/**
 * A command to test your email configuration
 *
 * @package YiiBoilerplate\Console
 */
class TestMailCommand extends CConsoleCommand {
	
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
	yiic test_mail
	yiic test_mail set --id=ENV_ID

DESCRIPTION
	Test mail configuration by sending an email.
EOD;
	}
	
	/**
	 * Default action.
	 *
	 * Will be called either by `yiic testmail index` or just by `yiic testmail`.
	 */
	public function actionIndex() {
		$config = (require ROOT_DIR . '/common/config/main.php');
		
		$mail = Emailer::test(array(
			'to' => 'ezzymny@gmail.com',
			'from' => Yii::app ()->params ['mbtx'] ['registrationEmail'],
			'subject' => 'test subject',
			'body' => 'test body',
			'view' => 'test' 
		));

		$mail->send();

		Yii::app()->language = 'es_mx';  // default to spanish / mexico
		
		$mail = Emailer::test(array(
				'to' => 'ezzymny@gmail.com',
				'from' => Yii::app ()->params ['mbtx'] ['registrationEmail'],
				'subject' => 'test subject',
				'body' => 'test body',
				'view' => 'test'
		));
		
		$mail->send();
		
	}

	private function note($msg) {
		return "%B{$msg}%n";
	}
	private function value($msg) {
		return "`%C%_{$msg}%n`";
	}
}
