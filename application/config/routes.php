<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'C_Main/index';
$route['index'] = 'C_Main/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['login'] = 'C_Main/login';
$route['register/insert'] = 'C_Main/insert_register';
$route['logout'] = 'C_Main/logout';
$route['register'] = 'C_Main/register';
$route['ceklogin'] = 'C_Main/login_data';
$route['manual_book'] = 'C_Main/manual_book';


$route['data'] = 'C_Main/data';
$route['faq'] = 'C_Main/faq';


$route['user'] = 'C_Main/profile';
// LIST DATA USER
$route['admin'] = 'backend/C_User/index';
$route['admin/detail/(:any)'] = 'backend/C_User/detail/$1';
$route['admin/non-active'] = 'backend/C_User/user_nonactive';
$route['admin/change-password'] 				= 'backend/C_User/changePassword';
$route['profile/edit'] = 'backend/C_User/profile_edit';
$route['user/edit/(:any)'] = 'backend/C_User/user_edit/$1';
$route['user/update'] = 'backend/C_User/user_update';
$route['user/change-password/(:any)'] = 'backend/C_User/user_change_pass/$1';
$route['user/update-password'] = 'backend/C_User/user_update_pass';
$route['user/add'] = 'backend/C_User/user_add';
$route['user/store'] = 'backend/C_User/user_store';
$route['saldo'] = 'backend/C_User/saldo';
$route['list_saldo'] = 'backend/C_User/list_saldo';
$route['saldo/(:any)'] = 'backend/C_User/saldo_detail/$1';
$route['list_remainder'] = 'backend/C_User/list_remainder';
$route['list_transfer'] = 'backend/C_User/list_transfer';
$route['kritik-saran'] = 'C_Main/kritik_saran';

// LIST DATA
$route['broiler'] 				= 'backend/C_Broiler/entry';
$route['broiler/do_create'] 	= 'backend/C_Broiler/do_create';
$route['broierl/do_cancel'] 	= 'backend/C_Broiler/do_cancel';
$route['broierl/pdf/(:any)'] 	= 'backend/C_Broiler/generate_pdf/$1';

$route['order'] = 'backend/C_Order/index';
$route['delivery'] = 'backend/C_Delivery/index';
$route['invoice'] = 'backend/C_Invoice/index';
$route['invoice/pdf/(:any)'] = 'backend/C_Invoice/pdf/$1';

$route['sales_list'] = 'backend/C_Invoice/index_sales';
$route['sales_list/pdf/(:any)/(:any)'] = 'backend/C_Invoice/sales_pdf/$1/$2';
// $route['sales_list/export/(:any)'] = 'backend/C_Invoice/sales_export/$1';
// $route['sales_list/exporting'] = 'backend/C_Invoice/sales_exporting';

$route['transfer_confirmation'] = 'backend/C_TransferConfirmation/index';
$route['transfer_confirmation/add'] = 'backend/C_TransferConfirmation/add';
// GENERAL
$route['select2/ajax/customer_notexist'] = 'C_Main/select2_ajax_customer_notexist';
$route['generate_admin'] = 'C_Main/generate_admin';

// SALES
$route['parse_invoice/(:any)'] = 'C_Main/parse_invoice/$1';