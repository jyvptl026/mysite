<?php
class User extends AppModel {
	
	public $hasOne = array('Profile');
	public $hasMany = array('Article');
	
	//public static function get($field = null)
	//{
	//	$user = Configure::read('User');
	//	if (empty($user) || (!empty($field) && !array_key_exists($field, $user))) {
	//		return false;
	//	}
	//	return !empty($field) ? $user[$field] : $user;
	//}
}
?>