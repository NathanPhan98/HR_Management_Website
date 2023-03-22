<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::logout');

$routes->get('/login', 'Home::login');
//$routes->get('/act_login', 'Home::act_login');
$routes->post('/login_action', 'Home::login_action');

$routes->get('/logout', 'Home::logout');

$routes->post('/doiMatKhau', 'Home::act_doiMatKhau');

$routes->get('/dashboard', 'Home::index');
$routes->get('/forbidden', 'Home::forbidden');
//$routes->get('/main/(:any)', 'main\indexPage::index/$1');


// Role link 
$routes->get('/nhanVien', 'main\ctlNhanVien::listUser');
$routes->get('/account', 'main\ctlUser::listAccount');
$routes->get('/luongCoBan', 'main\ctlLuongCoBan::luongCoBan');
$routes->get('/phuCap', 'main\ctlPhuCap::listPhuCap');
$routes->get('/baoHiem', 'main\ctlBaoHiem::listBaoHiem');
$routes->get('/doanhThu', 'main\ctlDoanhThu::listDoanhThu');
$routes->get('/chucVu', 'main\ctlChucVu::listChucVu');
$routes->get('/phongBan', 'main\ctlPhongBan::listPhongBan');
$routes->post('/phongBan/addnewphongban', 'main\ctlPhongBan::addPhongBan');
// add 
$routes->get('/nhanVien/add', 'main\ctlNhanVien::add');
$routes->post('/nhanVien/act_add', 'main\ctlNhanVien::add_act');
$routes->post('/nhanVien/act_update', 'main\ctlNhanVien::update_act');
$routes->get('/nhanVien/chitietnhanvien/', 'main\ctlNhanVien::userDetail');

$routes->post('/account/addnewaccount', 'main\ctlUser::addAccount');
$routes->get('/account/delete/(:num)', 'main\ctlUser::delete/$1');
//nghiep vu chinh
$routes->get('/phanCong', 'main\ctlPhanCong::listAssignment');
$routes->post('/phanCong/createAssignment', 'main\ctlPhanCong::createAssignment');


$routes->get('/chamCong', 'main\ctlChamCong::listNVPB');
$routes->get('/chamCong/DSChamCong', 'main\ctlChamCong::listChamCongNVPB');

$routes->post('/chamCong/act_lapBangChamCong', 'main\ctlChamCong::act_lapBangChamCong');
$routes->post('/chamCong/act_capNhatBangChamCong', 'main\ctlChamCong::act_capNhatBangChamCong');

$routes->get('/doanhThu/addDoanhThu', 'main\ctlDoanhThu::listDoanhThuAllNV');
$routes->post('/doanhThu/act_addDoanhThu', 'main\ctlDoanhThu::act_addDoanhThu');

$routes->get('/bangLuong/lapbanluong', 'main\ctlBangLuong::lapBangLuongNVPB');
$routes->post('/bangluong/act_lapBanLuongChoPhongBan', 'main\ctlBangLuong::act_lapBanLuongChoPhongBan');

$routes->get('/bangLuong/tinhToanLuong', 'main\ctlBangLuong::act_tinhLuong');

$routes->get('/bangLuong', 'main\ctlBangLuong::listBangLuongNVPB');
//$routes->post('/bangLuong/(:num)/(:num)', 'main\ctlBangLuong::listBangLuongNVPB/$1/$2'); bo di
$routes->get('/nhanVien/print', 'main\ctlNhanVien::print');

$routes->get('/bangLuong/print', 'main\ctlBangLuong::print');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
