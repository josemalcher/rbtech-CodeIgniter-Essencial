# Curso da RbTech de CodeIgniter

http://dev.rbtech.info/codeigniter-essencial-introducao-instalacao

---

## <a name="indice">Índice</a>

- [CodeIgniter Essencial - Introdução e instalação](#parte1)   
- [CodeIgniter Essencial - MVC e a estrutura de diretórios](#parte2)   
- [CodeIgniter Essencial - MVC na prática](#parte3)   
- [CodeIgniter Essencial - Download do curso](#parte4)   
- [CodeIgniter Essencial - Criando um site parte 1](#parte5)   
- [CodeIgniter Essencial - Criando um site parte 2](#parte6)   
- [CodeIgniter Essencial - Criando um site parte 3](#parte7)   
- [CodeIgniter Essencial - Criando um painel parte 1](#parte8)   
- [CodeIgniter Essencial - Criando um painel parte 2](#parte9)   
- [CodeIgniter Essencial - Criando um painel parte 3](#parte10)   
- [CodeIgniter Essencial - Criando um painel parte 4](#parte11)   
- [CodeIgniter Essencial - Criando um painel parte 5](#parte12)   
- [CodeIgniter Essencial - Criando um painel parte 6](#parte13)   



---

## <a name="parte1">CodeIgniter Essencial - Introdução e instalação</a>

http://dev.rbtech.info/codeigniter-essencial-introducao-instalacao

https://codeigniter.com/

[Voltar ao Índice](#indice)

---

## <a name="parte2">CodeIgniter Essencial - MVC e a estrutura de diretórios</a>

http://dev.rbtech.info/codeigniter-essencial-mvc-estrutura-diretorios

[Voltar ao Índice](#indice)

---

## <a name="parte3">CodeIgniter Essencial - MVC na prática</a>

http://dev.rbtech.info/codeigniter-essencial-mvc-pratica/

#### controllers/Base.php
```php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

    public function index(){
        //método padrão do Controller
    }
}
/**
 * Index Page for this controller.
 *
 * Maps to the following URL
 * 		http://example.com/index.php/welcome
 *	- or -
 * 		http://example.com/index.php/welcome/index
 *	- or -
 * Since this controller is set as the default controller in
 * config/routes.php, it's displayed at http://example.com/
 *
 * So any other public methods not prefixed with an underscore will
 * map to /index.php/welcome/<method_name>
 * @see https://codeigniter.com/user_guide/general/urls.html
 */
```

#### controllers/Exemplo1.php
```php
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

```

#### views/Exemplo1.php
```php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Exemplo de View</title>
</head>
<body>

<div id="container">
    <h1><?php  echo $titulo; ?></h1>

    <div id="body">
        <p><?php  echo $conteudo; ?></p>

    </div>


</div>

</body>
</html>
```

#### models/Exemplo1_model.php
```php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exemplo1_model extends CI_Model {

    function __construct(){
        parent::__construct();

    }

    public function salvar(){
        //fins didáticos
        echo 'executando o método SALVAR do MODEL';
    }
}
```

#### config/routers.php

```php
    $route['default_controller'] = 'welcome';
    //$route['default_controller'] = 'exemplo1';
```


[Voltar ao Índice](#indice)

---

## <a name="parte4">CodeIgniter Essencial - Download do curso</a>

http://dev.rbtech.info/codeigniter-essencial-download-curso

[Voltar ao Índice](#indice)

---

## <a name="parte5">CodeIgniter Essencial - Criando um site parte 1</a>

http://dev.rbtech.info/codeigniter-essencial-criando-site-parte-1/

#### controllers/Pagina.php
```php
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
```
#### views/header.php
```php
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $titulo ?></title>
	<link rel="stylesheet" href="<?php echo base_url('asserts/css/style.css') ?>" type="text/css">
</head>
<body>
	<div id="header">
		<div>
			<div class="logo">
				<a href="<?php echo base_url(); ?>">Zero Type</a>
			</div>
			<ul id="navigation">
				<li class="active">
					<a href="<?php echo base_url(); ?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url('features'); ?>">Features</a>
				</li>
				<li>
					<a href="<?php echo base_url('news'); ?>">News</a>
				</li>
				<li>
					<a href="<?php echo base_url('about'); ?>">About</a>
				</li>
				<li>
					<a href="<?php echo base_url('contact'); ?>">Contact</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="adbox">
		<div class="clearfix">
			<img src="<?php echo base_url('asserts/images/box.png') ?>" alt="Img" height="342" width="368">
			<div>
				<h1>Ideas?</h1>
				<h2>That's what we live for.</h2>
				<p>
					Wix is an online website builder with a simple drag & drop interface, meaning you do the work online and instantly publish to the web. <span><a href="index.html" class="btn">Try It Now!</a><b>Don’t worry it’s for free</b></span>
				</p>
			</div>
		</div>
	</div>
```


[Voltar ao Índice](#indice)

---

## <a name="parte6">CodeIgniter Essencial - Criando um site parte 2</a>

http://dev.rbtech.info/codeigniter-essencial-criando-site-parte-2/

#### controllers/Pagina.php
```php
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
```

#### routers.php
```php
$route['default_controller'] = 'pagina';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['features'] = 'pagina/features';
$route['news'] = 'pagina/news';
$route['about'] = 'pagina/about';
$route['contact'] = 'pagina/contact';
    // adição do .htaccess para melhorar o nome da url
```

#### .htaccess
```
<IfModule mod_rewrite.c>
   RewriteEngine On
   RewriteCond %{REQUEST_FILENAME} !-f
   RewriteCond %{REQUEST_FILENAME} !-d
   RewriteRule ^(.*)$ index.php/$1 [L]
</IfModule>
```

[Voltar ao Índice](#indice)

---

## <a name="parte7">CodeIgniter Essencial - Criando um site parte 3</a>


[Voltar ao Índice](#indice)

---

## <a name="parte8">CodeIgniter Essencial - Criando um painel parte 1</a>


[Voltar ao Índice](#indice)

---

## <a name="parte9">CodeIgniter Essencial - Criando um painel parte 2</a>


[Voltar ao Índice](#indice)

---

## <a name="parte10">CodeIgniter Essencial - Criando um painel parte 3</a>


[Voltar ao Índice](#indice)

---

## <a name="parte11">CodeIgniter Essencial - Criando um painel parte 4</a>


[Voltar ao Índice](#indice)

---

## <a name="parte12">CodeIgniter Essencial - Criando um painel parte 5</a>


[Voltar ao Índice](#indice)

---

## <a name="parte13">CodeIgniter Essencial - Criando um painel parte 6</a>


[Voltar ao Índice](#indice)

---