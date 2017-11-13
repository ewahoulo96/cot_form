<?php
/**
 * @copyright	Copyright (C) 2013 Cook Self Service. All rights reserved.
 * @author		J. HUARD (http://j-cook.pro) - G. Tomaselli (http://bygiro.com)
 * @license     MIT License (MIT) AND GNU GPL v3 or later
 */
 
defined('_JEXEC') or die;

defined('DS') or define('DS',DIRECTORY_SEPARATOR);
defined('BR') or define("BR", "<br />");
defined('LN') or define("LN", "\n");

if(!defined('PATH_LIBRARY_JDOM'))  define('PATH_LIBRARY_JDOM', JPATH_SITE . DS . 'libraries' . DS . 'jdom');

jimport('joomla.version');
$version = new JVersion();

if (!class_exists('CkJLoader'))
{
	// Joomla! 1.6 - 1.7
	if (version_compare($version->RELEASE, '2.5', '<'))
	{
		// Load the missing class file
		require_once(PATH_LIBRARY_JDOM .DS. 'legacy' .DS. 'loader.php');
				
		// Register the autoloader functions.
		CkJLoader::setup();
	}
	
	
	//Joomla! 2.5 and later
	else
	{	
		class CkJLoader extends JLoader{}
	}
}



/**
 * Jdom plugin class.
 *
 * @package     Joomla.plugin
 * @subpackage  System.jdom
 */ 
class plgSystemJdom extends JPlugin
{
    public function onAfterInitialise()
    {
		// load plugin language file
		$language = JFactory::getLanguage();
		$language->load('plg_system_jdom', JPATH_ADMINISTRATOR);
	
		JLoader::register('JDom', JPATH_SITE . DS . 'libraries' . DS . 'jdom' . DS . 'dom.php');
		
		
		JLoader::register('JdomHelperDates', JPATH_SITE . DS . 'libraries' . DS . 'jdom' . DS . 'helpers' . DS . 'dates.php');
		JLoader::register('JdomHtmlValidator', JPATH_SITE . DS . 'libraries' . DS . 'jdom' . DS . 'jform' . DS . 'html' . DS . 'validator.php');
		JLoader::register('CkJEditor', JPATH_SITE . DS . 'libraries' . DS . 'jdom' . DS . 'jform' . DS . 'html' . DS . 'editor.php');
		
		// form field class
		JLoader::register('JdomClassFormField', JPATH_SITE . DS . 'libraries' . DS . 'jdom' . DS . 'jform' . DS . 'field.php');
		JLoader::register('JdomClassFormFieldModal', JPATH_SITE . DS . 'libraries' . DS . 'jdom' . DS . 'jform' . DS . 'field' . DS . 'modal.php');
		JLoader::register('JdomClassFormRule', JPATH_SITE . DS . 'libraries' . DS . 'jdom' . DS . 'jform' . DS . 'rule.php');
    }
}