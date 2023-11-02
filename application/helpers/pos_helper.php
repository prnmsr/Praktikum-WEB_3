<?php
function infoLogin() {
    $ci = get_instance();
    return $ci->db->get_where('tb_user', ['username' => $ci->session->userdata('username')])->row_array();
}

function cekLogin() {
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('login');
    }
}

function cekUser() {
    $ci = get_instance();
    $user = $ci->db->get_where('tb_user', ['username' => $ci->session->userdata('username')])->row_array();
    if ($user['role'] == 'login') {
        // Apa yang ingin Anda lakukan jika role adalah 'login'?
    } else {
        redirect('login/block');
    }
}
?>
