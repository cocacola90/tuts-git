<?php 
echo $this->Form->create('Country',array('type' => 'file'));
echo $this->Form->input('file_csv',array('type' => 'file'));
$options = array(
	'2' => 'Parcel',
	'3' => 'EMS',
	'4' => 'DHL'
);
echo $this->Form->input('type',array('options'=>$options,'type' => 'select'));
echo $this->Form->end('Submit');
?>