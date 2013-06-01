<?php
namespace CWF\AuthorBundle;

Class Utility {

    public static function Upload2Html($upload_data) { 
		// Turn off WSDL caching
		ini_set ('soap.wsdl_cache_enabled', 0);
		 
		// Define credentials for LD
		define ('USERNAME', 'vap0r1');
		define ('PASSWORD', 'cwfrontier');
		 
		// SOAP WSDL endpoint
		define ('ENDPOINT', 'https://api.livedocx.com/1.2/mailmerge.asmx?WSDL');
		 
		// Define timezone
		date_default_timezone_set('Europe/Berlin');
		 
		// -----------------------------------------------------------------------------
		 
		//
		// SAMPLE #1 - License Agreement
		//
		 
		print('Starting sample #1 (license-agreement)...');
		 
		// Instantiate SOAP object and log into LiveDocx
		 
		$soap = new SoapClient(ENDPOINT);
		 
		$soap->LogIn(
			array(
				'username' => USERNAME,
				'password' => PASSWORD
			)
		);
		 
		// Upload template
		 
		$data = file_get_contents('c:\wamp\temp.doc');
		 
		$soap->SetLocalTemplate(
			array(
				'template' => base64_encode($data),
				'format'   => 'doc'
			)
		);
		 
		// Assign data to template
		
		 
		// Build the document
		 
		$soap->CreateDocument();
		 
		// Get document as PDF
		 
		$result = $soap->RetrieveDocument(
			array(
				'format' => 'html'
			)
		);
		 
		$data = $result->RetrieveDocumentResult;
		 
		//file_put_contents('./license-agreement-document.html', base64_decode($data));
		print base64_decode($data);
		// Get document as bitmaps (one per page)
		
		$soap->LogOut();
		 
		unset($soap);
		 
		print('DONE.' . PHP_EOL);
		}
}