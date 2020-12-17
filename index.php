<?php
require_once getcwd()."/src/moduloDonuts.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Titia Donuts
	</title>
	<meta charset=utf-8>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container"><!--abre container-->
		<div class="top"><!--abre top-->
		<h1 id= "title">Titia Donuts</h1>
		<a href="adiciona_produto.php" class="adicionar_produto">Adicionar Produto</a><!-- link para adicionar produto-->
		</div><!--fecha top-->
			<?php
			$images = scandir("src/imagens");
			if ($produto = Donut::List_donuts()) {
				//funcao para listagem dos produtos
				foreach ($produto as $pr) {//percorrer todos os produtos?>
				<div class="product_area"><!--area do produto-->
					<div class="blur"></div><!--blur para efeito visual-->
					<div class="content"><!--conteudo e background-->
				    	<a class="link_edit"href="'edita_produto.php?varname=<?=$pr->id?>'">Editar</a>
						<?php
						$imagem ="default.png";	//caso nao seja encontrada a imagem
						foreach($images as $img){
		    				if(!in_array($img, array(".", "..")) && $pr->foto ==$img){
				            	$imagem = $img;//captura da imagem respectiva do produto na pasta src/imagens
				        	}
				    	}?>
			    		<img class="imagem" src='src/imagens/<?=$imagem?>'>
						<h5 class="cat"><?=$pr->categoria?></h5>
						<h4 class="name"><?=$pr->nome?></h4>
						<?php /* 
						if ($pr->preco_anterior!=null) {//caso haja algum preco anterior ?>
							<h3 class="last_price">R$ <?=$pr->preco_anterior?></h3>
						<?php } ?>*/ ?>
						<h3 class="price">R$ <?=$pr->preco?></h3>
						</div>
		    		<div class="blur"></div>
		    	</div>
		    	<?php
		    	}
		    	
			}else{
		    		?><h1>Sem registros</h1>
		    	<?php
		    }?>

			
	</div>
</body>
</html>
