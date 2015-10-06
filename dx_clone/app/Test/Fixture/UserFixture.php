<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'username' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf32_unicode_ci', 'charset' => 'utf32'),
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
			'group_id' => 1,
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'created' => 1,
			'modified' => 1
		),
	);

}
