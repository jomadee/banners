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
?>

<div class="boxCenter" id="banners">
	<?php
	$dir = "../uploads/banners/";
	$banner = mysql_fetch_array(mysql_query('select * from '.PREFIXO.'banners_grupos where id = "'.$_GET['grupo'].'" limit 1'));
	?>
	<h2><?php echo $banner['nome']?></h2>
	<span class="dimen"><?php echo 'Dimenções do banner: largura: <strong>'.$banner['width'].'px</strong> x altura: <strong>'.$banner['height'].'px</strong>'?></span>
	<?php
	if(!isset($_GET['id'])){
		if(isset($_GET['del'])){
			plg_historic('return');
			$consulta = "select imagem from ".PREFIXO."banners  where id =".$_GET['del']." limit 1";
			$query = mysql_fetch_array(mysql_query($consulta));
			
			if(!empty($query['imagem'])){
				@unlink($dir.$query['imagem']);
			}

			$alter['id'] = $_GET['del'];
			jf_delete(PREFIXO.'banners', $alter);
		}
		?>

		<table class="table">
			<tr>
				<th width="70px"></th>
				<th></th>
				<th class="ico"></th>
			</tr>
			
			<?php
			$sql = mysql_query('select * from '.PREFIXO.'banners where grupo = "'.$_GET['grupo'].'" order by nome asc');
			while($dados = mysql_fetch_array($sql)){
				?>
				<tr id="<?php echo "empr".$dados['id'];?>">
				<td>
					<a href="<?php echo $pluginHome."&amp;p=banners&amp;grupo=".$_GET['grupo']."&amp;id=".$dados['id']?>">
					<img src="includes/thumb.php?i=../<?php echo $dir.$dados['imagem']; ?>:60:0:c" />
					</a>
				</td>
				
				<td><a href="<?php echo $pluginHome."&amp;p=banners&amp;grupo=".$_GET['grupo']."&amp;id=".$dados['id']?>"><?php echo $dados['nome'];?></a></td>
				
				<td><a href="<?php echo $pluginHome."&amp;p=banners&amp;grupo=".$_GET['grupo']."&amp;del=".$dados['id'];?>" onclick="return confirmAlgo('Você quer mesmo excluir esse banner?')" ><img src="imagens/icones/preto/trash.png"></td>
				</tr>
				<?php
			}
			?>
		</table>
		<?php
	} else {
		if(!empty($_POST)){
			$erro = false;
			
			if(!empty($_FILES['fileup_file']['name'][0])){
				$xy = getimagesize($_FILES['fileup_file']['tmp_name'][0]);							

				if ($xy[0] != $banner['width'] || $xy[1] != $banner['height']) {				
					echo '<script>jfAlert(\'A imagem enviada está fora dos padrões do grupo, o tamanho correto é <strong>'.$banner['width'].'x'.$banner['height'].'px</strong> \', \'5\')</script>';
					
					unset($_POST['fileup_campo'], $_POST['fileup_regant'], $_POST['fileup_total']);
					
					$erro = true;
				} else {					
					$file = new fileup; 		// incia a classe
					$file->diretorio = $dir;	// pasta para o upload (lembre-se que o caminho é apartir do arquivo onde estiver sedo execultado)
					$file->up(); 				// executa a classe
				}
			} else {
				unset($_POST['fileup_campo'], $_POST['fileup_regant'], $_POST['fileup_total']);
			}
	
			if(!empty($_GET['id'])){
				$alter['id'] = $_GET['id'];
				
				jf_update(PREFIXO.'banners', $_POST, $alter);
				echo ($erro? '' : '<script>jfAlert(\'Alteração realizada com sucesso!\')</script>');
				
				echo '<meta http-equiv="refresh" content="1;url=?app=banners&p=banners&grupo='.$_GET['grupo'].'"> ';

			} else {
				$_POST['grupo'] = $_GET['grupo'];
			
				jf_insert(PREFIXO.'banners', $_POST);
				
				$_GET['id'] = $jf_ultimo_id;
				echo ($erro? '' : '<script>jfAlert(\'Banner adicionado com sucesso!\')</script>');
				echo '<meta http-equiv="refresh" content="2;url=?app=banners&p=banners&grupo='.$_GET['grupo'].'"> ';
			}
		}
		
		if(!empty($_GET['id'])){
			$consulta = mysql_fetch_array(mysql_query('select * from '.PREFIXO.'banners where id = "'.$_GET['id'].'"'));
			$dados = $consulta;
		}
		?>
		<form class="form" method="post" enctype="multipart/form-data">
			<fieldset>
				<div>
					<label>Nome</label>
					<input type="text"  <?php $item = 'nome';  echo 'name="'.$item.'"'.(isset($dados[$item])?'value="'.$dados[$item].'"': '') ?> />
				</div>
				
				<div>
					<label>Url</label>
					<input type="text"  <?php $item = 'url';  echo 'name="'.$item.'"'.(isset($dados[$item])?'value="'.$dados[$item].'"': '') ?> />
				</div>
				
				<div>
					<?php
					$file = new fileup; 
					$file->titulo = 'Imagem'; 	
					$file->rotulo = 'Selecionar imagem';
					$file->registro = $dados['imagem'];
					$file->campo = 'imagem';
					$file->extencao = 'png jpg'; 
					$file->form();
					?>
				</div>	
			</fieldset>
			<span class="botao"><button type="submit">Gravar</button></span>
			<span class="botao"><a href="<?php echo $backReal?>">Voltar</a></span>
		</form>
		<?php
		unset($dados);
	}
	?>
</div>
