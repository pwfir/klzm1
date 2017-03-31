<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_banners
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once JPATH_ROOT . '/components/com_banners/helpers/banner.php';
$baseurl = JUri::base();

//ilość kolum logo
	$listpos = array_chunk ($list, ($number_columns*$number_rows));
	$what=count($list);
	$what=$what/($number_columns*$number_rows); 

	if ($what != 1 && $what > 1) : ?>
		<div class="bannergroup <?php echo $moduleclass_sfx ?>">
		<?php if ($headerText) :
		echo $headerText;
		endif ?>
		</div>
	<div style="" class="sppb-carousel sppb-slide" data-sppb-ride="sppb-carousel">
	<?php endif ?>

	 <?php if ($what != 1 && $what > 1) : 
				if ($indi1){ ?>
				<ol class="sppb-carousel-indicators" class="carousel slide" data-ride="carousel">
				<?php // działa w połączenie ze skryptami SP
	
				for($e=0; $e < $what; $e++){
				$output = '<li data-sppb-target="#sppb-carousel"'. (($e == 1) ? ' class="active"': '' ) .'  data-sppb-slide-to="'. $e .'"></li>' . "\n";
				echo $output;}?>
	
	
				</ol>
	<?php } ?>
	<div class="sppb-carousel-inner sppb-text-center">
	
	 <?php endif ?>
		
		
		<?php for ($i=0; $i <$what; $i++)  {?>
				
				<?php if ($what != 1 && $what > 1) : ?>
				<div class="sppb-item">
				<div class="sppb-carousel-item-inner">
				 <?php endif ?>
				
				
				<?php foreach ($listpos[$i] as $item) : ?>
				
				
				
				
					<div class="banneritem" style="width: <?php echo 100/$number_columns;?>%">
						<?php $link = JRoute::_('index.php?option=com_banners&task=click&id=' . $item->id);?>
						<?php if ($item->type == 1) :?>
							<?php // Text based banners ?>
							<?php echo str_replace(array('{CLICKURL}', '{NAME}'), array($link, $item->name), $item->custombannercode);?>
						<?php else:?>
							<?php $imageurl = $item->params->get('imageurl');?>
							<?php $width = $item->params->get('width');?>
							<?php $height = $item->params->get('height');?>
							<?php if (BannerHelper::isImage($imageurl)) :?>
								<?php // Image based banner ?>
								<?php $alt = $item->params->get('alt');?>
								<?php $alt = $alt ? $alt : $item->name; ?>
								<?php $alt = $alt ? $alt : JText::_('MOD_BANNERS_BANNER'); ?>
								<?php if ($item->clickurl) :?>
									<?php // Wrap the banner in a link?>
									<?php $target = $params->get('target', 1);?>
									<?php if ($target == 1) :?>
										<?php // Open in a new window?>
										<a
											href="<?php echo $link; ?>" target="_blank"
											title="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8');?>">
											<img
												src="<?php echo $baseurl . $imageurl;?>"
												alt="<?php echo $alt;?>"
												<?php if (!empty($width)) echo 'width ="' . $width . '"';?>
												<?php if (!empty($height)) echo 'height ="' . $height . '"';?>
											/>
										</a>
									<?php elseif ($target == 2):?>
										<?php // Open in a popup window?>
										<a
											href="<?php echo $link;?>" onclick="window.open(this.href, '',
												'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550');
												return false"
											title="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8');?>">
											<img
												src="<?php echo $baseurl . $imageurl;?>"
												alt="<?php echo $alt;?>"
												<?php if (!empty($width)) echo 'width ="' . $width . '"';?>
												<?php if (!empty($height)) echo 'height ="' . $height . '"';?>
											/>
										</a>
									<?php else :?>
										<?php // Open in parent window?>
										<a
											href="<?php echo $link;?>"
											title="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8');?>">
											<img
												src="<?php echo $baseurl . $imageurl;?>"
												alt="<?php echo $alt;?>"
												<?php if (!empty($width)) echo 'width ="' . $width . '"';?>
												<?php if (!empty($height)) echo 'height ="' . $height . '"';?>
											/>
										</a>
									<?php endif;?>
								<?php else :?>
									<?php // Just display the image if no link specified?>
									<img
										src="<?php echo $baseurl . $imageurl;?>"
										alt="<?php echo $alt;?>"
										<?php if (!empty($width)) echo 'width ="' . $width . '"';?>
										<?php if (!empty($height)) echo 'height ="' . $height . '"';?>
									/>
								<?php endif;?>
							<?php elseif (BannerHelper::isFlash($imageurl)) :?>
								<object
									classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
									codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
									<?php if (!empty($width)) echo 'width ="' . $width . '"';?>
									<?php if (!empty($height)) echo 'height ="' . $height . '"';?>
								>
									<param name="movie" value="<?php echo $imageurl;?>" />
									<embed
										src="<?php echo $imageurl;?>"
										loop="false"
										pluginspage="http://www.macromedia.com/go/get/flashplayer"
										type="application/x-shockwave-flash"
										<?php if (!empty($width)) echo 'width ="' . $width . '"';?>
										<?php if (!empty($height)) echo 'height ="' . $height . '"';?>
									/>
								</object>
							<?php endif;?>
						<?php endif;?>
						<div class="clr"></div>
					</div>
	
	
	
	
	
				
		<?php endforeach; ?>
			
			
			<?php if ($what != 1 && $what > 1) : ?></div>
		</div>
		 <?php endif ?>
	<?php }; ?>
				
			<?php if ($what != 1 && $what > 1) : ?>
		</div>
		 <?php endif ?>
	

  <?php if ($what > 1 && $arrow1) : ?>
	<a style="" class="sppb-carousel-arrow left sppb-carousel-control" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
	<a style="" class="sppb-carousel-arrow right sppb-carousel-control" role="button" data-slide="next"><i class="fa fa-chevron-right"></i></a>
		<?php endif ?>
		
  <?php if ($footerText) : ?>
	<div class="bannerfooter">
		<?php echo $footerText; ?>
	</div>
	<?php endif; ?>
	<?php if ($what != 1 && $what > 1) : ?>
	</div>
	
	<?php endif; ?>
	
	
	