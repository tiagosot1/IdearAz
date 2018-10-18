<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

/*

Autor: Tiago Oliveira

Função desenvolvida para pegar o subdomíno e colocar-lo como controlador default sem afetar o controador do domínio principal
A função do $_GET['name'] pega o subdomínio e passar ao php através do código inserido no .htaccess com a seguinte linha de código:

RewriteCond %{HTTP_HOST} !^%{HTTP_HOST}%{REQUEST_URI} 
RewriteCond %{HTTP_HOST} ^([^.]+).(.*) [NC]
RewriteRule ^$ /index.php?name=%1 [L] 

Função PHP:

//echo $_GET['name'];
$controlador = $_GET['name'];
$domain = str_replace('www.', '', $_SERVER['HTTP_HOST']);
$domain = str_replace('.com.br', '', $domain);
//echo $domain;

if($controlador =='' or $controlador =='www' or $controlador ==$domain){
	$route['default_controller'] = 'home';
}else{
	$route['default_controller'] = $_GET['name'];
}

*/

//echo $_GET['name'];
$controlador = $_GET['name'];
$domain = str_replace('www.', '', $_SERVER['HTTP_HOST']);
$domain = str_replace('.com.br', '', $domain);

//$subdomain_arr = explode('.', $_SERVER['HTTP_HOST'], 3);
//$subdomain_name = $subdomain_arr[1];

//echo $domain;

if($controlador =='' or $controlador =='www' or $controlador ==$domain){
	$route['default_controller'] = 'home';
}else{
	//$route['default_controller'] = $_GET['name'];
	$route['default_controller'] = 'loja_virtual/home/verifica/'.$_GET['name'];
}



$route['adm'] = 'painel/login';
$route['admin'] = 'painel/login';
$route['painel'] = 'painel/login';
$route['painel/(:any)'] = 'painel/$1';
$route['painel/login'] = 'painel/login';
$route['painel/(:any)/(:any)'] = 'painel/$1/$2';
$route['painel/(:any)/(:any)/(:num)'] = 'painel/$1/$2/$3';
$route['painel/(:any)/(:any)/(:any)/(:num)'] = 'painel/$1/$2/$3/$4';

//$route['infraestrutura/(:any)/(:num)'] = 'infraestrutura/index/$2'; 
//$route['infraestrutura'] = 'infraestrutura/lista'; 
//$route['infraestrutura/(:any)'] = 'infraestrutura/index/$1'; 
$route['portfolio'] = 'portfolio'; 
$route['portfolio/(:any)/(:num)'] = 'portfolio/em/$1/$2/$3'; 
$route['portfolio/'] = 'portfolio/lista'; 
$route['blog'] = "blog";
$route['blog/page'] = "blog";
$route['blog/page/(:num)'] = "blog";
$route['blog/page'] = "blog";
$route['blog/(:any)/(:num)'] = 'blog/info/$1/$2/$3'; 



$route['contato'] = 'mapa'; 
$route['cotacao'] = 'sac'; 
$route['sobre'] = 'sobre'; 
$route['parceiros'] = 'clientes'; 
$route['galeria'] = 'galeria'; 
$route['servicos/(:any)/(:any)/(:any)/(:num)'] = 'servicos/em/$1/$2/$3'; 



//$route['corpo_clinico/(:any)'] = 'corpo_clinico/lista/$1'; 


$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */