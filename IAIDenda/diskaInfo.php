
<!DOCTYPE html>
<html lang="eu" xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<?php
	echo '<title>'.$_GET['kodea'].' diskaren informazioa</title>';
	include 'headT.php';
	echo'</head>';
	
	//KODEA GET eskaerarik dagoen ikusi
	if (isset($_GET['kodea'])){
		$aurkitua=false;
		$kodea = $_GET['kodea'];
		$xml=simplexml_load_file("datuak/diskak.xml") or die("Error: Cannot create object");

		//XML fitxategiko diskak irakurri, bakoitzaren kodea atributua ikusi eta GET isbn-ren berdina bada,
		//bilatzen ari garen liburua aurkitu dugu. Datuak aldagaietan gordeko ditugu.
		//Zuzenean datu basetik bilatu dezakegu, argazkia bertan bakarrik bait dago, baina
		//ariketa XML fitxategian bilatzea da.
		echo'<body>';
		foreach($xml->children() as $diskak) {

			if(($diskak['kodea'])==$kodea){
				//fitxategiak gordeko diren karpetaren helbidea
				$helbidea = 'datuak/fitxategiak/diskak';
				$karpeta = 'datuak/fitxategiak/diskak'.$diskak['karpeta'];
				$azala = $karpeta.$diskak['azala'];
				$atzea = $karpeta.$diskak['atzea'];

				$izenburua=$diskak->izenburua;
				$taldeizena=$diskak->taldeizena;
				$disketxea=$diskak->disketxea;
				$urtea=$diskak->urtea;
				$bideoklipa=$diskak['bideoklipa'];
				//diska existitzen dela dakigu
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
		<div class="row">
		<tr>
		<div class="col">
		  	<image src="<?php echo $azala; ?>" class="img-thumbnail img-fluid  mx-auto " width="200" height="200" alt="<?php echo $kodea; ?> diskaren azala azala.">
		</div>
		</tr>
		<tr>
		<div class="col">
			<image src="<?php echo $atzea; ?>" class="img-thumbnail img-fluid  mx-auto " width="200" height="200" alt="<?php echo $kodea; ?> diskaren atzekaldea.">
		</div> 	
		</div>
		</tr>
		<tr>
		<div class="embed-responsive embed-responsive-16by9">
		<iframe class="embed-responsive-item" src="<?php echo $bideoklipa; ?>" frameborder="0"  title="Bideklipa"></iframe>
		</tr>
		</div>
		</div>
		
		<!--CARDS start here-->
		<div class="card card-1">
		<table class="table table-hover">
		
		<tr>	
		<td><span class="bold">IZENBURUA</span></td>
		<td colspan="2"><?php echo $izenburua; ?></td>
		</tr>
		
		
		<tr>	
		<td><span class="bold">TALDEA</span></td>
		<td colspan="2"><?php echo $taldeizena; ?></td>
		</tr>
		
		<tr>
		<td><span class="bold">DISKETXEA</span></td>
		<td colspan="2"><?php echo $disketxea; ?></td>
		</tr>
		
		<tr>
		<td><span class="bold">URTEA</span></td>
		<td colspan="2"><?php echo $urtea; ?></td>
		</tr>
		
		<tr>
		<td><span class="bold">ABESTIAK</span></td>
		<td colspan="2">
		<ul id="list">
		<?php
		foreach($diskak->children() as $kantuak) {
			foreach($kantuak->children() as $kantua) {
				
				echo '<a href="#" data-value="'.$karpeta.$kantua['fitxategia'].'">'.$kantua['kodea'].'.-'.$kantua['izenburua'].'</a>';											
				echo '|';
			}					
		}
		?>
		</ul>
		</td></tr>
		
		
		<tr>
		<td><span class="bold">ENTZUN</span></td>
		<td>
		<audio id="audio" controls="controls">
		  <source id="audioSource" src=""></source>
		  Zure erreprodizatzaileak ez du formatua onartzen
		</audio></td>
		</tr>
		
		<script>
		list.onclick = function(e) {
		  e.preventDefault();

		  var elm = e.target;
		  var audio = document.getElementById('audio');

		  var source = document.getElementById('audioSource');
		  source.src = elm.getAttribute('data-value');

		  audio.load();
		  audio.play(); 
		};
		</script>
		
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
