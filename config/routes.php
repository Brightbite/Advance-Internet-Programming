<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//AIP
$route['default_controller'] = 'cHome/index';
//RP
$route['home']      = 'cHome/index';
$route['product']   = 'cProduct/index';
$route['register']  = 'cRegister/index';
$route['create']    = 'cRegister/createUser';
$route['login']     = 'cLogin/signIn';
$route['logout']    = 'cLogout/index';
$route['account']   = 'cMyaccount/index';
$route['order']     = 'cOrder/index';
$route['cart']      = 'cCart/index';
$route['user_cart'] = 'cCart/usercart';
$route['checkout']  = 'cCheckout/index';
$route['user']      = 'cUser/index';
$route['user_list'] = 'cUser/userlist';
$route['save']      = 'cUser/save';
$route['save2']     = 'cUser/save2';
$route['remove']    = 'cUser/remove';
$route['update']    = 'cUser/update';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

?>
