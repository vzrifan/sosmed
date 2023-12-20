<?php

class LoginAdmin extends Controller
{
    public function index()
    {
        $this->view("templates/header");
        $this->view("loginAdmin/index");
        $this->view("templates/footer");
    }
}
