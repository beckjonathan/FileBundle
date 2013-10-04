<?php

namespace BeckJonathan\Bundle\FileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class FileController extends Controller
{
    public function uploadAction($fileFolder, $fileName, $maxFiles)
    {
    	// Get the name of the folder where the files must be stored
    	$_GET['file_folder'] = $fileFolder;
		
    	// Add a files parameter if a file-name is added to the URL,
    	// this functionality is used for the deletion of files
		if ($fileName) {
			$_GET['files'] = array($fileName);
		}
		
		// Add the maxFiles parameter if it exists
		if ($maxFiles) {
			$_GET['max_files'] = $maxFiles;
		}
			
		$uploadHandler = $this->get('beck_jonathan_file.upload_handler');
		
		return new Response();
    }
}
