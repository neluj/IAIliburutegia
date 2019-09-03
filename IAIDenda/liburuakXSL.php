
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform" >
<xsl:template match="/">
<HTML xml:lang="eu" lang="eu">
	<head>
		<title>liburu Lista</title>
	<script src="https://code.jquery.com/jquery-2.2.4.js">	</script>
	<script>
		function info(isbn){
				window.location.href= ("liburuaInfo.php?isbn="+isbn);
		}
	</script>

	</head>
	<BODY>
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 text-center">
		<?php $argazkia = 'datuak/fitxategiak/liburuak/img/';?>
		<TABLE class="table table-hover table-responsive text-md-center">
			<THEAD><TR><TH>AZALA</TH><TH>ISBN</TH><TH>IZENBURUA</TH><TH>IDAZLEA</TH><TH>HIZKUNTZA</TH><TH>ARGITALETXEA</TH><TH>URTEA</TH><TH>AUKERAK</TH></TR></THEAD>
			<xsl:for-each select="/liburutegia/liburua" >
			<TR>
				<TD>
					<img src="<?php echo $argazkia;?>{@argazkia}" width="80" height="100" alt="{@isbn} Liburuaren azala." class="img-fluid rounded" /><BR/>
					
				</TD>
				<TD>
					<xsl:value-of select="@isbn"/><BR/>
				</TD>
				<TD>
					<xsl:value-of select="izenburua"/> <BR/>
				</TD>
				<TD>
				  <xsl:value-of select="idazleizena" /><BR/>
				</TD>
				<TD>
					<xsl:value-of select="@hizkuntza"/><BR/>
				</TD>
				<TD>
					<xsl:value-of select="argitaletxea"/> <BR/>
				</TD>
				<TD>
					<xsl:value-of select="urtea"/> <BR/>
				</TD>
				<TD>
				<!--Erabiltzaile guztiek ikusi ahal izango dute liburuan informazioa -->
				<button type="button"  id="liburuaInfobtn{@isbn}"  class="btn btn-success btn-block" onclick="info({@isbn});" >INFO</button>
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
