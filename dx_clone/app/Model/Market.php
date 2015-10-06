<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Post $Post
 * @property Product $Product
 * @property Value $Value
 * @property Attribute $Attribute
 */
class Market extends AppModel {


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Product' => array(
			'className' => 'Product',
			'joinTable' => 'products_markets',
			'foreignKey' => 'market_id',
			'associationForeignKey' => 'product_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
	public $actsAs = array('Containable');
}
