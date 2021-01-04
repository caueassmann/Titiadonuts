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
	  <nav class="navbar navbar-expand-sm navbar-light py-2 mb-5" style="background-color: #F05879;">
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
	<div class="container"><!--abre top-->
		<h1 class="display-4 border-bottom border-danger" style="color: #A43EE6">Produtos em destaque!!</h1>
		</div><!--fecha top-->
	<div class="container mt-5 " ><!--abre container -->
			<?php
			$images = scandir("src/imagens");
			if ($produto = Donut::List_donuts()) {
				//funcao para listagem dos produtos
				?><div class="row row-cols-1  pb-3 row-cols-md-3 g-4 col-10" style="background-color: #F04167"><?php
				foreach ($produto as $pr) {//percorrer todos os produtos?>
				<div class="col"><!--area do produto-->
    				<div class="card p-2"> <!--conteudo e background-->
						<?php
						$imagem ="default.png";	//caso nao seja encontrada a imagem
						foreach($images as $img){
		    				if(!in_array($img, array(".", "..")) && $pr->foto ==$img){
				            	$imagem = $img;//captura da imagem respectiva do produto na pasta src/imagens
				        	}
				    	}?>
			    		<img class=" img-fluid img-thumbnail card-img-top product_area" src='src/imagens/<?=$imagem?>'>
			    		<div class="card-body">
							<h5 class="cat">#<?=$pr->categoria?></h5>
							<h4 class="name"><?=$pr->nome?></h4>
							<?php /* 
							if ($pr->preco_anterior!=null) {//caso haja algum preco anterior ?>
								<h3 class="last_price">R$ <?=$pr->preco_anterior?></h3>
							<?php } ?>*/ ?>
							<h3 class="price">R$ <?=number_format($pr->preco, 2, ',','.')?></h3>
						</div>
					</div>
		    	</div>
		    	<?php
		    	}
		    	
			}else{
		    		?><h1>Sem registros</h1>
		    	<?php
		    }?>

			</div>
	</div>
	<footer id = "rodape" class="dark_purple pb-1 pt-5 mt-5 col-12">
		<div class="row col-12">
			<div class="col-sm-4 offset-1 text-light">
				<h6>Email: email@gmail.com</h6>
				<h6>Telefone: (51) 994169266</h6>
				<h6>instagram: instagram</h6>
			</div>
			<div class=" col-11 col-sm-3 pt-2 pt-sm-0 offset-1 offset-sm-3 text-light">
				<h6>Endereço x, rua x, n x, bairro x, Feliz- RS</h6>
			</div>
		</div>
	</footer>



	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src='main.js'></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
