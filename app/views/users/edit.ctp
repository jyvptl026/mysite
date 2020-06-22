<?php 
	echo $this->Form->create('User',array('type'=>'file'));
    echo $this->Form->input('username');
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->end('Save User');
?>