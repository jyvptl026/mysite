<?php
class JqueryController extends JqueryAppController{
	var $uses = array();
	var $helpers = array('Ajax');
	
	function index(){
		
	}
	function result($patientID){
		$this->loadModel('Patient');
		$px=$this->Patient->find('first', array(
			'conditions'=>array('Patient.id'=>$patientID)
		));
		
		
		if($px){
			$data['success'] = true;
			$this->autoRender = false;
		}else{
			$data['success'] = false;
			$this->autoRender = false;
		}
		$this->log($px,'px');
		$this->layout = 'ajax';
		$this->set('data', $px);
		$this->render('/common/json');
	}
	
	function resultv2($patientID){
		$this->loadModel('Patient');
		$px=$this->Patient->find('first', array(
			'conditions'=>array('Patient.id'=>$patientID)
		));
		
		$this->set('sample',$px); 
		//$this->layout = false; 
		//$this->render("acceptance"); 
		$this->layout = false; 
		$this->render("/elements/acceptance_dialog"); 
	}
	
	function resultv3(){
		//$this->loadModel('Patient');
		//$px=$this->Patient->find('first', array(
		//	'conditions'=>array('Patient.id'=>$patientID)
		//));
	$this->log($this->params,'wewss'); 
		if($this->data){ 
			 
		$data = 'wew'; 

			if($data){ 
				$this->set('data',array('result'=>true)); 
			}else 
				$this->set('data',array('result'=>false)); 
		}else{ 
			$this->set('data',array('result'=>true));	 
		}
		$this->layout='ajax';   
		$this->render('/type/json');
	}
}