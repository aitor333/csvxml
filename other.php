<?php


function metodoCSVXML2($input_file,$output_file){
    	// Open csv file for reading
	@$inputFile  = fopen($input_file, 'rt');
	$extensionEntradaFile = pathinfo($input_file, PATHINFO_EXTENSION);

	if($extensionEntradaFile!= "csv"){
		echo "<br>El fichero debe de ser una extension csv,tu fichero tiene una extension : ".$extensionEntradaFile;
	}else{

	$salida_fichero = $output_file.".xml";
	
	// Get the headers of the file
	$headers = fgetcsv($inputFile);
	
	// Create a new dom document with pretty formatting
	$doc  = new DomDocument();
	$doc->formatOutput   = true;
	
	// Add a root node to the document
	$root = $doc->createElement('root');
	$root = $doc->appendChild($root);
	
	// Loop through each row creating a <policy> node with the correct data
	while (($row = fgetcsv($inputFile)) !== FALSE)
	{
		$container = $doc->createElement('rootson');
		
		foreach($headers as $i => $header)
		{
			$child = $doc->createElement($header);
			$child = $container->appendChild($child);
			$value = $doc->createTextNode($row[$i]);
			$value = $child->appendChild($value);
		}
		$root->appendChild($container);
	}
	
	$strxml = $doc->saveXML($salida_fichero);
	
	$handle = fopen($salida_fichero, "w");
	fwrite($handle, $strxml);
	fclose($handle);
	}

}

?>
