<?php

class Home extends CI_Controller
{
    public function index()
    {
        return $this->load->view('home/index');
    }
}
