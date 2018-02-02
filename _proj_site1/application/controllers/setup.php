<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('option_model', 'option');
    }

    public function index(){
        if($this->option->get_option('setup_executado') == 1):
            //setup ok, mostra tela para editar dados de setup
            redirect('setup/alterar','refresh');
        else:
            //não instalado, mostra tela de setup
            redirect('setup/instalar','refresh');
        endif;
    }

    public function instalar(){
        if($this->option->get_option('setup_executado') == 1):
            //setup ok, mostra tela para editar dados de setup
            redirect('setup/alterar','refresh');
        endif;

        //regras de validação
        $this->form_validation->set_rules('login','NOME','trim|required|min_length[5]');
        $this->form_validation->set_rules('email','EMAIL','trim|required|valid_email');
        $this->form_validation->set_rules('senha','SENHA','trim|required|min_length[6]');
        $this->form_validation->set_rules('senha2','REPITA SENHA','trim|required|min_length[6]|matches[senha]');

        // verifica a validação
        if($this->form_validation->run() == FALSE):
            if(validation_errors()):
                set_msg(validation_errors());
            endif;
        else:
            $dados_form = $this->input->post();
            $this->option->update_option('user_login',$dados_form['login']);
            $this->option->update_option('user_email',$dados_form['email']);
            $this->option->update_option('user_pass',password_hash($dados_form['senha'],PASSWORD_DEFAULT));

            $inserindo = $this->option->update_option('setup_executado',1);
            if($inserindo):
                set_msg('<p>Sistema Instalado, Use os dados para Logar no Sistema</p>');
                redirect('setup/login','refresh');
            endif;
        endif;

        //carrega a view
        $dados['titulo'] = 'Curso CI - SETUP do sistema';
        $dados['h1'] = 'SETUP do SISTEMA';
        $this->load->view('painel/setup',$dados);
    }

    public function login(){
        if($this->option->get_option('setup_executado') != 1):
            //setup não ok, mostrar tela para instalar o sistema
            redirect('setup/instalar','refresh');
        endif;
        //regras de validação
        $this->form_validation->set_rules('login','NOME','trim|required|min_length[5]');
        $this->form_validation->set_rules('senha','SENHA','trim|required|min_length[6]');

        // verifica a validação
        if($this->form_validation->run() == FALSE):
            if(validation_errors()):
                set_msg(validation_errors());
            endif;
        else:
            $dados_form = $this->input->post();
            if($this->option->get_option('user_login') == $dados_form['login']):
                //usuário existe
                if(password_verify($dados_form['senha'], $this->option->get_option('user_pass'))):
                    //senha ok, fazer login
                    $this->session->set_userdata('login', TRUE);
                    $this->session->set_userdata('user_login', $dados_form['login']);
                    $this->session->set_userdata('user_email', $this->option->get_option('user_email'));
                    // Fazer redirect para a HOME do PAINEL
                    var_dump($_SESSION); //teste
                else:
                    // SENHA incorreta
                    set_msg('<p>Senha Incorreta</p>');
                endif;
            else:
                // usuário não existe
                set_msg('<p>USUÀRIO não existe!!</p>');
            endif;

        endif;



        //carrega a view
        $dados['titulo'] = 'Curso CI - SETUP do sistema';
        $dados['h1'] = 'LOGIN DO SISTEMA';
        $this->load->view('painel/login',$dados);
    }
}