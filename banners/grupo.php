<?php
/**
*
* Banners

* @Versão 3.0
* @Desenvolvedor Jeison Frasson <jomadee@lliure.com.br>
* @Entre em contato com o desenvolvedor <jomadee@lliure.com.br> http://www.lliure.com.br/
* @Licença http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/
?>
<div class="boxCenter">
	<?php
	plg_historic('return');
	if(!empty($_GET['id'])){
		if(!empty($_POST)){
			$alter['id'] = $_GET['id'];
			
			jf_update(PREFIXO.'banners_grupos', $_POST, $alter);
			?>
			<script>
				jfAlert('Grupo alterado com sucesso!');
			</script>
			<?php
			echo '<meta http-equiv="refresh" content="1;url=?app=banners&p=banners&grupo='.$_GET['id'].'"> ';
		} 

		$consulta = mysql_fetch_array(mysql_query('select * from '.PREFIXO.'banners_grupos where id = "'.$_GET['id'].'"'));
		
		$dados = $consulta;
	} else {
		if(!empty($_POST)){

			jf_insert(PREFIXO.'banners_grupos', $_POST);
			$dados = $_POST;
			?>
			<script>
				jfAlert('Novo grupo criado com sucesso!');
			</script>
			
			<?php echo '<meta http-equiv="refresh" content="1;url=?app=banners"> ';
		}
	}
	?>

	<form class="form" method="post">
		<fieldset>
			<div>
				<label>Nome</label>
				<input type="text"  <?php $item = 'nome';  echo 'name="'.$item.'"'.(isset($dados[$item])?'value="'.$dados[$item].'"': '') ?> />
			</div>
			
			<div>
				<label>Largura dos banners</label>
				<input type="text"  <?php $item = 'width';  echo 'name="'.$item.'"'.(isset($dados[$item])?'value="'.$dados[$item].'"': '') ?> />
				<span class="ex">Valor em pixel, digite apenas o valor.</span>
			</div>
			
			<div>
				<label>Altura dos banners</label>
				<input type="text"  <?php $item = 'height';  echo 'name="'.$item.'"'.(isset($dados[$item])?'value="'.$dados[$item].'"': '') ?> />
				<span class="ex">Valor em pixel, digite apenas o valor.</span>
			</div>
		</fieldset>
		
		<div class="botoes">
			<button type="submit" class="confirm">Gravar</button>
			<a href="<?php echo $backReal;?>">Voltar</a>
		</div>
	</form>

	<?php
	unset($dados);
	?>
</div>
