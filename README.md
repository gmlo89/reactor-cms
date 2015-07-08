# Simple CMS

Its a PHP CMS powered by Laravel 5.1, ideal for small websites that require a blog

##Modules included:

  - Users (CRUD, Auth)
  - Categories (CRUD)
  - Articles (CRUD)

## Version
This package is still under construction... But you can download and collaborate

## Installation
##### First, pull in the package through Composer.
```php
“require”: {
	...
	"gmlo/cms": "dev-master”
}
```
##### And run composer:
```sh
$ composer update
```
##### And then, include the service provider within `config/app.php`.
```php
'providers' => [
    ...
	// own
	Gmlo\CMS\Providers\CMSServiceProvider::class,
	// Required
	Collective\Html\HtmlServiceProvider::class,
],

....

'aliases' => [
    ...
    // Custom
    'CMS'    => Gmlo\CMS\Facades\CMS::class,
    'Field'  => Gmlo\CMS\Facades\FieldBuilder::class,
    'Alert'  => Gmlo\CMS\Facades\Alert::class,
    'MediaManager' => Gmlo\CMS\Facades\MediaManager::class,
	// Required
	'Form' => Collective\Html\FormFacade::class,
	'Html' => Collective\Html\HtmlFacade::class,
],
```

##### Configure your preference database.


##### Configure the CMS
```sh
$ php artisan cms:start
```
Run this command and type the required data.
##### Also you can set more configurations on `config/cms.php`.
##### Enjoy it!
Go to the web browser and put `your-domain/admin`.

## Credits
This package uses a number of open source projects to work properly:
* [Laravel 5.1] - The PHP Framework For Web Artisans
* [AdminLTE] -  Dashboard & Control Panel Template 
* [VueJS] -  Intuitive, Fast and Composable MVVM for building interactive interfaces.
* [TinyMCE] - HTML WYSIWYG editor
* And others...

### Development
By [@gmlo_89]

**Feel free to contrinue and post your feedback!**

[AdminLTE]:https://almsaeedstudio.com/
[VueJS]:http://vuejs.org
[TinyMCE]:http://www.tinymce.com/
[Laravel 5.1]:http://laravel.com/
[@gmlo_89]:https://twitter.com/gmlo_89