<?php
/**
 * Helper class for sending email.
 *
 */
class Emailer
{
	public $to = null;
	public $from = null;
	public $fromUser = null;
	public $cc = null;
	public $bcc = null;
	public $subject = null;
	public $body = null;
	public $view = null;
	public $args = null;
	
	function __construct($args) {
		$this->args = $args;
		$this->from = ArrayUtils::get($args, 'from', Yii::app ()->params ['mbtx'] ['defaultEmail']);
		$this->fromUser = ArrayUtils::get($args, 'fromUser', Yii::app ()->params ['mbtx'] ['registrationUser']);
		
		$this->to = ArrayUtils::get($args, 'to', null);
		if ( ! $this->to ) {
			throw new ErrorException("to argument required");
		}
		$this->cc = ArrayUtils::get($args, 'cc', null);
		$this->bcc = ArrayUtils::get($args, 'bcc', null);
		$this->subject = ArrayUtils::get($args, 'subject', '');
		$this->body = ArrayUtils::get($args, 'body', '');
		$this->view = ArrayUtils::get($args, 'view', null);
	}
	
	public function send() {
		$mailer = new YiiMailer ();
		
		$maildata = $this->args;
		if ( $this->view ) {
			$mailer->setView($this->view);
		}
		$mailer->setData ( $maildata );
		$mailer->setFrom ( $this->from, $this->fromUser );
		$mailer->setTo ( $this->to );
		$mailer->setSubject ( $this->subject );
		$mailer->setBody($this->body);
		
		$sent = $mailer->send ();
		if ($sent) {
			return array('status' => true, 'error' => '');
		} else {
			return array('status' => false, 'error' => $mailer->getError());
		}
	}

    public static function test($args)
    {
		return new Emailer($args);
    }

    public static function activateUserEmail($args)
    {
    	return new Emailer($args);
    }
    
    public static function recoverPasswordEmail($args)
    {
    	return new Emailer($args);
    }

    public static function newSignupEmail($args=array())
    {
    	$user = Yii::app()->user->data();
    	$args['to'] = Yii::app ()->params ['mbtx'] ['registrationEmail'];
    	$args['from'] = Yii::app ()->params ['mbtx'] ['registrationEmail'];
    	$args['cc'] = '';
    	$args['bcc'] = '';
    	$args['body'] = 'New signup ' . $user->email;
    	$args['subject'] = 'New signup ' . $user->email;
    	$args['view'] = 'admin_newsignup';
    	
    	return new Emailer($args);
    }
    
}