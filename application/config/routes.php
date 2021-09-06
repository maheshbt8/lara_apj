<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home/register';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/* Auth Controller */
$route['register'] = 'home/register';
$route['home'] = 'home/home';
$route['about-us'] = 'home/about';
$route['contact-us'] = 'home/contact';
$route['our-exams'] = 'home/our_exams';
$route['trailexams'] = 'home/trailexams';
$route['plan'] = 'home/plan';
$route["home-faqs"] = 'home/faqs'; 
$route["home-blog"] = 'home/blog'; 
$route["home-blog/(:any)"] = 'home/blog/$1'; 
$route["blog-details/(:any)"] = 'home/blog_details/$1';
$route["home-shop"] = 'home/shop'; 
$route["CPT"]='home/plan_data/1';
$route["IPCC"]='home/plan_data/2';
$route["Final"]='home/plan_data/3';
$route["CPT-NEW"]='home/plan_data/4';
$route["IPCC-NEW"]='home/plan_data/5';
$route["Final-NEW"]='home/plan_data/6';
$route["Pass-Guarantee"]='home/passguarantee';

$route["E-Brochures"]='home/e_brochers';
$route["home-schedules"]='home/schedules';
$route["trail_exams"]='home/trail_exams';
$route["cart"]='home/cart';
$route["mcq"]='home/mcq';
$route["mcq-cpt"]='home/mcq_test/CPT';
$route["mcq-ipcc"]='home/mcq_test/IPCC';
$route["mcq-final"]='home/mcq_test/Final';
$route["take_test/(:any)"] = 'home/take_test/$1';
$route["mcq_results/(:any)"] = 'home/mcq_results/$1';
$route['terms-and-conditions'] = 'home/conditions/terms';
$route['privacy-policy'] = 'home/conditions/privacy';




//$route['auth'] = 'auth';
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';

/**
 * User Controller routes
 */
$route['error_404'] = 'common/error_404';
$route['change_password'] = 'common/change_password';
$route['set_row_status/(.+)'] = 'common/set_row_status/$1';
$route['papers'] = 'common/papers';
$route['trail_papers'] = 'common/trail_papers';
$route['main_paper'] = 'common/main_paper';
$route["notes_view/(:any)"] = 'common/notes_view/$1';


$route['dashboard'] = 'admin/dashboard';
$route['trailuser'] = 'admin/trailuser';
$route['mainuser'] = 'admin/mainuser';
$route['mainupload'] = 'admin/mainupload';
$route['maindownload'] = 'admin/maindownload';
$route['mainuploaddetails'] = 'admin/mainuploaddetails';
$route['edit_mainupload/(:any)'] = 'admin/edit_mainupload/$1';
$route['closedtabs'] = 'admin/closedtabs';
$route['notes'] = 'admin/notes';
$route['notes_add'] = 'admin/notes_add';
$route['videos_mainexam'] = 'admin/videos_mainexam';
$route['videos_mainexam_add'] = 'admin/videos_mainexam_add';
$route['sugganswerrequest'] = 'admin/sugganswerrequest';
$route['feelingformal'] = 'admin/feelingformal';
$route['feedback'] = 'admin/feedback';
$route['faileduser'] = 'admin/faileduser';
$route['addplans'] = 'admin/addplans';
$route['addplan_plans'] = 'admin/addplan_plans';
$route['edit_plans/(:any)'] = 'admin/edit_plans/$1';
$route['guidelines'] = 'admin/guidelines';
$route['trailupload'] = 'admin/trailupload';
$route['traildownload'] = 'admin/traildownload';
$route['traildashboard'] = 'admin/traildashboard';
$route['traildashboard/(:any)'] = 'admin/traildashboard/$1';
$route['results'] = 'admin/results';
$route['requestcallback'] = 'admin/requestcallback';
$route['createpromo'] = 'admin/createpromo/promocodes';
$route['passguaranteepromo'] = 'admin/createpromo/passguarantee';
$route['promocodes'] = 'admin/promocodes';
$route['add_promocode'] = 'admin/add_promocode';
$route['edit_promocode/(:any)'] = 'admin/edit_promocode/$1';
/*$route['passguaranteepromo'] = 'admin/passguaranteepromo';*/
$route['managepromo'] = 'admin/managepromo';
$route['sms'] = 'admin/sms';
$route['sended_sms'] = 'admin/sended_sms';
$route['support'] = 'admin/support';
$route['addplanbox'] = 'admin/addplanbox';
$route['plan_add/(:any)'] = 'admin/plan_add/$1';
$route['edit_plan/(:any)'] = 'admin/edit_plan/$1';
$route['cptplan'] = 'admin/cptplan/1';
$route['ipccplan'] = 'admin/cptplan/2';
$route['finalplans'] = 'admin/cptplan/3';
$route['cptnewplan'] = 'admin/cptplan/4';
$route['ipccnewplan'] = 'admin/cptplan/5';
$route['finalnewplan'] = 'admin/cptplan/6';
$route['ipccplan_add'] = 'admin/ipccplan_add';
/*$route['ipccplan'] = 'admin/ipccplan';
$route['finalplans'] = 'admin/finalplans';
$route['cptnewplan'] = 'admin/cptnewplan';
$route['ipccnewplan'] = 'admin/ipccnewplan';*/
$route['subjects'] = 'admin/subjects';
$route['add_subject'] = 'admin/add_subject';
$route['viewbookings'] = 'admin/viewbookings';
$route['add_book'] = 'admin/add_book';
$route['addshopitem'] = 'admin/addshopitem';
$route['settings'] = 'admin/system_settings';
$route['faqs'] = 'admin/faqs';
$route['faqs/(:any)'] = 'admin/faqs/$1';
$route['blog'] = 'admin/blog';
$route['blog/(:any)'] = 'admin/blog/$1';
$route['flash_image'] = 'admin/flash_image';
$route['terms'] = 'admin/conditions/terms';
$route['privacy'] = 'admin/conditions/privacy';
$route['add_mcq'] = 'admin/add_mcq';
$route['mcq_list'] = 'admin/mcq_list';
$route['mcq_test_users'] = 'admin/mcq_test_users';
$route["mcq_view/(:any)"] = 'admin/mcq_view/$1';
$route['courses'] = 'admin/courses';
$route['courses/(:any)'] = 'admin/courses/$1';



$route['e_brochers'] = 'admin/e_brochers';
$route['schedules'] = 'admin/schedules';
$route['videos'] = 'admin/videos';
$route['evaluator_list'] = 'admin/evaluator';
$route['evaluator_list/(:any)'] = 'admin/evaluator/$1';
$route['assign_evaluator'] = 'admin/assign_evaluator';



/*Users Panel*/
$route['u_dashboard'] = 'user/dashboard';
$route['u_trailexams'] = 'user/trailexams';
$route['u_traildownload'] = 'user/traildownload';
$route['u_mainexams'] = 'user/mainexams';
$route['u_maindownload'] = 'user/maindownload';
$route['u_myresults'] = 'user/myresults';
$route['u_performancereport'] = 'user/performancereport';
$route['u_uhistory'] = 'user/uploadhistory';
$route['u_notifications'] = 'user/notifications';
$route['u_support'] = 'user/support';
$route['u_notes'] = 'user/notes';
$route['u_videos'] = 'user/videos';
$route['u_guidelines'] = 'user/guidelines';
$route['received_sms'] = 'user/received_sms';
$route['u_feedback'] = 'user/feedback';
/*Evaluator Panel*/
$route['e_dashboard'] = 'evaluator/dashboard';
$route['e_trailexams'] = 'evaluator/trailexams';
$route['e_mainexams'] = 'evaluator/mainexams';