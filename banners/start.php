<?php
/**
*
* Banners
*
* @Versão 3.0
* @Desenvolvedor Jeison Frasson <jomadee@lliure.com.br>
* @Entre em contato com o desenvolvedor <jomadee@lliure.com.br> http://www.lliure.com.br/
* @Licença http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

$pluginHome = $_ll['app']['home'];
$pluginPasta = $_ll['app']['pasta'];

$botoes = array(
	array('href' => $backReal, 'fa' => 'fa-chevron-left', 'title' => $backNome)
	);

if(!isset($_GET['grupo']) && ll_tsecuryt()){
	$botoes[] = array('href' => $_ll['app']['home'].'&amp;p=grupo', 'fa' => 'fa-folder-open', 'title' => 'Criar grupo');
} elseif(isset($_GET['grupo'])) {
	ll_tsecuryt() ? $botoes[] = array('href' => $_ll['app']['home'].'&amp;p=grupo&amp;id='.$_GET['grupo'], 'fa' => 'fa-pencil-square', 'title' => 'Alterar grupo') : '';
	
	$botoes[] = array('href' => $_ll['app']['home'].'&amp;p=banners&amp;grupo='.$_GET['grupo'].'&amp;id', 'fa' => ' fa-bullhorn', 'title' => 'Adicionar banner');
}

echo app_bar('Administração de banners', $botoes);

require_once(( isset($_GET['p']) ? $_GET['p'] : 'home' ).".php");
?>
