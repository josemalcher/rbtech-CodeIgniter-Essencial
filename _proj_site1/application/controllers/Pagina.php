<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    public function index(){
        $dados['titulo'] = 'Site teste 01';
        $this->load->view('home', $dados);
    }
}