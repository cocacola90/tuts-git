/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = 'http://dx.nguyenpham.info/js/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = 'http://dx.nguyenpham.info/js/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = 'http://dx.nguyenpham.info/js/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = 'http://dx.nguyenpham.info/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = 'http://dx.nguyenpham.info/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = 'http://dx.nguyenpham.info/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
