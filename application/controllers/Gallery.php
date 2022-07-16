<?php

class Gallery extends CI_Controller
{
    public function index()
    {
        $year = !$this->input->get('year') ? 2022 : $this->input->get('year');
        return $this->load->view('gallery/index', ['year' => $year]);
    }
}
