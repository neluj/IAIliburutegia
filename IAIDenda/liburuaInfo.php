
<!DOCTYPE html>
<html lang="eu" xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<?php
	echo '<title>'.$_GET['isbn'].' liburuareb informazioa</title>';
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
				$sinopsia=$liburuak->sinopsia;
				//liburua existitzen dela dakigu
				$aurkitua=true;
			}
		}
		//liburua aurkitu bada, hemenbere datuak erakutsiko ditugu
		if($aurkitua==true){
		/**********************************************************************/
		?>	
		<div class="card-deck ">
		<tbody>
		<div class="card ">
		<image src="<?php echo $argazkia; ?>" class="img-thumbnail img-fluid card-1 mx-auto " width="350px">
		</div>
		
		<!--CARDS start here-->
		<div class="card card-1">
		<table class="table table-hover">
		<caption>Liburuaren oinarrizko informazioa</caption>
		
		<!--<div class="embed-responsive embed-responsive-16by9">
		<!--<iframe class="embed-responsive-item" src="<?php echo $iritzia; ?>" frameborder="0"></iframe>-->
		
		
		<tr>	
		<td><span class="bold">ISBN</span></td>
		<td colspan="2"><?php echo $isbn; ?></td>
		</tr>
		
		
		<tr>	
		<td><span class="bold">Izenburua</span></td>
		<td colspan="2"><?php echo $izenburua; ?></td>
		</tr>
		
		<tr>
		<td><span class="bold">Idazlea</span></td>
		<td colspan="2"><?php echo $idazleIzena; ?></td>
		</tr>
		
		<tr>
		<td><span class="bold">Hizkuntza</span></td>
		<td colspan="2"><?php echo $hizkuntza; ?></td>
		</tr>
		
				
		<tr>
		<td><span class="bold">Argitaletxea</span></td>
		<td colspan="2"><?php echo $argitaletxea; ?></td>
		</tr>
	
		<tr>	
		<td><span class="bold">Urtea</span></td>
		<td colspan="2"><?php echo $urtea; ?></td>
		</tr>

		<tr>		
		<td><span class="bold">Sinopsia</span></td>
		<td colspan="2"><?php echo $sinopsia; ?></td>
		</tr>


		</tbody>
		</table>
		</div>
		</div>
		<?php
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
