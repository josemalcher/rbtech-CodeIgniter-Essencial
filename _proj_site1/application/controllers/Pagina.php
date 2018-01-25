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
    public function features(){
        $dados['titulo'] = 'Features - Site teste 01';
        $this->load->view('features', $dados);
    }
    public function news(){
        $dados['titulo'] = 'News - Site teste 01';
        $this->load->view('news', $dados);
    }
    public function about(){
        $dados['titulo'] = 'About - Site teste 01';
        $this->load->view('about', $dados);
    }
    public function contact(){
        $dados['titulo'] = 'Contact - Site teste 01';
        $this->load->view('contact', $dados);
    }
}