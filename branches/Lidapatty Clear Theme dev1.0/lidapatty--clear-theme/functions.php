<?php
/**
 * Invent Themes
 * Copyright (c) 2011
 * functions.php
 * Simple bootloader file
 */

// some globals functions
include 'library/Invent/globals.php';

require_once('library/Invent/Shortcodes.php');
require_once('library/Invent/Upload.php');
$u = new Invent_Upload();
$u->init();

require_once('library/Invent/Ajax.php');
$inventAjax = new Invent_Ajax();

if (is_admin()) {
	require_once('library/Invent/Admin.php');
	require_once('library/Invent/Gallery.php');
	$invent = new Invent_Admin;
	$invent->init();
} else {
	require_once('library/Invent/Site.php');
	$invent = new Invent_Site();
}

include 'library/Invent/Widgets.php';
$inventWidgets = new Invent_Widgets;
add_action('widgets_init', Array($inventWidgets, 'unregisterDefault'), 1);
$inventWidgets->registerWidgets();