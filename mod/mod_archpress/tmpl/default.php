<?php // no direct access

defined('_JEXEC') or die('Restricted access'); ?>
<img src="<?php echo $folder?>/logo.png" />
<div id="arch" style="margin: 0 auto;" >
<?php 
	$path = $folder;
	$year = $startYear;
	
	echo '<div class="etykarch">Wybierz:  </div><div id="archmenu">';
	for ($r=date('Y'); $r>=$year; $r--){
		echo '<a href=#Rok'.$r.' />Rok '.$r.'</a>';
		if ($r>$year) {echo ' | ';};
		};
			
		echo '<br><br></div>';
		?>
<?php 
	for ($r=date('Y'); $r>=$year; $r--){
	echo '<div id="rok">';
	echo '<h3 id="Rok'.$r.'">Rok '.$r.'</h3>';
	$rc= substr($r, 2, 2);
	    for ($pl=1; $pl<=13; $pl++)
			{
				$plik = 'gazeta_'.$pl.'_'.$rc.'.jpg';
				$plik_pdf = 'gazeta_'.$pl.'_'.$rc.'.pdf';
				$spr = file_exists($path.'/'.$plik);
				$spr_pdf = file_exists($path.'/'.$plik_pdf);
				if ($spr && $spr_pdf) {
				echo '<a onClick="_gaq.push([\'_trackEvent\', \'Gazeta\', \'Pliki\', \''.$plik_pdf.'\']);" href="'.$path.'/'.$plik_pdf.'"><img src="'.$path.'/'.$plik.'"/><span class="hide">'.$plik_pdf.'</span></a>'; 
				};
			}
	 
	echo '</div>';
	}
?>
</div>
