<?php
echo $this->Session->flash();
echo $this->Form->create(array('action'=>'login'));
echo $this->Form->inputs(array(
'legend' => 'Login',
'username',
//'username' => array('label'=>'Username / Email'),
'password'));
echo $this->Form->end('Login');
?>