<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']    = 'welcome';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;

$route['register']['get']   = 'User/register';
$route['login']['get']      = 'User/login';
$route['register']['post']  = 'User/store';
$route['login']['post']     = 'User/authenticate';

$route['admin'] = 'Admin';

$route['admin/kelas']                 = 'Kelas';
$route['admin/kelas/materi']          = 'Materi';
$route['admin/kelas/tambah']['get']   = 'Kelas/create';
$route['admin/kelas/tambah']['post']  = 'Kelas/store';

$route['admin/materi']['get']   = 'Materi/create';
$route['admin/materi']['post']  = 'Materi/store';

$route['admin/quiz']['get']  = 'Quiz';
$route['admin/quiz']['post'] = 'Quiz/post';

$route['admin/quiz/hapus/(:num)'] = 'Quiz/hapus/$1';

$route['siswa'] = 'Siswa';

$route['siswa/kelas/quiz/(:num)'] = 'Kelas/attempt_quiz/$1';
$route['siswa/kelas']               = 'Kelas/siswa';
$route['siswa/kelas/(:any)']        = 'Kelas/showSiswa/$1';
$route['siswa/kelas/(:any)/(:any)'] = 'Materi/show/$1/$2';



$route['siswa/sertifikat']        = 'Sertifikat';
$route['siswa/sertifikat/cetak/(:num)']  = 'Sertifikat/print/$1';

$route['logout']  = 'User/logout';