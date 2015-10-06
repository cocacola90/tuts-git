<?php
/**
 * ProductFixture
 *
 */
class ProductFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'category_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'slug' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'price' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'price_sale' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'thumbnail' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'image_more' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'sale_artifacts' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf32_unicode_ci', 'comment' => 'Tang kem', 'charset' => 'utf32'),
		'content' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'meta_description' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'meta_keyword' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'view_count' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'publish' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'prominent' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'San pham noi bat'),
		'created' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'modified' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			
		),
		'tableParameters' => array('charset' => 'utf32', 'collate' => 'utf32_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'category_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'slug' => 'Lorem ipsum dolor sit amet',
			'price' => 1,
			'price_sale' => 1,
			'status' => 1,
			'thumbnail' => 'Lorem ipsum dolor sit amet',
			'image_more' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'sale_artifacts' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'meta_description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'meta_keyword' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'view_count' => 1,
			'publish' => 1,
			'prominent' => 1,
			'created' => 1,
			'modified' => 1
		),
	);

}
