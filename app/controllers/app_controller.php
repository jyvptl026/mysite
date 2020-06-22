<?php
class AppController extends Controller {
	public function beforeFilter() {
	//if ($this->Auth->getModel()->hasField('active'))
	//	{
	//		$this->Auth->userScope = array('active' => 1);
	//	}
	}
	
	//public $components = array(
	//	//'Acl',
	//	'Auth' => array(
	//		//'authorize' => 'controller',
	//		'authorize' => 'controller',
	//		'loginRedirect' => array(
	//			'admin' => false,
	//			'controller' => 'users',
	//			'action' => 'dashboard'
	//		),
	//		'Auth' => array(
	//			'authorize' => 'controller',
	//			'loginError' => 'Invalid account specified',
	//			'authError' => 'You don\'t have the right permission'
	//		),
	//	),
	//	'Session'
	//);

	//public $components = array(
	//	'Auth' => array(
	//		//'userModel' => 'Physician',
	//		'authorize' => 'controller',
	//		'loginRedirect' => array(
	//			'admin' => false,
	//			'controller' => 'users',
	//			'action' => 'dashboard'
	//		),
	//		'Auth' => array(
	//			'authorize' => 'controller',
	//			'loginError' => 'Invalid account specified',
	//			'authError' => 'You don\'t have the right permission'
	//		),
	//	),
	//	'Session'
	//);
	
	//public function isAuthorized()
	//{
	//	return true;
	//}
	//public function isAuthorized() {
	//$role = $this->Auth->user('role');
	//$neededRole = null;
	//$prefix = !empty($this->params['prefix']) ? $this->params['prefix'] : null;
	//	if (!empty($prefix) && in_array($prefix, Configure::read('Routing.prefixes')))
	//	{
	//		$neededRole = $prefix;
	//	}
	//	return (
	//		empty($neededRole) ||
	//		strcasecmp($role, 'admin') == 0 ||
	//		strcasecmp($role, $neededRole) == 0
	//	);
	//}

}
?>