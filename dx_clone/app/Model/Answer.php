<?php 
App::uses('AppModel','Model');
class Answer extends AppModel{
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache'=>true,
		),
		'Contact' => array(
			'className' => 'Contact',
			'foreignKey' => 'contact_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache'=>true,
		)
	);
	public $actsAs = array('Containable');
}
?>