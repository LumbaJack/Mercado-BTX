<?php
class WebUser extends CWebUser
{
  public $_data;

  // Use this function to access the AR Model of the actually
  // logged in user, for example
  // echo Yii::app()->user->data()->profile->firstname;
  public function data() {
    if($this->_data instanceof User)
      return $this->_data;
    else if($this->id && $this->_data = User::model()->findByPk($this->id))
      return $this->_data;
    else
      return $this->_data = new User();
  }

  public function loggedInAs() {
    if($this->isGuest) {
      return Yii::t('translation', 'Guest');
    }
    else {
      return $this->data()->username;
    }
  }

  /**
   * Return admin status.
   * @return boolean
   */
  public function isAdmin() {
    if($this->isGuest)
      return false;
    else 
      return Yii::app()->user->data()->superuser;
  }


}
?>
