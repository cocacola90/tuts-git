<?php 
echo $this->Form->create('Order');
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('card_type');
echo $this->Form->input('card_number');
echo $this->Form->input('month');
echo $this->Form->input('year');
echo $this->Form->input('cvv2');
echo $this->Form->input('amount');
echo $this->Form->end('submit');
?>