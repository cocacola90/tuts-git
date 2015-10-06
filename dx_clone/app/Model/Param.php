<?php 
App::uses('AppModel','Model');
class Param extends AppModel{
	public function afterSave($created, $options = array()){
        Cache::delete('short_cache_support');
    }
}
?>