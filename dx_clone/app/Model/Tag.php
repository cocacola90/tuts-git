<?php
/**
 * Created by PhpStorm.
 * User: Kenshin
 * Date: 5/4/2015
 * Time: 2:05 PM
 */

App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 * @property Video $Video
 */
class Tag extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = array(
        'Product' => array(
            'className' => 'Product',
            'joinTable' => 'products_tags',
            'foreignKey' => 'tag_id',
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

}
