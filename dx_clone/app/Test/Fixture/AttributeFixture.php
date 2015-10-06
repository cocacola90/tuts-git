<?php
/**
 * AttributeFixture
 *
 */
class AttributeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'slug' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'meta_description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'meta_keyword' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'order' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'menu' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'search' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'thumbnail' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'slug' => 'Lorem ipsum dolor sit amet',
			'meta_description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'meta_keyword' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'order' => 1,
			'status' => 1,
			'menu' => 1,
			'search' => 1,
			'thumbnail' => 'Lorem ipsum dolor sit amet'
		),
	);

}
