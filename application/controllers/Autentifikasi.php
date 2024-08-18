<?php
class Autentifikasi extends CI_Controller
{
    public function index()
    {
        
//jika statusnya sudah login, maka tidak bisa mengakses halaman login alias dikembalikan ke tampilan user
        if($this->session->userdata('email')){
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
            'required' => 'Email Harus diisi!!',
            'valid_email' => 'Email Tidak Benar!!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Harus diisi'
        ]);
        //$this->form_validation->set_rules('input_captcha', 'Captcha', 'required|trim', [
          //  'required' => 'Captcha  Harus diisi'
        //]);

        if ($this->form_validation->run() == false) {
            $this->load->helper('captcha');
            $vals = array(
                //'word'          => 'Random word',
                'img_path'      => './assets/captcha/',
                'img_url'       => base_url('assets/captcha/'),
                'font_path'     => './system/fonts/texb.ttf',
                'img_width'     => '150',
                'img_height'    => 30,
                'expiration'    => 7200,
                'word_length'   => 8,
                'font_size'     => 16,
                'img_id'        => 'Imageid',
                'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        
                // White background and border, black text and red grid
                    'colors' => array(
                        'background' => array(255, 255, 255),
                        'border' => array(255, 255, 255),
                        'text' => array(0, 0, 0),
                        'grid' => array(255, 40, 40)
                    )
            );
            
            $cap = create_captcha($vals);
            //$data['captcha_image'] = $cap['image'];
            //$captchaword= $cap['word'];
            //$this->session->set_userdata('captchaword', $captchaword);
            
            $data['judul'] = 'Login';
            $data['user'] = '';
 //kata 'login' merupakan nilai dari variabel judul dalam array $data dikirimkan ke view aute_header
            $this->load->view('autentifikasi/templates/aute_header', $data);
            $this->load->view('home/template/navbar', $data);
            $this->load->view('autentifikasi/login', $data);
            $this->load->view('autentifikasi/templates/aute_footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $email          = htmlspecialchars($this->input->post('email', true));
        $password       = $this->input->post('password', true);
        //$input_captcha  = $this->input->post('input_captcha');

        $user = $this->ModelUser->cekData(['email' => $email])->row_array();

        //if ($this->input->post('input_captcha') != $this->session->userdata('captcha_str')) {
          //  $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Captcha Salah</div>');
            //redirect('autentifikasi');
        //}
 //jika usernya ada
        if ($user) {
 //jika user sudah aktif
            if ($user['is_active'] == 1) {
 //cek password
                if (password_verify($password, $user['password'])) {$data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'id_user' => $user['id_user']
                    ];
                    $this->session->set_userdata($data);

                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
                    redirect('autentifikasi');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">User belum diaktifasi!!</div>');
                redirect('autentifikasi');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!!</div>');
            redirect('autentifikasi');
        }
    }
    public function registrasi()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
 
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama Belum diis!!'
        ]);

        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[user.email]', [
            'valid_email' => 'Email Tidak Benar!!',
            'required' => 'Email Belum diisi!!',
            'is_unique' => 'Email Sudah Terdaftar!'
        ]);
 
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password Tidak Sama!!',
            'min_length' => 'Password Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
 
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Registrasi Member';
            $this->load->view('autentifikasi/templates/aute_header', $data);
            $this->load->view('home/template/navbar', $data);
            $this->load->view('autentifikasi/registrasi', $data);
            $this->load->view('autentifikasi/templates/aute_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];
            

            $token = base64_encode(random_bytes(32));
            $user_token =[
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            
             
            
            $this->ModelUser->simpanData($data); 
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
            redirect('autentifikasi');
        }
    }
    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->result_array();

        if($user){
            $user_token = $this->db->get_where('user_token', ['token' => $token])->result_array();
            if($user_token){
                //if (time() - $user_token['date_created'] < (60*60*24)){
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'. $email .' Terverifikasi</div>');
                    redirect('autentifikasi');
                //} else {
                //    $this->db->delete('user', ['email' =>$email]);
                //    $this->db->delete('user_token', ['email' => $email]);


                //    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Verifikasi gagal, Token Expired</div>');
                //    redirect('autentifikasi');
                //}
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Verifikasi gagal, Salah Token</div>');
                redirect('autentifikasi');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Verifikasi gagal, Salah Email</div>');
            redirect('autentifikasi');
        }
    }
    public function blok()
    {
        $this->load->view('autentifikasi/blok');
    }
    public function blok1()
    {
        $this->load->view('autentifikasi/blok1');
    }
    public function gagal()
    {
        $this->load->view('autentifikasi/gagal');
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-message" role="alert">Anda telah logOut!!</div>');
        redirect('autentifikasi');

    }
    public function lupaPassWord()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if($this->form_validation->run() == false) {
            $data['judul'] = 'Lupa Password';
            $this->load->view('autentifikasi/templates/aute_header', $data);
            $this->load->view('autentifikasi/lupapassword', $data);
            $this->load->view('autentifikasi/templates/aute_footer', $data);

        } else {
            $email = $this->input->post('email');
            $user   = $this->db->get_where('user', ['email' => $email, 'is_active' =>1])->result_array();

            if($user) {
                $token = base64_encode(random_bytes(32));
                $user_token =[
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-message" role="alert">Please check Email</div>');
                redirect('autentifikasi');
            } else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!!</div>');
                redirect('autentifikasi');
            }
        }
        
    }
    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user' , ['email' => $email])->result_array();
        if($user){
            $user_token = $this->db->get_where('user_token', ['token' => $token])->result_array();
            if($user_token){
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();

            } else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-message" role="alert">Reset Password gagal, salah Token!!</div>');
                redirect('autentifikasi/lupaPassword');
            }
        }else {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-message" role="alert">Reset Password gagal, salah Email!!</div>');
            redirect('autentifikasi/lupaPassword');
        }
    }
    public function changePassword()
    {
        if(!$this->session->userdata('reset_email')){
            redirect('autentifikasi');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|matches[password2]');
        $this->form_validation->set_rules('password2', ' Ulangi Password', 'trim|required|matches[password1]');

        if($this->form_validation->run() == false) {
            $data['judul'] = 'Change Password';
            $this->load->view('autentifikasi/templates/aute_header', $data);
            $this->load->view('autentifikasi/changepassword', $data);
            $this->load->view('autentifikasi/templates/aute_footer', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-message" role="alert">Password terganti</div>');
            redirect('autentifikasi');

        }
        
    }
    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'infratekbogor@gmail.com',
            'smtp_pass' => 'rwyfhjftqxqevbov',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
        ];
        

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->initialize($config);

        $this->email->from('infratekbogor@gmail.com', 'InfraTek Bogor');
        $this->email->to($this->input->post('email'));



        if($type == 'verify'){
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Click this Link untuk verifikasi Akun : 
            <a href="'. base_url() . 'autentifikasi/verify?email=' . $this->input->post('email'). '&token=' . urlencode($token) . '">Activate</a>');

        }else if ($type == 'forgot'){
            $this->email->subject('Reset Password');
            $this->email->message('Click this Link untuk Reset Password : 
            <a href="'. base_url() . 'autentifikasi/resetpassword?email=' . $this->input->post('email'). '&token=' . urlencode($token) . '">Reset Password</a>');
        }
        
        if ($this->email->send()){
            return true;
        } else{
            echo $this->email->print_debugger();
            die;
        }
    }

    
}
