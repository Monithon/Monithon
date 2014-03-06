<?php
 
// Make sure SimplePie is included. You may need to change this to match the location of autoloader.php
// For 1.0-1.2:
 
#require_once('../simplepie.inc');
// For 1.3+:
require_once('themes/monithon/simplepie/autoloader.php');
 
// We'll process this feed with all of the default options.
$feed = new SimplePie();
 
// Set which feed to process.
$feed->set_feed_url('http://www.monithon.it/blog/feed/');
$feed->set_cache_location('application/cache/');
 
// Run SimplePie.
$feed->init();
 
// This makes sure that the content is sent to the browser as text/html and the UTF-8 character set (since we didn't change it).
$feed->handle_content_type();
 
// Let's begin our XHTML webpage code.  The DOCTYPE is supposed to be the very first thing, so we'll keep it on the same line as the closing-PHP tag.
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 
<html xmlns
<head>
	<title>Sample SimplePie Page</title>
	<meta
</head>
<body>

<?php

//this is a classic 2-dimensional anonymous array
$table = array( array("A1", "B1" , "C1"),
                array("A2", "B2" , "B2"),
                array("A3", "B3" , "C3") 
             );  
             
echo "<pre>" .            
'$table = array( array("a1", "b1" , "c1"),
                array("a2", "b2" , "c2"),
                array("a3", "b3" , "c3") 
             );' . "</pre><br />" ;
             
echo "get single element <br />";            
echo '$table[2][1] = ' . $table[2][1] . "<br /><br />";


echo $table;
echo "build html table from a 2d array <br />";
foreach ($table as $rows => $row)
{
	echo "<table border='1'><tr>";
	foreach ($row as $col => $cell)
	{
		echo "<td>" . $cell . "</td>";
	}	
  echo "</tr></table>";
}	
            

?>
	<div class="header">

<p><b>Titolo del progetto</b>: infrasci pt-02 / realizzazione edificio con funzioni di accoglienza turistica sportiva e ricreativa e ristrutturazione del parcheggio coperto "le piramidi" a servizio del circuito bianco<p><b>Soggetto che riceve i fondi:</b> Comune Di Abetone  </p><a href="http://opencoesione.gov.it/progetti/6to496139/" target="_blank">Apri scheda progetto su OpenCoesione</a><p><b>Importo totale finanziamento pubblico:</b> € 13062000</p><p><b><a href="http://www.monithon.it/reports/submit?OCid=1"target="_blank">Crea un report su questo progetto!</a></b></p>

</body>
</html>