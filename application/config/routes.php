<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	http://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There area two reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router what URI segments to use if those provided
  | in the URL cannot be matched to a valid route.
  |
 */

$route['default_controller'] = "main";
$route['404_override'] = '';

$route['(:any)'] = "main";
# public page
$route['home-page'] = "main/homepage";
$route['about-us'] = "main/about";
$route['products'] = "main/products";
$route['news'] = "main/news";
$route['faq'] = "main/faq";
$route['contact-us'] = "main/contact";

# admin gvip area
$route['_admin'] = 'panel/main';
$route['_admin/home_page'] = 'panel/main/home_page';
$route['_admin/distributor'] = 'panel/main/list_distributor'; # admin area for distributor
$route['_admin/del_distributor'] = 'panel/main/del_distributor'; # delete distributor
$route['_admin/member'] = 'panel/main/list_member'; # admin area for member GVIP
$route['_admin/voucher_code'] = 'panel/main/list_voucher'; # admin area for manage voucher code
# generate_vc
$route['_admin/generate_vc'] = 'panel/main/generate_vc';
$route['_admin/generate_vc/generate'] = 'panel/main/take_post_and_generate_vc';

# member area
$route['member'] = 'member';

$route['member/home-page'] = 'member';
$route['member/profile'] = 'member/profile';
	$route['member/report/genealogy'] = 'member/report';
	$route['member/report/commision'] = 'member/commision';
	$route['member/report/direct-sponsored'] = 'member/direct_sponsored';
$route['member/opportunity'] = 'member/opportunity';
$route['member/reservation'] = 'member/reservation';
$route['member/news'] = 'member/news';



	$route['member/thank-you-registering'] = 'member/thankyou';

# test area
$route['test'] = 'test';
$route['engine'] = 'engine/mlmmanagement';


# hotel and reservation
$route['admin-hotel'] = 'admin_hotel'; 
$route['admin-hotel/check-login'] = 'admin_hotel/check_login';
$route['admin-hotel/login'] = 'admin_hotel/member_login';
$route['admin-hotel/logout'] = 'admin_hotel/member_logout';
$route['admin-hotel/login/sub-menu-admin/profile'] = 'admin_hotel/profile';
$route['admin-hotel/login/sub-menu-admin/room-management'] = 'admin_hotel/room_management';
$route['admin-hotel/login/sub-menu-admin/rooms-pics-updating'] = 'admin_hotel/rooms_pics_updating';

/* End of file routes.php */
/* Location: ./application/config/routes.php */ 