<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exemplo1 extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Exemplo1_model','apelido_model');
    }

    public function index(){
        //echo 'Executando método index no controller'; // fins didáticos
// http://localhost/proj_codeigniter/rbtech-CodeIgniter-Essencial/index.php/exemplo1

        $dados['titulo'] = 'Minha primeira View';
        $dados['conteudo'] = 'The page you are looking at is being generated dynamically by CodeIgniter.';
        $this->load->view('exemplo1', $dados);
    }
    public function login(){
        //echo 'Executando método Login no controller '; // fins didáticos
//http://localhost/proj_codeigniter/rbtech-CodeIgniter-Essencial/index.php/exemplo1/login
        //echo $this->uri->segment(3); // ../index.php/exemplo1/login/parametro (3 segmento pós index)

        //$this->Exemplo1_model->salvar(); // ../index.php/exemplo1/login
        $this->apelido_model->salvar(); // ../index.php/exemplo1/login
    }
}

