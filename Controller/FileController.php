<?php

namespace BeckJonathan\Bundle\FileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class FileController extends Controller
{
    public function uploadAction($fileFolder, $fileName, $maxFiles, $settings)
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
		
		// Add the settings parameter if it exists
		if ($settings) {
			$_GET['settings'] = $settings;
		}
			
		$uploadHandler = $this->get('beck_jonathan_file.upload_handler');
		
		return new Response();
    }
	
	public function ajaxUploadAction($uploadFolder)
	{
		$error = "";
		$msg = "";
		$fileElementName = 'image';
		if(!empty($_FILES[$fileElementName]['error'])) {
			switch($_FILES[$fileElementName]['error']) {
				case '1':
					$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
					break;
				case '2':
					$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
					break;
				case '3':
					$error = 'The uploaded file was only partially uploaded';
					break;
				case '4':
					$error = 'No file was uploaded.';
					break;
	
				case '6':
					$error = 'Missing a temporary folder';
					break;
				case '7':
					$error = 'Failed to write file to disk';
					break;
				case '8':
					$error = 'File upload stopped by extension';
					break;
				case '999':
				default:
					$error = 'No error code avaiable';
			}
		} elseif (empty($_FILES['image']['tmp_name']) || $_FILES['image']['tmp_name'] == 'none') {
			$error = 'No file was uploaded..';
		} else {
			$path = 'uploads/';
			if ($uploadFolder) {
				$path .= $uploadFolder.'/';
			}
			
			// Check whether the folder already exists,
			// if not create the folder
			if (!file_exists($path)) {
    			mkdir($path, 0777, true);
			}
			
			$location = $path.$_FILES['image']['name']; 
			move_uploaded_file($_FILES['image']['tmp_name'], $location); 
			$msg = $location;
			//for security reason, we force to remove all uploaded file
			@unlink($_FILES['image']);
		}
		
		$response = array();
		$response["error"] = $error;
		$response["msg"] = $msg;
		
		return new Response(json_encode($response));
	}
}
