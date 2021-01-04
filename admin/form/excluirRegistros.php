<?php
require_once("../../src/moduloDonuts.php");

if($_GET["del"]=="true"){
	$id_donut = $_GET["varname"];
	Donut::Delete($id_donut);
	$message= "Dados excluidos com sucesso";//redirecionamento
			echo "<script type='text/javascript'>
 		alert('$message');
 		window.location='http://localhost/titiadonuts/admin/examples/produtos.php?';</script>";	

}else{
	echo "permissão negada!!";
	?><<a href="http://localhost/titiadonuts/admin/examples/produtos.php">Voltar para página inicial</a><?php
}