<?php
/**
 * @package Xpert Accordion
 * @version 1.0-3-G424E763
 * @author ThemeXpert http://www.themexpert.com
 * @copyright Copyright (C) 2009 - 2011 ThemeXpert
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 */
 
// no direct access
defined('_JEXEC') or die('Restricted accessd');

// Check for the framework, if not found eject
include_once JPATH_LIBRARIES . '/xef/bootstrap.php';

if( !defined('XEF_INCLUDED'))
{
    echo 'Your Module installation is broken; please re-install. Alternatively, extract the installation archive and copy the xef directory inside your site\'s libraries directory.';
    return ;
}

// Include the syndicate functions only once
require_once (dirname(__FILE__). '/helper.php');

//set module id
$module_id = XEFUtility::getModuleId($module, $params);

// Content source
$content_source = $params->get('content_source','joomla');

// Import source and get the class name
$class_name = importSource($content_source);

// Create instance of the class
$instance = new $class_name($module, $params);

// Get the items
$lists = $items = $instance->getItems(); // using 2 variable for backward compatibility

// Load Stylesheet file
XEFUtility::loadStyleSheet($module, $params);

// Load Module specific script
XEFXpertAccordionHelper::loadScripts($module, $params);

require JModuleHelper::getLayoutPath( $module->module, $params->get('layout', 'default') );