<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" xml:lang="eu" lang="eu" >
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="eu" lang="eu">
    <head>
	<title>Liburu Lista</title>

	<?php
		include 'headT.php';
	 ?>
	</head>

    <body>


            <?php
				ob_start();
				include 'liburuakXSL.php';
				$emaitza = ob_get_clean();

            	$xslDoc = new DOMDocument();
            	$xslDoc->loadXml($emaitza);
            	$xmlDoc = new DOMDocument();
            	$xmlDoc->load('datuak/liburuak.xml');
            	$proc = new XSLTProcessor();
            	$proc->importStylesheet($xslDoc);
            	echo $proc->transformToXML($xmlDoc);
            ?>


	<?php
		include 'bodyT.php';
	 ?>
	 </div>

    </body>
</html>
