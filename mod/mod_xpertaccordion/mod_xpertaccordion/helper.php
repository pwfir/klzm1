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
defined( '_JEXEC' ) or die('Restricted access');

abstract class XEFXpertAccordionHelper
{
    public static function loadScripts($module, $params)
    {
        $doc = JFactory::getDocument();

        // Set moduleid
        $module_id = XEFUtility::getModuleId($module, $params);

        // Load jQuery form framework
        XEFUtility::addjQuery($module, $params);

        $js = "jQuery(#$module_id).collapse();";

        //$doc->addScriptDeclaration($js);

        if(!defined('XPERT_ACCORDION')){
            //add tab engine js file
            $doc->addScript(JURI::root(true).'/modules/mod_xpertaccordion/assets/js/xpertaccordion.js');
            define('XPERT_ACCORDION',1);
        }
    }
}