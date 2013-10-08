==========
FileBundle
==========

File bundle for use with Symfony2.

# This Bundle is a conversion from the following plugin: http://blueimp.github.io/jQuery-File-Upload/

# 'file_upload' => $this->renderView('BeckJonathanFileBundle:File:file.html.php'),

# Add following in the BeckJonathanFileBundle:File:file.html.php template (the hidden input field must contain the upload folder for the files):
# {{ file_upload|raw }}
# <input type="hidden" id="hidden-file-folder" value="downloads"> -> This option is required.
# Make sure the upload folders are created in the uploads folder (create the uploads folder if it's not existing yet).

# <input type="hidden" id="hidden-max-files" value="2"> -> This option is optional.
# <input type="hidden" id="hidden-settings" value="testen123"> -> This option is optional, settings can be
# added to this input file, like if you want to make updates to the database etc.

# Make sure you add 'php' to the framework->templating->engines setting in the app/config/config.yml file.

# Make sure you add the following files to the other stylesheets:
# <link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
# '@BeckJonathanFileBundle/Resources/public/css/vendor/jquery.fileupload-ui.css'
# '@BeckJonathanFileBundle/Resources/public/css/main.css'

# Make sure you add the following files to the other scripts:
# '@BeckJonathanFileBundle/Resources/public/js/plugins.js'
# '@BeckJonathanFileBundle/Resources/public/js/main.js'

# De settings aanpassen onderaan de functie handle_file_upload() in de file UploadHandler.php

# Bij het gebruik van ajaxFileUpload ook een name="" waarde meegeven aan het inputveld. 
# Er kan ook worden gespecifieerd in welke folder je de file wil uploaden, via:
# <input type="hidden" id="hidden-upload-folder" value="activities">