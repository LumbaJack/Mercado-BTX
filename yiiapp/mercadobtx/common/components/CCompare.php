<?php
/*
 * Easily compare ActiveRecord objects
 */
class CCompare extends CActiveRecordBehavior {
	public function compare($other, $attributes = null) {
		if (! is_object ( $other ))
			return false;
			
			// does the objects have the same type?
		if (get_class ( $this->owner ) !== get_class ( $other ))
			return false;
		
		$differences = array ();
		
		if ($attributes) {
			$cmpattrs = array ();
			foreach ( $attributes as $key ) {
				if (key_exists ( $key, $this->owner->attributes )) {
					$cmpattrs [$key] = $this->owner->attributes [$key];
				}
			}
		} else {
			$cmpattrs = $this->owner->attributes;
		}
		
		foreach ( $cmpattrs as $key => $value ) {
			
			if ($this->owner->$key != $other->$key)
				$differences [$key] = array (
						'old' => $this->owner->$key,
						'new' => $other->$key 
				);
		}
		
		return $differences;
	}
}

?>