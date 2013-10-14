#BeckJonathanFileBundle

##Installation

###Step 1: Download BeckJonathanFileBundle using composer.

Add BeckJonathanFileBundle to the file `/composer.json`:

```json
{
    "require": {
        "beckjonathan/file-bundle": "dev-master"
    }
}
```

Now tell composer to download the bundle by running the command:

```
$ php composer.phar update beckjonathan/file-bundle
```

Composer will install the bundle to your project's `/vendor/beckjonathan` directory.

###Step 2: Enable the bundle.

Enable the bundle in file `/app/AppKernel.php`:

```php
<?php

// ...

public function registerBundles()
{
    $bundles = array(
        // ...
        new BeckJonathan\Bundle\FileBundle\BeckJonathanFileBundle(),
    );
}
```

###Step 3: Add bundle to the assetic configuration.

Add `BeckJonathanFileBundle` to the bundles array in file `/app/config/config.yml`.

```yaml
assetic:
    // ...
    bundles: [BeckJonathanFileBundle]
```

###Step 4: Add the php templating engine.

Add `php` to the engines setting in the file `/app/config/config.yml`.

```yaml
framework:
    // ...
    templating:
        engines: ['php']
```

###Step 5: Add extra upload functions.

Some code can be run after a file is uploaded. This code can be edited in the file `/vendor/beckjonathan/cms-bundle/BeckJonathan/Bundle/FileBundle/Service/UploadHandler.php` at the bottom of the function `handle_file_upload()`:

```php
		// ...
		$this->set_additional_file_properties($file);
		
		// Add here the functionality that runs when a new file is added
    }
    return $file;
}
```

**Note**

This code will only run if you make use of the multiple file uploader NOT the SINGLE file uploader. 

##How does it work?

There are two ways to use the FileBundle:

- a) Multiple file uploader

- b) Single file uploader

###a) Multiple file uploader

####Step 1: Add the template code to the controller.

```php
return $this->render('BeckJonathanCMSBundle:CMS/Example:index.html.twig', array(
	// ...
	"file_upload" => $this->renderView('BeckJonathanFileBundle:File:index.html.php'),
));
```

####Step 2: Add the template code to the php template.

Add following code to the template file in which you want to add the upload form:

```twig
{{ file_upload|raw }}
<input type="hidden" id="hidden-file-folder" value="downloads">
```

**Note**

The hidden input field with id `hidden-file-folder` contains the folder to which the files will be uploaded. 
Make sure you create this folder and give it the correct write permissions.

It's also possible to add following optional hidden input fields.

- `<input type="hidden" id="hidden-max-files" value="2">`: Specify the maximum amount of files which can be uploaded.
- `<input type="hidden" id="hidden-settings" value="">`: This can contain a setting, this settings can be specified in the file `/vendor/beckjonathan/cms-bundle/BeckJonathan/Bundle/FileBundle/Service/UploadHandler.php`.

####Step 3: Add the stylesheets.

Following stylesheets must be added:

- `http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css`
- `BeckJonathanFileBundle/Resources/public/css/vendor/jquery.fileupload-ui.min.css`
- `BeckJonathanFileBundle/Resources/public/css/main.min.css`

####Step 4: Add the scripts.

Following scripts must be added:

- `BeckJonathanFileBundle/Resources/public/js/plugins.min.js`
- `BeckJonathanFileBundle/Resources/public/js/main.min.js`

###b) Single file uploader

####Step 1: Add file input field.

Add an file input field and define the name value. Make sure this value is similar with the value of variable `$fileElementName` in the file `/vendor/beckjonathan/cms-bundle/BeckJonathan/Bundle/FileBundle/Controller/FileController.php`.

```html
<input type="file" name="image">
```

####Step 2: Add the script.

```twig
{% block javascripts %}
	{{ parent() }}
	
   	{% javascripts '@BeckJonathanFileBundle/Resources/public/js/vendor/ajaxfileupload.min.js' %}
	    <script src="{{ asset_url }}"></script>
	{% endjavascripts %}
{% endblock %}
```
####Step 3: Define upload folder.

It's possible to define an upload folder to add following hidden input field:

```html
<input type="hidden" id="hidden-upload-folder" value="activities">
```

Make sure you create this folder an give it the correct write permissions.
