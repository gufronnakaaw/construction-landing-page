<?php

class Gallery extends CI_Controller
{
    public function index()
    {
        $year = !$this->input->get('year') ? date('Y') : $this->input->get('year');
        $page = !$this->input->get('page') ? 1 : $this->input->get('page');
        $limit = 8;
        $offset = ($page * $limit) - $limit;

        $this->db->limit($limit, $offset);
        $result = $this->db->get_where('galleries', ['gallery_year' => $year])->result_object();

        $this->db->where('gallery_year', $year);
        $total_count = $this->db->get('galleries')->num_rows();
        $total_page = ceil($total_count / $limit);

        $gallery_chunk = array_chunk($result, 4);

        $data = [
            'year' => $year,
            'galleries' => $gallery_chunk,
            'total_page' => $total_page,
            'page' => $page,
            'year' => $year
        ];

        return $this->load->view('gallery/index', $data);
    }
}
