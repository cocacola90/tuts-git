<?php
/**
 * Created by PhpStorm.
 * User: Kenshin
 * Date: 5/4/2015
 * Time: 2:10 PM
 */
App::uses('AppController','Controller');
class TagsController extends AppController{
    public $components = array('Paginatior');
    public $uses = array('Tag','Product');
    public function list_tag()
    {
        $data = $this->Tag->find('all',array(
            'limit' => 15,
            'recursive' => -1,
            'order' => 'rand()'
        ));
        return $data;
    }
    public function view_tag($slug = null , $id =null){
        $this->layout = 'view';
        $data_slug = $this->Tag->find('first',array(
            'conditions' => array(
                'Tag.slug' => $slug
            ),
            'recursive' => -1
        ));
        // if($data_slug)
        // {
        $this->Paginator->settings = array(
            'order'=>array('Product.created'=>'desc','Product.status' => 1),
            'limit'=>20,
            'conditions'=>array(
                'Tag.slug'=>$slug
            ),
            'joins'=>array(
                array(
                    'table'=>'products_tags',
                    'alias'=>'ProductsTag',
                    'conditions'=>'ProductsTag.product_id = Product.id'

                ),
                array(
                    'table'=>'tags',
                    'alias'=>'Tag',
                    'conditions'=>'ProductsTag.tag_id = Tag.id',
                ),
            ),
            'recursive' => -1,
            'contain' => array(
                'Topic' => array('id' ,'slug')
            )

        );
        $this->set('tags',$this->Paginator->paginate('Product'));
        $this->set(compact('data_slug'));
        $this->set('title_for_layout',$data_slug['Tag']['name']);
        // }
        // else
        // {
        // $this->Session->setFlash('Không tồn tại Tag này !');
        // }
    }
}