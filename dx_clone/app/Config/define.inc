<?php

//NOTICE: save me to UTF8 without BOM
//define('BASE_PATH', 'http://'.$_SERVER['HTTP_HOST'].'/');
//define('PARENT_PATH', dirname(BASE_PATH));
//define('APP_PATH', BASE_PATH . 'app/');
//define('VENDOR_PATH', APP_PATH . 'Vendor/');
//define('MODEL_PATH', APP_PATH . 'Model/');
//define('VIEW_PATH', APP_PATH . 'View/');
//define('LIB_PATH', APP_PATH . 'Lib/');
//define('PLUGIN_PATH', APP_PATH . 'Plugin/');
//define('CONFIG_PATH', dirname(__FILE__) . '/');
//define('WEBROOT_PATH', getcwd() . '/');
//define('LANG_PATH', LIB_PATH . 'lang/');
//define('LOG_PATH', APP_PATH . 'log/');
//define('DIR_NAME', basename(BASE_PATH));
//define('DIR_DATA', WEBROOT_PATH . 'data/');
//define('IMAGE_UPLOAD_PATH', WEBROOT_PATH . 'img/image/');
//define('IMAGE_AVATAR_PATH', WEBROOT_PATH . 'img/avatar/');

/* Import library */
App::import('Lib', 'GlobalVar');
//App::import('Lib', 'UserAgentInfo');
//App::uses('FB', 'Lib');
//App::import('Lib', 'OJMPHP');
//App::import('Lib', 'bitly');
//App::import('Lib', 'Extend');
App::import('Vendor', 'simple_html_dom');
App::import('Vendor', 'Ratings');
App::import('Vendor', 'Parsecsv');
//require_once VENDOR_PATH . 'simple_html_dom.php';



if ($_SERVER['HTTP_HOST'] == 'localhost') {
    define('SYSTEM_EVIRONMENT', 'localhost');
} else {
    if (strrpos(__FILE__, "/home/wannabies2/") !== false || strrpos($_SERVER['HTTP_HOST'], "kunitwru.byethost7.company_link") !== false) {
        define('SYSTEM_EVIRONMENT', 'development'); // x10
    } else {
        define('SYSTEM_EVIRONMENT', 'production');
    }
}

function is_localhost() {
    return SYSTEM_EVIRONMENT == 'localhost';
}

function is_development() {
    return SYSTEM_EVIRONMENT == 'development';
}

function is_production() {
    return SYSTEM_EVIRONMENT == 'production';
}

date_default_timezone_set('Asia/Singapore');
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', 0);
//ini_set("log_errors", "On");
//ini_set("error_log", LOG_PATH . "/error_" . date("Ymd") . ".log");

if ($_SERVER['SERVER_PORT'] == 80) {
    $protocol = 'http';
} else {
    $protocol = 'https';
}
$protocol = 'http'; //force use SSL

define('SERVER_NAME', $_SERVER['HTTP_HOST']);
define('HTTP_PROTOCOL', $protocol);
define('CALLBACK_PROTOCOL', 'http'); //callback function must be predifined

define('ROOT_URL', HTTP_PROTOCOL . "://" . SERVER_NAME   ."/");
define('ADMIN_URL', HTTP_PROTOCOL . "://" . SERVER_NAME   ."/admin/");
define('ROOT_URL_CALLBACK', CALLBACK_PROTOCOL . "://" . SERVER_NAME  ."/");
// define web root url
define('ADMIN_HOME_URL', HTTP_PROTOCOL . '://' . SERVER_NAME  ."/admin/");
define('ADMIN_ROOT_URL', HTTP_PROTOCOL . '://' . SERVER_NAME  ."/");
define('DEFAULT_LANG', 'vn');
define('RETURN_URL', HTTP_PROTOCOL . "://" . SERVER_NAME . $_SERVER["REQUEST_URI"]);
define('CALLBACK_URI', ROOT_URL_CALLBACK . 'callback/');
define('BITLY_KEY', 'bc766f8aeff0890f88bd5bf68070d0ae7bbdd8ff');
define('BITLY_OAUTH_API', 'https://api-ssl.bit.ly/v3/');
define('DEFAULT_CURRENCY' , 'USD');
define('PATH_COOKIE','.nguyenpham.info');
define('DOMAIN_ROOT', 'http://dx.nguyenpham.info');
define('NAME_SITE','KEN');
define('SYS_MSG1','You are not logged in');
define('SYS_MSG2','Username or Password is invalid');
define('SYS_MSG3','The captcha you entered is invalid.');
define('SYS_MSG4','The old password is incorrect');
define('SYS_MSG5','The data has been saved.');
define('SYS_MSG6','The data could not be saved. Please, try again.');
define('SYS_MSG7','You have successfully logged.');
define('SYS_MSG12','You have successfully logged out.');
define('SYS_MSG8','You have successfully registered.');
define('SYS_MSG9','You have registered not success');
define('SYS_MSG10','You are logged.');
define('SYS_MSG11','This email is already activated in another account.');
define('SYS_MSG13','Email does not exist.');
define('SYS_MSG14','A new password has been sent to your e-mail address.');
define('SYS_MSG15','Your account is not yet verified the email, enter the email address for confirmation!');
define('SYS_MSG16','Sorry, No results found');
define('SYS_MSG17','The Email already exists');
define('SYS_MSG18','The Username already exists');
define('SYS_MSG19','The Passwords does not match.');

define('CART_MSG1','Your Shopping Cart is empty!');
GlobalVar::write('status', array(
    '1' => 'Hiển thị',
    '0' => 'Không hiển thị'
));
GlobalVar::write('publish', array(
    '1' => 'Còn hàng',
    '0' => 'Hết hàng'
));
GlobalVar::write('main', array(
    '1' => 'Hiển thị ',
    '0' => 'Không hiển thị'
));
GlobalVar::write('continent', array(
    '1' => 'Châu Á',
    '2' => 'Châu Âu',
	'3' => 'Châu Phi',
	'4' => 'Châu Mỹ',
	'5' => 'APPU'
));

GlobalVar::write('discount_status', array(
    '0' => 'Không khuyến mại',
    '1' => 'Có khuyến mại'
));

GlobalVar::write('type_slide', array(
    '0' => 'Slide',
    '1' => 'Quảng cáo'
));
GlobalVar::write('ship_type', array(
    '1' => 'SmallPacket',
    '2' => 'Parcel',
	'3' => 'EMS',
	'4' => 'DHL'
));

GlobalVar::write('sex', array(
    '0' => 'Nữ',
    '1' => 'Nam'
));
GlobalVar::write('order_status', array(
    '0' => 'Chưa xử lý',
    '1' => 'Đã xử lý'
));
GlobalVar::write('type_cat', array(
    '0' => 'Sản phẩm',
    '1' => 'Tin tức'
));

GlobalVar::write('type_combo', array(
    '1' => 'Combo cho sản phẩm',
    '2' => 'Combo cho mục hàng'
));
GlobalVar::write('contact_status', array(
    '0' => 'Chưa xử lý',
    '1' => 'Đã xử lý'
));
GlobalVar::write('currency_support_for_paypal',array(
	'0' => 'AUD',
	'1' => 'BRL',
	'2' => 'CAD',
	'3' => 'CZK',
	'4' => 'DKK',
	'5' => 'EUR',
	'6' => 'HKD',
	'7' => 'HUF',
	'8' => 'ILS',
	'9' => 'JPY',
	'10' => 'MYR',
	'11' => 'MXN',
	'12' => 'NOK',
	'13' => 'NZD',
	'14' => 'PHP',
	'15' => 'PLN',
	'16' => 'GBP',
	'17' => 'RUB',
	'18' => 'SGD',
	'19' => 'SEK',
	'20' => 'CHF',
	'21' => 'TWD',
	'22' => 'THB',
	'23' => 'TRY',
	'24' => 'USD'
));