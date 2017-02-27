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
$i = 0;
?>
    <!--Xpert Accordion (version 1.0-3-G424E763) by ThemeXpert- Start-->
    <div id="<?php echo $module_id;?>" class="xac-wrapper <?php echo $params->get('theme');?>">
    <?php foreach($lists as $item):?>
        <h4 class="xac-trigger">
            <span><?php echo $item->title;?></span>
        </h4>
        <div class="xac-container">
            <?php echo $item->introtext;?>
        </div>
    <?php endforeach ;?>
    </div>
    <!--Xpert Accordion (version 1.0-3-G424E763) by ThemeXpert- End-->