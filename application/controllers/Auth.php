<?php

class Auth extends CI_Controller
{
    // auth
    public function index()
    {
        if ($this->session->email_admin) {
            return redirect('dashboard');
        }

        return redirect('auth/login');
    }
    
    public function login()
    {
        if ($this->session->email_admin) {
            return redirect('dashboard');
        }

        return $this->load->view('auth/login');
    }

    public function check_login()
    {
        if ($this->session->email_admin) {
            return redirect('dashboard');
        }

        $email_admin = $this->input->post('email_admin');
        $password_admin = $this->input->post('password_admin');

        $admin = $this->db->get_where('admin', ['email_admin' => $email_admin])->row_object();

        if ($admin) {

            if (password_verify($password_admin, $admin->password_admin)) {

                $this->session->set_userdata('email_admin', $admin->email_admin);
                return redirect('dashboard');
            }

            $this->session->set_flashdata('flash', [
                'status' => 'danger',
                'message' => 'Wrong password'
            ]);
            return redirect('auth/login');
        }

        $this->session->set_flashdata('flash', [
            'status' => 'danger',
            'message' => 'Email not found'
        ]);
        return redirect('auth/login');
    }

    public function logout()
    {
        $this->session->unset_userdata('email_admin');
        session_destroy();
        return redirect('auth/login');
    }
}
