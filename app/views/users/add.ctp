<?php
	echo $this->Form->create();
	echo $this->Form->inputs(array(
		'legend' => 'Signup',
		'username',
		//'email',
		'password'
		//'group_id'
	));
	echo $this->Form->end('Submit');
