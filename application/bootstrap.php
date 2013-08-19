<?php defined('SYSPATH') or die('No direct script access.');

// -- Environment setup --------------------------------------------------------

// Load the core Kohana class
require SYSPATH.'classes/Kohana/Core'.EXT;

if (is_file(APPPATH.'classes/Kohana'.EXT))
{
	// Application extends the core
	require APPPATH.'classes/Kohana'.EXT;
}
else
{
	// Load empty core extension
	require SYSPATH.'classes/Kohana'.EXT;
}

/**
 * Set the default time zone.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/timezones
 */
date_default_timezone_set('Europe/Riga');

/**
 * Set the default locale.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/function.setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @link http://kohanaframework.org/guide/using.autoloading
 * @link http://www.php.net/manual/function.spl-autoload-register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @link http://www.php.net/manual/function.spl-autoload-call
 * @link http://www.php.net/manual/var.configuration#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

// -- Configuration and initialization -----------------------------------------

/**
 * Set the default language
 */
I18n::lang('en-us');

Cookie::$salt = 'generatedsalt';
Cookie::$expiration = 6400;

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
if (isset($_SERVER['KOHANA_ENV']))
{
	Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - integer  cache_life  lifetime, in seconds, of items cached              60
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 * - boolean  expose      set the X-Powered-By header                        FALSE
 */
Kohana::init(array(
	'base_url'   => '/Phorumph',
	'index_file' => '',
));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
    'auth'           => MODPATH.'auth',
    'darkmown' => MODPATH.'darkmown',
    'pagination' => MODPATH.'pagination',
    'database'   => MODPATH.'database',
    'email'         => MODPATH.'email',
    'unittest'     => MODPATH.'unittest',
    'orm'           => MODPATH.'orm',
    ));

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */

Route::set('dashboard', 'dashboard')
            ->defaults(array(
                        'controller' => 'Dashboard',
                        'action'      => 'index',
            ));

Route::set('dashboard/categories', 'dashboard/categories(/<action>(/<id>(/<id2>(/<id3>(/<id4>)))))')
    ->defaults(array(
        'directory'  => 'Dashboard',
        'controller' => 'Categories',
        'action'     => 'create',
    ));

Route::set('dashboard/users', 'dashboard/users(/<action>(/<id>(/<id2>(/<id3>(/<id4>)))))')
    ->defaults(array(
        'directory' => 'Dashboard',
        'controller' => 'Users',
        'action'     => 'list',
    ));

Route::set('dashboard/topics', 'dashboard/topics(/<action>(/<id>(/<id2>(/<id3>(/<id4>)))))')
    ->defaults(array(
        'directory' => 'Dashboard',
        'controller' => 'Topics',
        'action'     => 'list',
    ));

Route::set('default', '(<controller>(/<action>(/<id>(/<id2>(/<id3>(/<id4>(/<id5>(/<id6>))))))))')
    ->defaults(array(
        'controller' => 'Home',
        'action'     => 'index',
    ));
