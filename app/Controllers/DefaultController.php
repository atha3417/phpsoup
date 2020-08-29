<?php

class DefaultController extends Controller
{
    public function index()
    {
        $this->load->view('default_view');
    }
}
