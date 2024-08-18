<?php
function cek_login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda belum login!! </div>');
        redirect('autentifikasi');
    } else {
        $role_id = $ci->session->userdata('role_id');
        //$menu = $ci->uri->segment(1);

        //$queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        //$menu_id = $queryMenu['id'];

        //$userAccess = $ci->db->get_where('user_access_menu', [
          //  'role_id' => $role_id,
            //'menu_id' => $menu_id
        //]);

        //if($userAccess->num_rows() < 1) {
          //  redirect('autentifikasi/blok');
        //}
    }
}
function cek_user()
{
    $ci = get_instance();
    $role_id = $ci->session->userdata('role_id');
    if ($role_id != 1) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses tidak diizinkan </div>');
        redirect('autentifikasi/blok');
    }
}
function cek_user1()
{
    $ci = get_instance();
    $role_id = $ci->session->userdata('role_id');
    if ($role_id != 2) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses tidak diizinkan </div>');
        redirect('autentifikasi/blok1');
    }
}



//function user_level(){
//    $ci = get_instance();
//    if (!$ci->session->userdata('email')){
//        redirect('auth');
//    }
//    else{
//        $role_id = $ci->session->userdata('role_id');
//        $menu = $ci->uri->segment(1);
//        $queryMenu = $ci->db->get_where('user_sub_menu', ['level' => $menu])->row_array();

        // var_dump($role_id);
        // var_dump($queryMenu['menu_id']);
        // die;
//        $menu_id = $queryMenu['menu_id'];

//        $userAccess = $ci->db->get_where('user_access_menu', [
//            'role_id' => $role_id,
//            'menu_id' => $menu_id
//        ])->row_array();
//        // var_dump($userAccess);
//        // die;

//        if (empty($userAccess)) {
//            redirect('auth/blocked');
//        }


//    }
//}