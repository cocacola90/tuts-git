<?php
App::uses('AppModel', 'Model');
/**
 * Combo Model
 *
 * @property Product $Product
 * @property Category $Category
 */
class Combo extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(


	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
