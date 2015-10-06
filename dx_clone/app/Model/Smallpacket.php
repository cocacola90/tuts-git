<?php 
App::uses('AppModel','Model');
class Smallpacket extends AppModel
{
	public function afterSave($created, $options = array()) {
    //if ($created) {
        Cache::delete('short_product_general_query_2');
    //}
	}
}
?>