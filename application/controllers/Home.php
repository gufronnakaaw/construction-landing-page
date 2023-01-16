<?php

class Home extends CI_Controller
{
    public function index()
    {
        $this->db->limit(6);
        $result = $this->db->get('galleries')->result_object();
        $gallery_chunk = array_chunk($result, 3);

        $data = [
            'services' => $this->db->get('services')->result_object(),
            'clients' => $this->db->get('clients')->result_object(),
            'galleries' => $gallery_chunk,
        ];
        return $this->load->view('home/index', $data);
    }
}
