/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.allowedContent = true;
	config.extraPlugins = 'ivpimageupload,youtube';

	/*config.image_removeLinkByEmptyURL= true;
	config.image_previewText = CKEDITOR.tools.repeat( 'ตัวอย่างรูปภาพ ', 100 );*/
    config.imageBrowser_listUrl = 'none';
};
