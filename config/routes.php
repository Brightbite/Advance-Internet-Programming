<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//AIP
//$route['default_controller'] = 'AIP/cUser/index';
$route['aindex']      = 'AIP/cUser/index';
$route['aUser_list']  = 'AIP/cUser/aUserlist';
$route['aSave']       = 'AIP/cUser/aSave';
$route['aRemove']     = 'AIP/cUser/aRemove';
$route['aUpdate']     = 'AIP/cUser/aUpdate';
//RP
$route['rindex']     = 'RP/cUser/index';
$route['rUser_list'] = 'RP/cUser/rUserlist';
$route['rSave']      = 'RP/cUser/rSave';
$route['rRemove']    = 'RP/cUser/rRemove';
$route['rUpdate']    = 'RP/cUser/rUpdate';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// $route['register'] = 'cTest/register';
// $route['mypage'] = 'cUser/index';
// $route['test'] = 'cUser/index';
// $route['menu'] = 'Cmenu/testmenu';
?>
