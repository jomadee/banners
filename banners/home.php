<?php
/**
*
* Banners - Aplicativo para lliure 4.10
*
* @Versão 2.0
* @Desenvolvedor Jeison Frasson <jomadee@lliure.com.br>
* @Entre em contato com o desenvolvedor <jomadee@lliure.com.br> http://www.lliure.com.br/
* @Licença http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

$navigi = new navigi();
$navigi->tabela = PREFIXO.'banners_grupos';
$navigi->query = 'select * from '.$navigi->tabela.' order by nome asc' ;
$navigi->delete = true;
$navigi->rename = true;
$navigi->config = array(
	'ico' => $_ll['app']['pasta'].'img/grupo.png',
	'link' => '?app=banners&amp;p=banners&amp;grupo='           
	);								
$navigi->monta();
?>
