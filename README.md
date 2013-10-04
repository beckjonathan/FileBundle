==========
FileBundle
==========

File bundle for use with Symfony2.

# This Bundle is a conversion from the following plugin: http://blueimp.github.io/jQuery-File-Upload/

# 'file_upload' => $this->renderView('BeckJonathanFileBundle:File:file.html.php'),

# Add following in the BeckJonathanFileBundle:File:file.html.php template (the hidden input field must contain the upload folder for the files):
# {{ file_upload|raw }}
# <input type="hidden" id="hidden-file-folder" value="downloads">

# Make sure you add 'php' to the framework->templating->engines setting in the app/config/config.yml file.

# Make sure you add the following files to the other stylesheets:
# <link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
# '@BeckJonathanFileBundle/Resources/public/css/vendor/jquery.fileupload-ui.css'
# '@BeckJonathanFileBundle/Resources/public/css/main.css'

# Make sure you add the following files to the other scripts:
# '@BeckJonathanFileBundle/Resources/public/js/plugins.js'
# '@BeckJonathanFileBundle/Resources/public/js/main.js'