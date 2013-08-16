<?php

namespace BeckJonathan\FileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class FileController extends Controller
{
    public function uploadAction($fileName)
    {
    	// Add a files parameter if a file-name is added to the URL
		if ($fileName) {
			$_GET['files'] = array($fileName);
		}	
			
		$uploadHandler = $this->get('beck_jonathan_file.upload_handler');
		
		return new Response();
    }
}