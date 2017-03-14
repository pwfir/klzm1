<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
$article = JTable::getInstance('content'); // pobranie danych do altów
$article->load($displayData['item']->id); // pobranie danych do altów

if($displayData['params']->get('gallery')) {
	$images = json_decode( $displayData['params']->get('gallery') );

	if( count( $images->gallery_images ) ) {
		?>


		<div id="carousel-gallery-<?php echo $displayData['item']->id; ?>" class="entry-gallery carousel slide" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				<?php

		
				
					$i = 1;
					foreach ( $images->gallery_images as $key => $image ) {
					$i++;
					
					
						?>
							<div class="item<?php echo ($key===0) ? ' active': ''; ?>">
								<img src="<?php echo $image; ?>" alt="<?php if ($images->image_fulltext_alt != '') {echo htmlspecialchars($images->image_fulltext_alt);} else {echo  $article->get('title').'. Zdjęcie numer '.$i;}; ?>">
							</div>
						<?php
					}
				?>
			</div>
			<?php if ($displayData['params']->get('gallery_caption')!="") {
			  echo '<p class="pcap">'.$displayData['params']->get('gallery_caption').'</p>';
			}?>
			
			
			 
			 
			<a class="carousel-left" href="#carousel-gallery-<?php echo $displayData['item']->id; ?>" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Poprzednie zdjęcie</span>
			</a>
			<a class="carousel-right" href="#carousel-gallery-<?php echo $displayData['item']->id; ?>" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"></span>
				<span class="sr-only">Następne zdjęcie</span>
			</a>
		</div>

		<?php
	}

}
