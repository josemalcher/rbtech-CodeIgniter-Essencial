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
        $this->load->helper('form');
        //$this->load->library('form_validation');
        $this->load->library(array('form_validation','email'));

        $this->form_validation->set_rules('nome','Nome','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('assunto','Assunto','trim|required');
        $this->form_validation->set_rules('mensagem','Mensagem','trim|required');

        if($this->form_validation->run() == FALSE):
            $dados['formerror'] = validation_errors();
        else:
            $dados_form = $this->input->post();
            //print_r($dados_form);
            $this->email->from($dados_form['email'],$dados_form['nome']);
            $this->email->to('suporte@josemalcher.net');
            $this->email->subject($dados_form['assunto']);
            $this->email->message($dados_form['mensagem']);
            if($this->email->send()):
                $dados['formerror'] = 'Validação OK - ENVIADO PARA O EMAIL';
            else:
                $dados['formerror'] = 'Erro ao enviar!';
            endif;
        endif;
        $dados['titulo'] = 'Contact - Site teste 01';
        $this->load->view('contact', $dados);
    }
}