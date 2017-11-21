<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/



/* End of file hooks.php */
/* Location: ./application/config/hooks.php */
//Custom hook for setting multi language facility

$hook['post_controller_constructor'] = array(
    'class' => 'LanguageLoader',
    'function' => 'initialize',
    'filename' => 'languageloader.php',
    'filepath' => 'hooks',
    'params' => array('main')
);