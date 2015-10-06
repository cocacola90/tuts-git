<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::parseExtensions('html', 'rss');
	Router::connect('/', array('controller' => 'products', 'action' => 'home'));
	Router::connect('/admin', array('controller' => 'products', 'action' => 'index', 'admin' => true));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
	Router::connect('/register', array('controller' => 'users', 'action' => 'register'));
	Router::connect('/new-arrivals', array('controller' => 'products', 'action' => 'product_new'));
	Router::connect('/top-sellers', array('controller' => 'products', 'action' => 'top_seller'));
	Router::connect('/sale', array('controller' => 'products', 'action' => 'gift_ideas'));
	Router::connect('/featured-items', array('controller' => 'products', 'action' => 'featured_item'));
	Router::connect('/cart-details', array('controller' => 'orders', 'action' => 'cart_detail'));
	Router::connect('/tracking', array('controller' => 'orders', 'action' => 'order_tracking'));
	Router::connect('/my-profile', array('controller' => 'users', 'action' => 'profile'));
	Router::connect('/edit-profile', array('controller' => 'users', 'action' => 'edit_profile'));
	Router::connect('/my-wishlist', array('controller' => 'users', 'action' => 'wishlist'));
	Router::connect('/blogs', array('controller' => 'posts', 'action' => 'index'));
	Router::connect('/faq', array('controller' => 'posts', 'action' => 'faq'));
	Router::connect('/faq_search/*', array('controller' => 'posts', 'action' => 'search'));
	Router::connect('/submit-testimonial', array('controller' => 'testimonials', 'action' => 'submit_testimonial'));
	Router::connect('/blogs/:slug_post-:id',
		array('controller' => 'posts', 'action' => 'view'),
		array(
			'pass' => array('slug_post', 'id'),
			'id' => '[0-9]+'
		)
	);
	Router::connect('/:category/:product-:id',
		array('controller' => 'products', 'action' => 'view_product'),
		array(
			'pass' => array('category', 'product', 'id'),
			'id' => '[0-9]+'
		)
	);
	
	
	Router::connect('/category/:category', 
		array('controller' => 'categories', 'action' => 'index'),
		array('pass' => array('category'))
	);
	Router::connect('/sieu-thi/:category', 
		array('controller' => 'markets', 'action' => 'index'),
		array('pass' => array('category'))
	);
	
	Router::connect('/serach/*', array('controller' => 'products', 'action' => 'search'));
    Router::connect('/thanh-toan/*', array('controller' => 'orders', 'action' => 'add'));
    Router::connect('/err', array('controller' => 'test', 'action' => 'success'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
