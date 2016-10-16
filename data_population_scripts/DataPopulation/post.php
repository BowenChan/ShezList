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

	echo "Adding " . $isbnAmnt+1 . " into the database <br>";

	DataScrape($pdo);
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
	function DataScrape($pdo){

		//CONSTANTS VARIABLES
		$genericDescription = "This is a filler";
		$infoXPath = '//span[@id="productTitle"]';
		$bookXPath = '//div[@class="a-row a-spacing-small"]/a/@href';
		//Opening up the listOFISBN.txt file
		$filename = 'listOfISBN.txt';
		$file = fopen($filename, "r") or die ("Cannot open file");
		//$agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
		while(!feof($file)){
			
			//Retrieving the isbnNumber from the file
			$isbnNumber = fgets($file);

			//DEBUG: Printing the ISBN Number
			echo $isbnNumber . "<br>";
			
			//Loading the book url
			$dom = new DOMDocument();
			libxml_use_internal_errors(true);

			$dom->loadHTMLFILE('https://www.amazon.com/gp/search/ref=sr_adv_b/?search-alias=stripbooks&unfiltered=1&field-keywords=&field-author=&field-title=&field-isbn='. $isbnNumber . '&field-publisher=&node=&field-p_n_condition-type=&p_n_feature_browse-bin=&field-age_range=&field-language=&field-dateop=During&field-datemod=&field-dateyear=&sort=relevanceexprank&Adv-Srch-Books-Submit.x=32&Adv-Srch-Books-Submit.y=6');

			libxml_use_internal_errors(false);
			$xml = simplexml_import_dom($dom);

			//Access the first result of the search
			$link = $xml->xpath($bookXPath);

			//Loading the book's url for information
			$currentURL = $link[0]['href'];
			echo $currentURL;

			libxml_use_internal_errors(true);
			$dom->loadHTMLFILE($currentURL);
			libxml_use_internal_errors(false);

			$xml = simplexml_import_dom($dom);
			$link = $xml->xpath($infoXPath);
			echo "<br>";

			$bookStmt = $pdo->prepare("INSERT INTO `post` (pst_user_id, title, description, book_category, condition_id) VALUES (:pst_user_id, :title, :description, :book_category, :condition_id)");
			foreach($link as $l){
				$randomGen1 = randNumber();
				$bookStmt->bindParam(':pst_user_id', $randomGen1);
				$bookStmt->bindParam(':title', $l[0]);
				$bookStmt->bindParam(':description', $genericDescription);
				$bookStmt->bindParam(':book_category', $randomGen1);
				$bookStmt->bindParam(':condition_id', $randomGen1);

				echo $bookStmt->execute();


				echo $l[0];
				echo "<br>";
				echo "<br>";
			}
			
		}	
			echo "<br>";
			fclose($file);
		}

?>