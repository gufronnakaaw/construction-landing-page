<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->email_admin) {
            return redirect('auth/login');
        }
    }
    public function index()
    {
        $data = [
            'title' => 'Jasa Renovasi',
            'url' => explode('_', $this->uri->segment(1))[0],
        ];


        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/index');
        $this->load->view('templates/footer');
    }

    // clients
    public function clients()
    {

        $data = [
            'title' => 'Clients',
            'url' => explode('_', $this->uri->segment(2))[0],
            'clients' => $this->db->get('clients')->result_object()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('clients/index');
        $this->load->view('templates/footer');
    }

    public function clients_create()
    {
        $data = [
            'title' => 'Create Clients',
            'url' => explode('_', $this->uri->segment(2))[0]
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('clients/create');
        $this->load->view('templates/footer');
    }

    public function clients_save()
    {
        $client_name = $this->input->post('client_name');
        $client_pic = $this->input->post('client_pic');

        $parts_gambar = explode(';base64', $client_pic);
        $type_gambar = explode('image/', $parts_gambar[0])[1];
        $decode_gambar = base64_decode($parts_gambar[1]);
        $filename = uniqid() . ".$type_gambar";

        $url_local = FCPATH . "/public/clients/$filename";
        $url_host = base_url() . "public/clients/$filename";

        if (!file_put_contents($url_local, $decode_gambar)) {

            $this->session->set_flashdata('flash', [
                'status' => 'danger',
                'message' => 'Upload client pic fail'
            ]);
            return redirect('dashboard/clients_save');
        }

        $insert = [
            'client_name' => $client_name,
            'client_pic' => $url_host
        ];

        if ($this->db->insert('clients', $insert) > 0) {
            $this->session->set_flashdata('flash', [
                'status' => 'success',
                'message' => 'Create client success'
            ]);
            return redirect('dashboard/clients');
        }

        $this->session->set_flashdata('flash', [
            'status' => 'danger',
            'message' => 'Create client pic fail'
        ]);
        return redirect('dashboard/clients_save');
    }

    public function clients_update()
    {
        $id = $this->uri->segment(3);

        $data = [
            'title' => 'Clients Update',
            'url' => explode('_', $this->uri->segment(2))[0],
            'client' => $this->db->get_where('clients', ['id' => $id])->row()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('clients/update');
        $this->load->view('templates/footer');
    }

    public function clients_store()
    {
        $id = $this->input->post('id');
        $client_name = $this->input->post('client_name_update');
        $client_pic_update = empty($this->input->post('client_pic_update')) ? null : $this->input->post('client_pic_update');

        if ($client_pic_update == null) {

            $this->db->where('id', $id);

            if ($this->db->update('clients', ['client_name' => $client_name]) > 0) {
                $this->session->set_flashdata('flash', [
                    'status' => 'success',
                    'message' => 'Update client success'
                ]);
                return redirect('dashboard/clients');
            }

            $this->session->set_flashdata('flash', [
                'status' => 'danger',
                'message' => 'Delete client fail'
            ]);
            return redirect('dashboard/clients');
        }

        $parts_gambar = explode(';base64', $client_pic_update);
        $type_gambar = explode('image/', $parts_gambar[0])[1];
        $decode_gambar = base64_decode($parts_gambar[1]);
        $filename = uniqid() . ".$type_gambar";

        $url_local = FCPATH . "/public/clients/$filename";
        $url_host = base_url() . "public/clients/$filename";

        if (!file_put_contents($url_local, $decode_gambar)) {

            $this->session->set_flashdata('flash', [
                'status' => 'danger',
                'message' => 'Upload client pic fail'
            ]);
            return redirect('dashboard/clients_save');
        }

        $update = [
            'client_name' => $client_name,
            'client_pic' => $url_host
        ];

        $this->db->where('id', $id);

        if ($this->db->update('clients', $update) > 0) {
            $this->session->set_flashdata('flash', [
                'status' => 'success',
                'message' => 'Update client success'
            ]);
            return redirect('dashboard/clients');
        }

        $this->session->set_flashdata('flash', [
            'status' => 'danger',
            'message' => 'Delete client fail'
        ]);
        return redirect('dashboard/clients');
    }

    public function clients_delete()
    {
        $id = $this->uri->segment(3);

        $this->db->where('id', $id);

        if ($this->db->delete('clients') > 0) {
            $this->session->set_flashdata('flash', [
                'status' => 'success',
                'message' => 'Delete client success'
            ]);
            return redirect('dashboard/clients');
        }

        $this->session->set_flashdata('flash', [
            'status' => 'danger',
            'message' => 'Delete client fail'
        ]);
        return redirect('dashboard/clients');
    }

    // services
    public function services()
    {

        $data = [
            'title' => 'Services',
            'url' => explode('_', $this->uri->segment(2))[0],
            'services' => $this->db->get('services')->result_object()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('services/index');
        $this->load->view('templates/footer');
    }

    public function services_create()
    {
        $data = [
            'title' => 'Create services',
            'url' => explode('_', $this->uri->segment(2))[0]
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('services/create');
        $this->load->view('templates/footer');
    }

    public function services_save()
    {
        $service_name = $this->input->post('service_name');
        $service_pic = $this->input->post('service_pic');

        $parts_gambar = explode(';base64', $service_pic);
        $type_gambar = explode('image/', $parts_gambar[0])[1];
        $decode_gambar = base64_decode($parts_gambar[1]);
        $filename = uniqid() . ".$type_gambar";

        $url_local = FCPATH . "/public/services/$filename";
        $url_host = base_url() . "public/services/$filename";

        if (!file_put_contents($url_local, $decode_gambar)) {

            $this->session->set_flashdata('flash', [
                'status' => 'danger',
                'message' => 'Upload service pic fail'
            ]);
            return redirect('dashboard/services_save');
        }

        $insert = [
            'service_name' => $service_name,
            'service_pic' => $url_host
        ];

        if ($this->db->insert('services', $insert) > 0) {
            $this->session->set_flashdata('flash', [
                'status' => 'success',
                'message' => 'Create service success'
            ]);
            return redirect('dashboard/services');
        }

        $this->session->set_flashdata('flash', [
            'status' => 'danger',
            'message' => 'Create service pic fail'
        ]);
        return redirect('dashboard/services_save');
    }

    public function services_update()
    {
        $id = $this->uri->segment(3);

        $data = [
            'title' => 'Services Update',
            'url' => explode('_', $this->uri->segment(2))[0],
            'service' => $this->db->get_where('services', ['id' => $id])->row()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('services/update');
        $this->load->view('templates/footer');
    }

    public function services_store()
    {
        $id = $this->input->post('id');
        $service_name = $this->input->post('service_name_update');
        $service_pic_update = empty($this->input->post('service_pic_update')) ? null : $this->input->post('service_pic_update');

        if ($service_pic_update == null) {

            $this->db->where('id', $id);

            if ($this->db->update('services', ['service_name' => $service_name]) > 0) {
                $this->session->set_flashdata('flash', [
                    'status' => 'success',
                    'message' => 'Update service success'
                ]);
                return redirect('dashboard/services');
            }

            $this->session->set_flashdata('flash', [
                'status' => 'danger',
                'message' => 'Delete service fail'
            ]);
            return redirect('dashboard/services');
        }

        $parts_gambar = explode(';base64', $service_pic_update);
        $type_gambar = explode('image/', $parts_gambar[0])[1];
        $decode_gambar = base64_decode($parts_gambar[1]);
        $filename = uniqid() . ".$type_gambar";

        $url_local = FCPATH . "/public/services/$filename";
        $url_host = base_url() . "public/services/$filename";

        if (!file_put_contents($url_local, $decode_gambar)) {

            $this->session->set_flashdata('flash', [
                'status' => 'danger',
                'message' => 'Upload service pic fail'
            ]);
            return redirect('dashboard/services_save');
        }

        $update = [
            'service_name' => $service_name,
            'service_pic' => $url_host
        ];

        $this->db->where('id', $id);

        if ($this->db->update('services', $update) > 0) {
            $this->session->set_flashdata('flash', [
                'status' => 'success',
                'message' => 'Update service success'
            ]);
            return redirect('dashboard/services');
        }

        $this->session->set_flashdata('flash', [
            'status' => 'danger',
            'message' => 'Delete service fail'
        ]);
        return redirect('dashboard/services');
    }

    public function services_delete()
    {
        $id = $this->uri->segment(3);

        $this->db->where('id', $id);

        if ($this->db->delete('services') > 0) {
            $this->session->set_flashdata('flash', [
                'status' => 'success',
                'message' => 'Delete service success'
            ]);
            return redirect('dashboard/services');
        }

        $this->session->set_flashdata('flash', [
            'status' => 'danger',
            'message' => 'Delete service fail'
        ]);
        return redirect('dashboard/services');
    }

    // galleries
    public function galleries()
    {
        $data = [
            'title' => 'Galleries',
            'url' => explode('_', $this->uri->segment(2))[0],
            'galleries' => $this->db->get('galleries')->result_object()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('galleries/index');
        $this->load->view('templates/footer');
    }

    public function galleries_create()
    {
        $data = [
            'title' => 'Create galleries',
            'url' => explode('_', $this->uri->segment(2))[0]
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('galleries/create');
        $this->load->view('templates/footer');
    }

    public function galleries_save()
    {
        $gallery_name = $this->input->post('gallery_name');
        $gallery_year = $this->input->post('gallery_year');
        $gallery_pic = $this->input->post('gallery_pic');

        $parts_gambar = explode(';base64', $gallery_pic);
        $type_gambar = explode('image/', $parts_gambar[0])[1];
        $decode_gambar = base64_decode($parts_gambar[1]);
        $filename = uniqid() . ".$type_gambar";

        $url_local = FCPATH . "/public/galleries/$filename";
        $url_host = base_url() . "public/galleries/$filename";

        if (!file_put_contents($url_local, $decode_gambar)) {

            $this->session->set_flashdata('flash', [
                'status' => 'danger',
                'message' => 'Upload gallery pic fail'
            ]);
            return redirect('dashboard/galleries_save');
        }

        $insert = [
            'gallery_name' => $gallery_name,
            'gallery_year' => $gallery_year,
            'gallery_pic' => $url_host
        ];

        if ($this->db->insert('galleries', $insert) > 0) {
            $this->session->set_flashdata('flash', [
                'status' => 'success',
                'message' => 'Create gallery success'
            ]);
            return redirect('dashboard/galleries');
        }

        $this->session->set_flashdata('flash', [
            'status' => 'danger',
            'message' => 'Create gallery pic fail'
        ]);
        return redirect('dashboard/galleries_save');
    }

    public function galleries_update()
    {
        $id = $this->uri->segment(3);

        $data = [
            'title' => 'Galleries Update',
            'url' => explode('_', $this->uri->segment(2))[0],
            'gallery' => $this->db->get_where('galleries', ['id' => $id])->row()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('galleries/update');
        $this->load->view('templates/footer');
    }

    public function galleries_store()
    {
        $id = $this->input->post('id');
        $gallery_name = $this->input->post('gallery_name_update');
        $gallery_year = $this->input->post('gallery_year_update');
        $gallery_pic_update = empty($this->input->post('gallery_pic_update')) ? null : $this->input->post('gallery_pic_update');

        if ($gallery_pic_update == null) {

            $update = [
                'gallery_name' => $gallery_name,
                'gallery_year' => $gallery_year
            ];

            $this->db->where('id', $id);
            if ($this->db->update('galleries', $update) > 0) {
                $this->session->set_flashdata('flash', [
                    'status' => 'success',
                    'message' => 'Update gallery success'
                ]);
                return redirect('dashboard/galleries');
            }

            $this->session->set_flashdata('flash', [
                'status' => 'danger',
                'message' => 'Delete gallery fail'
            ]);
            return redirect('dashboard/galleries');
        }

        $parts_gambar = explode(';base64', $gallery_pic_update);
        $type_gambar = explode('image/', $parts_gambar[0])[1];
        $decode_gambar = base64_decode($parts_gambar[1]);
        $filename = uniqid() . ".$type_gambar";

        $url_local = FCPATH . "/public/galleries/$filename";
        $url_host = base_url() . "public/galleries/$filename";

        if (!file_put_contents($url_local, $decode_gambar)) {

            $this->session->set_flashdata('flash', [
                'status' => 'danger',
                'message' => 'Upload gallery pic fail'
            ]);
            return redirect('dashboard/galleries_save');
        }

        $update = [
            'gallery_name' => $gallery_name,
            'gallery_year' => $gallery_year,
            'gallery_pic' => $url_host
        ];

        $this->db->where('id', $id);

        if ($this->db->update('galleries', $update) > 0) {
            $this->session->set_flashdata('flash', [
                'status' => 'success',
                'message' => 'Update gallery success'
            ]);
            return redirect('dashboard/galleries');
        }

        $this->session->set_flashdata('flash', [
            'status' => 'danger',
            'message' => 'Delete gallery fail'
        ]);
        return redirect('dashboard/galleries');
    }

    public function galleries_delete()
    {
        $id = $this->uri->segment(3);

        $this->db->where('id', $id);

        if ($this->db->delete('galleries') > 0) {
            $this->session->set_flashdata('flash', [
                'status' => 'success',
                'message' => 'Delete gallery success'
            ]);
            return redirect('dashboard/galleries');
        }

        $this->session->set_flashdata('flash', [
            'status' => 'danger',
            'message' => 'Delete gallery fail'
        ]);
        return redirect('dashboard/galleries');
    }
}
