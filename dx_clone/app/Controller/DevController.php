<?php 
App::uses('AppController','Controller');
class DevController extends AppController{
	public $components = array('Paginator');
	public $uses = array('Product','Category','Value','Attribute');
	public function product_info(){
		$category = 'electronics';
		$product = 'lenovo-a916-android-4-4-octa-core-fdd-lte-4g-smartphone-w-5-5-ips-hd-8gb-13mp-gps-wi-fi-black';
		$id = 16;
		//$this->autoRender = false;
		Configure::write('debug',2);
		
		// $a = $this->
		
		
		$product = $this->Product->find('first',
            array(
                'conditions' => array('Product.slug' => $product, 'Product.id' => $id),
                'contain' => array(
                    'Value' => array(
                        'fields' => array('id', 'name', 'attribute_id')
                    ),
                    'Tag' => array('id', 'name', 'slug'),
                    'Category' => array(
                        'fields' => array('id', 'name', 'slug')
                    )
                )/*,
				'joins' => array(
					array(
						'table' => 'products_markets',
						'alias' => 'ProductsMarket',
						'type' => 'inner',
						'conditions' => array('Product.id = ProductsMarket.product_id')
					),
					array(
						'table' => 'markets',
						'alias' => 'Market',
						'type' => 'inner',
						'conditions' => array('ProductsMarket.market_id = Market.id')
					)
				)*/
            )
        );
        pr($product);
        if ($product) {
            #update view count
            $AlreadyRead = $this->Session->check('sp_' . $id);
            if (!$AlreadyRead) {
                $this->Product->updateAll(
                    array('Product.view_count' => 'Product.view_count+1'),
                    array('Product.id' => $id)
                );
                $this->Session->write('sp_' . $id, $id);
            }
            #lay thong so ky thuat cua san pham
            $this->loadModel('Category');
            $this->loadModel('Value');
            $this->loadModel('Attribute');
			$attribute = $this->Attribute->find('all',array(
				'joins' => array(
					array(
						'table' => 'categories_attributes',
						'alias' => 'CategoriesAttribute',
						// 'type' => 'inner',
						'conditions' => array('Category.id = CategoriesAttribute.attributes_id','Category.id' => $product['Category']['id'])
					),
					array(
						'table' => 'attributes',
						'alias' => 'Attribute',
						//'type' => 'inner',
						'conditions' => array('CategoriesAttribute.attribute_id = Attribute.id')
					),
					
				)
			));
			pr($attribute);exit;
            $attribute_id = array();
            foreach ($product['Value'] as $val) {
                array_push($attribute_id, $val['attribute_id']);

            }
			pr($attribute_id);
            $attribute = $this->Attribute->find('all', array(
                'conditions' => array('Attribute.id' => $attribute_id),
                'fields' => array('id', 'name','view'),
                'recursive' => -1

            ));
			  pr($attribute);exit;
            $this->loadModel('Comment');

            #==== comment product ====

            $comments = $this->Comment->find('all', array(
                'conditions' => array(
                    'Comment.product_id' => $id),
                'order' => array('Comment.created' => 'DESC'),

            ));

            #======== related product ==============#
            /* $related = $this->Product->find('all', array(
                    'conditions' => array(
                        'Product.status' => 1,
                        'Product.id <>' => $product['Product']['id'],
                        'Product.category_id' => $product['Product']['category_id']
                    ),
                    'limit' => 4,
                    'fields' => array('name', 'price', 'thumbnail', 'description', 'sale_artifacts', 'id', 'category_id', 'slug', 'discount', 'discount_status'),
                    'contain' => array(
                        'Category' => array(
                            'fields' => array('id', 'name', 'slug')
                        )
                    ),
                    'order' => 'rand()',
                )
            );
 */
			#========= get combo ==============#
			$combo = $this->get_combo_discount($product['Product']['id'],$product['Product']['category_id']);
			if($combo)
			{
				$this->set('combo',$combo);
			}
            $this->set('attribute', $attribute);
            $this->set('comments', $comments);

            $this->set(compact('product', 'attribute'));
            $this->set('title_for_layout', $product['Product']['name']);
        } else {
           $this->redirect('/err');

        }
	}
	public function get_combo_discount($pro_id,$cat_id)
	{
		$this->loadModel('Combo');
		$combo = $this->Combo->find('first',array(
				'conditions' => array(
					'OR' => array(
						'Combo.product_id' => $pro_id,
						'Combo.category_id' => $cat_id
					)
				),
				'recursive' => 0
			)	
		);
		return $combo;
	}
}

?>