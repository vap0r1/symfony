<?php

namespace CWF\StoryBundle;


/**
 * Utility
 */

class Utility
{
    public function upload2Html($data,$format)
    {
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

    //print('Starting sample #1 (license-agreement)...');

    // Instantiate SOAP object and log into LiveDocx

    $soap = new SoapClient(ENDPOINT);

    $soap->LogIn(
        array(
            'username' => USERNAME,
            'password' => PASSWORD
        )
    );

    // Upload template

    //$data = file_get_contents('./license-agreement-template.docx');

    $soap->SetLocalTemplate(
        array(
            'template' => base64_encode($data),
            'format'   => $format
        )
    );

    // Assign data to template

   
    $soap->CreateDocument();

    // Get document as PDF

    $result = $soap->RetrieveDocument(
        array(
            'format' => 'html'
        )
    );

    $data = $result->RetrieveDocumentResult;

   return base64_decode($data);

    // Log out (closes connection to backend server)

    $soap->LogOut();

    unset($soap);
    }
}
?>
