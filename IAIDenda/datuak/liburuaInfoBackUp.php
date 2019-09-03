
<!DOCTYPE html>
<html lang="eu" xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<?php
	echo '<title>'.$_GET['isbn'].' info</title>';
	include 'headT.php';
	echo'</head>';
	//ISBN GET eskaerarik dagoen ikusi
	if (isset($_GET['isbn'])){
		$aurkitua=false;
		$isbn = $_GET['isbn'];
		$xml=simplexml_load_file("datuak/liburuak.xml") or die("Error: Cannot create object");

		//XML fitxategiko liburuak irakurri, bakoitzaren isbn atributua ikusi eta GET isbn-ren berdina bada,
		//bilatzen ari garen liburua aurkitu dugu. Datuak aldagaietan gordeko ditugu.
		//Zuzenean datu basetik bilatu dezakegu, argazkia bertan bakarrik bait dago, baina
		//ariketa XML fitxategian bilatzea da.
		foreach($xml->children() as $liburuak) {

			if(($liburuak['isbn'])==$isbn){
				//argazkiak gordeko diren karpetaren helbidea
				$argazkia = 'datuak/fitxategiak/liburuak/img/';
				$argazkia= $argazkia.$liburuak['argazkia'];
				$hizkuntza=$liburuak['hizkuntza'];
				$iritzia=$liburuak['iritzia'];
				$izenburua=$liburuak->izenburua;
				$idazleIzena=$liburuak->idazleizena;
				$argitaletxea=$liburuak->argitaletxea;
				$sinopsia=$liburuak->sinopsia;
				$urtea=$liburuak->urtea;
				$stock=$liburuak->stock;
				$sinopsia=$liburuak->sinopsia;
				//liburua existitzen dela dakigu
				$aurkitua=true;
			}
		}
		//liburua aurkitu bada, hemenbere datuak erakutsiko ditugu
		if($aurkitua==true){
		/**********************************************************************/
		echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
		echo '<div class="container-fluid ">';
		echo '<h1 class="text-md-center"></h1>';
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<div class="container-fluid">';
		
		echo '<image src="'.$argazkia.'" class="img-thumbnail img-fluid  mx-auto d-block" width="350px">';
		echo '<div class="caption text-md-center"><em>'.$isbn.'</em></div>';
		echo '</div>';
		echo '<hr>';
		//<!--CARDS start here-->
		echo '<div class="card card-1 col-md-6 text-md-center" id="card1">';
		echo '<table class="table table-hover">';
		echo '<tbody>';
		
		echo '<div class="embed-responsive embed-responsive-16by9">';
		echo '<iframe class="embed-responsive-item" src="'.$iritzia.'" frameborder="0"></iframe>';
		echo '</div>';
		
		echo '<tr>';		
		echo '<td><span class="bold">ISBN</span></td>';
		echo '<td colspan="2">'.$isbn.'</td>';
		echo '</tr>';
		
		
		echo '<tr>';		
		echo '<td><span class="bold">Izenburua</span></td>';
		echo '<td colspan="2">'.$izenburua.'</td>';
		echo '</tr>';
		
		echo '<tr>';		
		echo '<td><span class="bold">Idazlea</span></td>';
		echo '<td colspan="2">'.$idazleIzena.'</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td><span class="bold">Hizkuntza</span></td>';
		echo '<td colspan="2">'.$hizkuntza.'</td>';
		echo '</tr>';
		
				
		echo '<tr>';		
		echo '<td><span class="bold">Argitaletxea</span></td>';
		echo '<td colspan="2">'.$argitaletxea.'</td>';
		echo '</tr>';
		
		echo '<tr>';		
		echo '<td><span class="bold">Urtea</span></td>';
		echo '<td colspan="2">'.$urtea.'</td>';
		echo '</tr>';
		
		echo '<tr>';		
		echo '<td><span class="bold">Geratzen diren aleak</span></td>';
		echo '<td colspan="2">'.$stock.'</td>';
		echo '</tr>';
		
		echo '<tr>';		
		echo '<td><span class="bold">Sinopsia</span></td>';
		echo '<td colspan="2">'.$sinopsia.'</td>';
		echo '</tr>';


		echo '</tbody>';
		echo '</table>';
		echo '</div>';


		/**********************************************************************/
		}else{
			header("Location: liburuakIkusi.php");
		}


	}else{
		header("Location: liburuakIkusi.php");
	}
	include 'bodyT.php';
	?>




    </body>
</html>
