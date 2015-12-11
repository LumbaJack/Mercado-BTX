<?php
/**
 * Controller action for logging users in using the login form containing username and password.
 *
 * It is statically dependent on the LoginForm model representing the authentication form.
 *
 * @package YiiBoilerplate\Frontend
 */
class PasswordLoginAction extends CAction
{
    /**
     * If there were no login attempt or it failed render login form page
     * otherwise redirect him to wherever he should return to.
     *
     * Also, this endpoint serves as the AJAX endpoint for client-side validation of login info.
     */
    public function run()
    {
    	$ip_addr = Yii::app()->request->userHostAddress;
    	$locks = IpBlock::model()->findAllByAttributes(array('ip_addr' => $ip_addr));
    	if ( count($locks) > 0 ) {
    		if ( $locks[0]->until_time >= time() ) {
    			$this->controller->render('locked');
    		}
    		else {
    			foreach ($locks as $lock) {
					if ( $lock->id_user ) {
						$locked_user = User::model()->findByPk($lock->id_user);
						if ( $locked_user ) {
							$locked_user->saveAttributes(array('login_attempts' => 0));
						}
					}
					$lock->delete();
				}
    		}
    	}
    	else {
	        $user = Yii::app()->user;
	        $userdata = $user->data();
	        $this->redirectAwayAlreadyAuthenticatedUsers($user);
	
	        $model = new FrontendLoginForm();
	
	        $request = Yii::app()->request;
	
	        $this->respondIfAjaxRequest($request, $model);
	
	        $formData = $request->getPost(get_class($model), false);
	
	        $show_remaining = false;
	        $remaining_attempts = FrontendLoginForm::LOCK_LOGIN_ATTEMPTS;
	        if ($formData)
	        {
	            $model->attributes = $formData;
	            if ($model->validate(array('username', 'password', 'verifyCode')) && $model->login()){
	
					//Yii::app()->user->setFlash('danger', '<strong>Error!</strong> Ingresa los datos de accesso correctamente.');
	
	                $this->controller->redirect($user->returnUrl);
		    	}
		    	else {
			    	$login_attempts = $model->getUser()->login_attempts;
			    	$remaining_attempts = FrontendLoginForm::LOCK_LOGIN_ATTEMPTS - $login_attempts;
			    	$remaining_attempts = ( $remaining_attempts >= 0 ) ? $remaining_attempts : 0;
			    	if ( $remaining_attempts <= 3 ) {
			    		$show_remaining = true;
			    	}
		    	}
	        }

	        $this->controller->render('index', compact('model', 'show_remaining', 'remaining_attempts'));
    	}
    }

    /**
     * @param CHttpRequest $request
     * @param User $model
     */
    private function respondIfAjaxRequest($request, $model)
    {
        $ajaxRequest = $request->getPost('ajax', false);
        if (!$ajaxRequest or $ajaxRequest !== 'login-form')
            return;
        echo CActiveForm::validate(
            $model,
            array('username', 'password', 'verifyCode')
        );
        Yii::app()->end();
    }

    /**
     * @param $user
     */
    private function redirectAwayAlreadyAuthenticatedUsers($user)
    {
        if (!$user->isGuest)
            $this->controller->redirect('/');
    }
} 
