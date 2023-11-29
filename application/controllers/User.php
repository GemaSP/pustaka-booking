<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['judul'] = 'Profil Saya';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function anggota()
    {
        $data['judul'] = 'Data Anggota';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('role_id', 2);
        $data['anggota'] = $this->db->get('user')->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/anggota', $data);
        $this->load->view('templates/footer');
    }

    public function updateAnggota()
    {
        $user = $this->ModelUser->cekData(['id' => $this->uri->segment(3)])->row_array();
        if ($user['is_active'] == 1) {
            $where = $this->uri->segment(3);
            $is_active = 0;
            $this->db->set('is_active', $is_active);
            $this->db->where('id', $where);
            $this->db->update('user');
        }
            else {
                $where = $this->uri->segment(3);
                $is_active = 1;
                $this->db->set('is_active', $is_active);
                $this->db->where('id', $where);
                $this->db->update('user');
            }
         redirect('user/anggota');
    }

    public function ubahProfil()
    {
        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak Boleh Kosong'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubah-profile', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);
            
            //jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];
            
            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '5000';
                $config['max_width'] = '3000';
                $config['max_height'] = '3000';
                $config['file_name'] = 'pro'.time();

                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $data['user']['image'];
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' .$gambar_lama);
                    }
                    
                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('image', $gambar_baru);
                } else { }
            }
            
            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('pesan',
            '<div class="alert alert-success alert-message" role="alert">
            Profil Berhasil diubah
            </div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['judul'] = 'Ubah Password';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('current_password', 'Current Password',
        'required|trim',[
            'required' => 'Password Belum diisi!!'
        ]);
        $this->form_validation->set_rules('new_password1', 'New Password',
        'required|trim|min_length[3]|matches[new_password2]',[
            'required' => 'Password Belum diisi!!',
            'min_length' => 'Password terlalu pendek',
            'matches' => 'Password baru harus sama'
        ]);
        $this->form_validation->set_rules('new_password2', 'New Password',
        'required|trim|min_length[3]|matches[new_password1]',[
            'required' => 'Password Belum diisi!!',
            'min_length' => 'Password terlalu pendek',
            'matches' => 'Password baru harus sama'
        ]);


        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/change-password', $data);
            $this->load->view('templates/footer');
            } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if(!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('pesan',
                '<div class="alert alert-danger alert-message" role="alert">
                Password lama salah
                </div>');
                redirect('user/changePassword');
                } else {
                    if($current_password == $new_password) {
                        $this->session->set_flashdata('pesan',
                        '<div class="alert alert-danger alert-message" role="alert">
                        Password baru tidak boleh sama dengan password lama
                        </div>');
                        } else {
                            // password sudah ok
                            $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                            $this->db->set('password', $password_hash);
                            $this->db->where('email', $this->session->userdata('email'));
                            $this->db->update('user');
                            $this->session->set_flashdata('pesan',
                            '<div class="alert alert-success alert-message" role="alert">
                            Password berhasil diubah
                            </div>');
                            redirect('user/changePassword');
                            }
                }
        }
        
    }
}