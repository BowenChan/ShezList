<?php

	//Creating file to write into
	$filename = 'listOfISBN.txt';
	$file = fopen($filename, "w") or die("CANNOT OPEN FILE");

	//Scraping ISBN from http://www.topshelfcomix.com/catalog/isbn-list

	$dom = new DOMDocument();
	libxml_use_internal_errors(true);
	$dom->loadHTMLFILE('http://www.topshelfcomix.com/catalog/isbn-list');
	libxml_use_internal_errors(false);
	$xml = simplexml_import_dom($dom);
	$links = $xml->xpath('//span[@class="isbn-number"]');
	foreach ($links as $l){
		if(!strcmp(substr($l,0,3),"978"))
			fwrite($file, str_replace("-","", $l[0]) . "\n");
	}

	fclose($file);
?>