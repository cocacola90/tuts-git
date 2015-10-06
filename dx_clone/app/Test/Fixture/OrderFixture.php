<?php
/**
 * OrderFixture
 *
 */
class OrderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'code' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'total' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'viewed' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'ship_type' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'full_name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'tel' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'address' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'date_of_birth' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'sex' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'note' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'created' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'modified' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'user_id' => 1,
			'code' => 'Lorem ipsum dolor sit amet',
			'total' => 1,
			'status' => 1,
			'viewed' => 1,
			'ship_type' => 1,
			'full_name' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'tel' => 1,
			'address' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'date_of_birth' => 1,
			'sex' => 1,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => 1,
			'modified' => 1
		),
	);

}
