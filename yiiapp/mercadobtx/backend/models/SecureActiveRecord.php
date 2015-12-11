<?php
class SecureActiveRecord extends CActiveRecord {
	private static $dbsecure = null;

	protected static function getSecureDbConnection()
	{
		if (self::$dbsecure !== null)
			return self::$dbsecure;
		else
		{
			self::$dbsecure = Yii::app()->dbsecure;
			if (self::$dbsecure instanceof CDbConnection)
			{
				self::$dbsecure->setActive(true);
				return self::$dbsecure;
			}
			else
				throw new CDbException(Yii::t('yii','Active Record requires a "db" CDbConnection application component.'));
		}
	}
}
?>