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
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	  <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #F05879;">
    	<div class="container-fluid">
	  		<a href="#" class="navbar-brand offset-1 py-0">
	  			<img src="donut_logo.jpeg" height="80">
	  			<span>TITIA DONUTS</span>
	  		</a>
	  		<button class="navbar-toggler" data-toggle="collapse"
	  		data-target="#nav_inicial">
	  			<span class="navbar-toggler-icon"></span>
	  		</button>
		  <div class="first_nav collapse navbar-collapse " id="nav_inicial">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item">
		        <a class="nav-link rounded-pill ml-1 mt-1 p-1 md-p-0"  style="display: inline;" href="#centro">Categorias</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link rounded-pill ml-1 mt-1 p-1 md-p-0" style="display: inline;" href="#rodape">Cadastro</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link rounded-pill mt-1 ml-1 p-1 md-p-0" style="display: inline" href="#fotos">Login</a>
		      </li>
		    </ul>
		  </div>
	  </div>
	</nav>
	<div class="top"><!--abre top-->
		<h1 id= "title">Titia Donuts</h1>
		<a href="adiciona_produto.php" class="adicionar_produto">Adicionar Produto</a><!-- link para adicionar produto-->
		</div><!--fecha top-->
	<div class="container"><!--abre container -->
			<?php
			$images = scandir("src/imagens");
			if ($produto = Donut::List_donuts()) {
				//funcao para listagem dos produtos
				?><div class="row"><?php
				foreach ($produto as $pr) {//percorrer todos os produtos?>
				<div class="col-sm-3"><!--area do produto-->
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
	</div>
</body>
</html>
