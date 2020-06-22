<?php
class UsersController extends AppController
{
	
	var $helpers = array('Javascript','Session','Html','Form');
	
	public function beforeFilter()
	{
		//$user = $this->Auth->user();
		//if (!empty($user)) {
		// Configure::write('User', $user[$this->Auth->getModel()->alias]);
		//}
		parent::beforeFilter();
		$this->Auth->allow('add');
	}
	
	//public function beforeRender() {
	//$user = $this->Auth->user();
	//if (!empty($user)) {
	//	$user = $user[$this->Auth->getModel()->alias];
	//}
	//	$this->set(compact('user'));
	//}
	
	public function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('User created!');
				$this->redirect(array('action'=>'login'));
			} else {
				$this->Session->setFlash('Please correct the errors');
			}
		}
	}
	
	function edit($id = null) {
		$this->User->id = $id;
		if (empty($this->data)) {
			//$this->data = $this->User->read();
			$this->data = $this->User->read(null, $id);
		} else {
			if ($this->User->save($this->data)) {
				$this->User->commit();
				$this->Session->setFlash('Your changes has been saved.');
				$this->redirect(array('action' => 'dashboard'));
			}
		}
	}
	
	function delete($id = null) {
		if ($this->User->delete($id)) {
			//$this->Session->setFlash('The User with id: ' . $id . ' has been deleted.');
			$this->Session->setFlash(__('The User with id: ' . $id . ' has been deleted.', true));
			$this->redirect(array('action' => 'dashboard'));
		}else{
			$this->Session->setFlash(__('User was not deleted', true));
			$this->redirect(array('action' => 'dashboard'));
		}
	}

	public function login()
	{
		if(
			!empty($this->data) &&
			!empty($this->Auth->data['User']['username']) &&
			!empty($this->Auth->data['User']['password'])
		){
			$user = $this->User->find('first', array(
				'conditions' => array(
					//'User.email' => $this->Auth->data['User']['username'],
					'User.password' => $this->Auth->data['User']['password']
				),
				'recursive' => -1
				)
			);
			if (!empty($user) && $this->Auth->login($user)) {
				if ($this->Auth->autoRedirect) {
					$this->redirect($this->Auth->redirect());
				}
			} else {
				$this->Session->setFlash($this->Auth->loginError, $this->Auth->flashElement, array(), 'auth');
			}
		}
	}
	
	public function logout()
	{
		$this->redirect($this->Auth->logout());
	}
	
	public function dashboard()
	{
		//$userName = User::get('username');
		$role = $this->Auth->user('role');
		 if (!empty($role))
		 {
			$this->redirect(array($role => true, 'action'=> 'dashboard'));
		 }
			
		$this->User->Behaviors->attach('Containable'); 
		$user = $this->User->find('first', array(
			'contain' => array(
				'Article' => array(
					'fields' => array('Article.title'),
					'order' => array('Article.created' => 'desc', 'Article.id' => 'desc'),
					'limit' => 2,
					'offset' => 0
				),
				'Profile' => array(
					'fields' => array('Profile.user_id','Profile.website'),
					'conditions'=>array(
						//'Profile.user_id'=>2
						'NOT'=>array('Profile.user_id'=>2) 
					),
				)
			),
			//'recursive'=>0 //0=>1 bind, 1=>2 bind, 2=>3 bind, and so on...
		));
		
		
///pagination///
		//var $paginate = array(
		//	//'fields' => array('Post.id', 'Post.created'),
		//	'limit' => 3,
		//	//'order' => array(
		//	//	'Post.title' => 'asc'
		//	//)
		//);
		//var $paginate = array(
		//	'limit' => 25,
		//	'contain' => array('Article')
		//);
		// similar to findAll(), but fetches paged results
		$this->paginate = array(
			//'conditions' => array('User.username LIKE' => 'a%'),
			'limit' => 10
			//'User' => array('limit' => 10,
			//	'order' => array('User.id' => 'desc'),
			//	'group' => array('User.id', 'username', 'role'),
			//	'contain'=>array(
			//		'Profile' => array(
			//			'fields' => array('Profile.user_id','Profile.website'),
			//			'conditions'=>array(
			//				//'Profile.user_id'=>2
			//				//'NOT'=>array('Profile.user_id'=>2) 
			//			),
			//		)
			//	)
			//)
		);
		$data = $this->paginate('User');
		$this->set(compact('data'));
		//$this->set('data', $data);

		//$this->User->recursive = 0;
		//$this->set('users', $this->paginate());
		//$this->set('roles',$this->User->roles);
		//
		//
		
		
		
		
		
		//$this->set('searchFields',$this->SearchScaffolding->scaffoldingFields());
			$this->log($user,'user');
	}
	public function admin_dashboard()
	{
		
	}
	public function manager_dashboard(){
		
	}
	
}
?>