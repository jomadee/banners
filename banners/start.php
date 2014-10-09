<?php
/**
*
* Banners -  lliure > 4.10
*
* @Versão 2.1
* @Desenvolvedor Jeison Frasson <jomadee@lliure.com.br>
* @Entre em contato com o desenvolvedor <jomadee@lliure.com.br> http://www.lliure.com.br/
* @Licença http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

$pluginHome = "?app=banners";
$pluginPasta = "plugins/banners/";

$botoes = array(
	array('href' => $backReal, 'img' => $plgIcones.'br_prev.png', 'title' => $backNome)
	);

if(!isset($_GET['grupo']) && ll_tsecuryt()){
	$botoes[] = array('href' => $pluginHome.'&amp;p=grupo', 'img' => $plgIcones.'folder.png', 'title' => 'Criar grupo');
} elseif(isset($_GET['grupo'])) {
	ll_tsecuryt() ? $botoes[] = array('href' => $pluginHome.'&amp;p=grupo&amp;id='.$_GET['grupo'], 'img' => $plgIcones.'pencil.png', 'title' => 'Alterar grupo'):'';
	
	$botoes[] = array('href' => $pluginHome.'&amp;p=banners&amp;grupo='.$_GET['grupo'].'&amp;id', 'img' => $plgIcones.'preso.png', 'title' => 'Adicionar banner');
}

echo app_bar('Administração de banners', $botoes);

require_once(( isset($_GET['p']) ? $_GET['p'] : 'home' ).".php");
?>
