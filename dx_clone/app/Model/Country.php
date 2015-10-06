<?php 
App::uses('AppModel','Model');
class Country extends AppModel{
	public function afterSave($created, $options = array()){
      
        Cache::delete('short_cache_currency');
       
    }
}
?>