<?php // no direct access

defined('_JEXEC') or die('Restricted access'); ?>

<div>
<?php
	$kol = $kol1;
	$dziel = (100 / $kol)-1;
	global $check1, $check2;
	$check1 = 0;
	$check2 = 0;
	$pl = 15;
	$ost = 15;
	$r = date('Y');
	$rc = substr($r, 2, 2);
			
	function wysDC($dirName,$rc,$ost,$dziel) {
			
			global $check1, $check2;
			for ($pl=$ost; $pl>0; $pl--) {
				$plik = 'gazeta_'.$pl.'_'.$rc.'.jpg';
				$plik_pdf = 'gazeta_'.$pl.'_'.$rc.'.pdf';
				$spr = file_exists($dirName.'/'.$plik);
				$spr_pdf = file_exists($dirName.'/'.$plik_pdf);
				if ($spr && $spr_pdf) {echo '<div class="lastnr" style="width:'.$dziel.'%"><a onClick="_gaq.push([\'_trackEvent\', \'Gazeta\', \'Pliki\', \''.$plik_pdf.'\']);" href="'.$dirName.'/'.$plik_pdf.'">';
					echo '<img src="'.$dirName.'/'.$plik.'"/></a></div>';
					$check1++;
					$check2 = $pl;
					break;
					}
					
				
				}
		
	
	}
	wysDC($folder,$rc,15,$dziel);
	if ($check1 == 0) {
		$rc--;
		wysDC($folder,$rc,$ost,$dziel);
		}
	
	if ($kol>1) {
	
		if ($check2==1) {
			$rc--;
			wysDC($folder,$rc,15,$dziel);
			}
		else {
		$check2=$check2-1;
		wysDC($folder,$rc,$check2,$dziel);
	}
		
	if ($kol>2) {
		if ($check1==2) {
		if ($check2==1) {
		$rc--;
		wysDC($folder,$rc,15,$dziel);
		}
		else {
		$check2=$check2-1;
		wysDC($folder,$rc,$check2,$dziel);
		}
		}
	
	}
	}
			

    


?>
</div> 		
	
	   
	   
	   
	   
 
