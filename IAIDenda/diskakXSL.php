
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform" >
<xsl:template match="/">
<HTML xml:lang="eu" lang="eu">
	<head>
		<title>Diska Lista</title>
	<script src="https://code.jquery.com/jquery-2.2.4.js">	</script>
	<script>
		function info(kodea){
				window.location.href= ("diskaInfo.php?kodea="+kodea);
		}
	</script>

	</head>
	<BODY>
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 text-center">
		<?php $argazkia = 'datuak/fitxategiak/diskak';?>
		<TABLE class="table table-hover table-responsive text-md-center mx-auto">
			<THEAD><TR><TH>AZALA</TH><TH>KODEA</TH><TH>IZENBURUA</TH><TH>TALDEA</TH><TH>DISKA ETXEA</TH><TH>URTEA</TH><TH>AUKERAK</TH></TR></THEAD>
			<xsl:for-each select="/diskak/diska" >
			<TR>
				<TD>
					<img src="<?php echo $argazkia;?>{@karpeta}{@azala}" width="80" height="80" alt="{@kodea} Diskaren azala."  /><BR/>
				</TD>
				<TD>
					<xsl:value-of select="@kodea"/> <BR/>
				</TD>
				<TD>
					<xsl:value-of select="izenburua"/> <BR/>
				</TD>
				<TD>
				  <xsl:value-of select="taldeizena" /><BR/>
				</TD>
				<TD>
					<xsl:value-of select="diskaetxea"/> <BR/>
				</TD>
				<TD>
					<xsl:value-of select="urtea"/> <BR/>
				</TD>
				<TD>
				<!--Erabiltzaile guztiek ikusi ahal izango dute liburuan informazioa -->
				<button type="button"  id="liburuaInfobtn{@kodea}"   class="btn btn-success btn-block" onclick="info({@kodea});" >INFO</button>
				</TD>
			</TR>
			</xsl:for-each>
		</TABLE>
			 </div>
    </div>
</div>
	</BODY>
</HTML>
</xsl:template>
</xsl:stylesheet>
