<?php
	
	include_once('dbconnect.php');

	require('populationMethod.php');
	require_once("simple_html_dom.php");
	//Grabbing a user
	$usrLgnthStmt = $pdo->prepare("SELECT count(*) FROM `user`");
	$usrLgnthStmt->execute();
	$count = $usrLgnthStmt->fetch(PDO::FETCH_NUM);
	$userID = rand(1,$count[0]);

	readAndScrape();
	$dom = new DOMDocument();
	$isbnAmnt = retrieveFileLength("listOfISBN.txt");
	echo $isbnAmnt;
	/*
	for($i = 0 ; $i < $isbnAmnt; $i++){
		libxml_use_internal_errors(true);
			b
	}
	*/

	function retrieveFileLength($fileName){
		$lineCount = 0;
		$file = fopen($fileName, "r");
		if($file){
			while (!feof($file)){
				$lineCount += substr_count(fread($file, 8192), "\n");
			}

			fclose($file);
		}
		else
			echo "File does not exist";
		return $lineCount;
	}

	function createPost($userID, $isbn){


	}

	function readAndScrape(){
		$filename = "listOfISBN.txt";
		
	}

	function randNumber(){
		return rand(1,4);
	}

	function randCategory(){
		
	}
	function DataScrape(){
		//$agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
		$filename = 'listOfISBN.txt';
		$file = fopen($filename, "r") or die ("CANNOT OPEN FILE");
		global $isbnAmnt;
		for($iteration = 0; $iteration < $isbnAmnt; $iteration++){
			
			

			/*$ch = curl_init($url);

			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_FILE, $file);
			curl_setopt($ch, CURLOPT_FAILONERROR, 0);
			//curl_setopt($ch, CURLOPT_USERAGENT, $agent);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
			
			$contents  =curl_exec($ch);
			echo $contents;
			//$html = new simple_html_dom();
			//$html->load($contents, true, false);
			#fwrite($file, $contents);
			//foreach($html->find('head') as $d) {
	        //	$d->innertext = "<base href='$url'>" . $d->innertext;
	    	//}
			//echo $html->save();
			curl_close($ch);
			fclose($file);*/

				//Creating file to write into
			$filename = 'information.txt';
			$file = fopen($filename, "w") or die("CANNOT OPEN FILE");

			//Scraping ISBN from http://www.topshelfcomix.com/catalog/isbn-list
			$isbnNumber = 9781603090636;
				//^^^^^^^^^^^^^^^^
			//GET THE LINE corresponding to the isbn number
			
			$dom = new DOMDocument();
			libxml_use_internal_errors(true);
			$dom->loadHTMLFILE('https://www.amazon.com/gp/search/ref=sr_adv_b/?search-alias=stripbooks&unfiltered=1&field-keywords=&field-author=&field-title=&field-isbn='. $isbnNumber . '&field-publisher=&node=&field-p_n_condition-type=&p_n_feature_browse-bin=&field-age_range=&field-language=&field-dateop=During&field-datemod=&field-dateyear=&sort=relevanceexprank&Adv-Srch-Books-Submit.x=32&Adv-Srch-Books-Submit.y=6');
			libxml_use_internal_errors(false);
			$xml = simplexml_import_dom($dom);
			$links = $xml->xpath('//div[@class="a-row a-spacing-small"]/a/@href');
			
			echo $links[0]['href'];
			$newURL = $links[0]['href'];
			libxml_use_internal_errors(true);
			$dom->loadHTMLFILE($newURL);
			libxml_use_internal_errors(false);
			$xml = simplexml_import_dom($dom);
			$linksNew = $xml->xpath('//span[@id="productTitle"]');
			echo "<br>";
			$bookStmt = $pdo->prepare("INSERT INTO `post` (pst_user_id, title, description, book_category, condition) VALUES (:pst_user_id, :title, :description, :book_category, :condition");
			foreach($linksNew as $l){
				echo "<br>";
				$randomGen = $randNumber();
				$bookStmt->bindParam(':pst_user_id', $randomGen);
				$bookStmt->bindParam(':title', $l[0]);
				$bookStmt->bindParam(':description', "ASDFGDFHGSFRAT");
				$bookStmt->bindParam(':book_category', $randomGen);
				$bookStmt->bindParam(':condition', $randomGen);
				$bookStmt->execute();
				

				echo $l[0];
				echo "<br>";


			}
		}
			echo "<br>";
			fclose($file);
		}

?>