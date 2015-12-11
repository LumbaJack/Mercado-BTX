<?php

class VerifyController extends VerifyActivationRequiredController
{

	private function send_err($text, $code) 
	{
		echo sprintf('{"MSG": "%s", "Code": "%s"}', $text,$code);
		Yii::app()->end();
	}

	public $leftmenu = 'verify';
	public function actionIndex()
	{
		$user = Yii::app()->user->data();
		$this->render('index', array (
			'userdata' => $user
			));
	}
	public function actionUpload()
	{
		$user = Yii::app()->user->data();
		$s3 = new S3('AKIAIRCVNJWPLDLX2PJA','Bo3cbCSVmsTyxrlsg1R0nVrkLuHXpPv9aYUhjBff');
		header('Content-Type: application/json');
		try {
    			if ( !isset($_FILES['files']['error']) ||
        			is_array($_FILES['files']['error'])
    			) {
				$this->send_err('Error undefined', 500);
    			}
	
			// Check $_FILES['files']['error'] value.
			switch ($_FILES['files']['error']) {
			case UPLOAD_ERR_OK:
            			break;
			case UPLOAD_ERR_NO_FILE:
				$this->send_err('No file sent.', 500);
			case UPLOAD_ERR_INI_SIZE:
			case UPLOAD_ERR_FORM_SIZE:
				$this->send_err('Exceeded filesize limit.', 500);
			default:
				$this->send_err('Unknown errors.', 500);
    			}
	
    			// You should also check filesize here. 
    			if ($_FILES['files']['size'] > 1000000) {
				$this->send_err('Exceeded filesize limit.', 501);
    			}

    			// DO NOT TRUST $_FILES['files']['mime'] VALUE !!
    			// Check MIME Type by yourself.
    			$finfo = new finfo(FILEINFO_MIME_TYPE);
    			if (false === $ext = array_search(
        			$finfo->file($_FILES['files']['tmp_name']),
        			array(
            			'jpg' => 'image/jpeg',
            			'png' => 'image/png',
            			'gif' => 'image/gif',
        			),
        			true
    			)) {
        			$this->send_err('Invalid file format.', 502);
    			}
			$uploadFile = $_FILES['files']['tmp_name'];
			$fname = sprintf('userid_%s/%s', $user->id, $_FILES['files']['name']);
			if (!$s3->putObjectFile($uploadFile, "mbtx", $fname)) {
        			$this->send_err('Failed to move uploaded file.', 503);
			} else {
				echo '{"MSG": "OK", "Code": "200"}';
				Yii::app()->end();
			}
		} catch (RuntimeException $e) {
			$this->send_err('Error'.$e->getMessage(), 500);
		}
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
