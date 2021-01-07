<?php
require_once("../../src/moduloDonuts.php");
require_once("../../src/moduloCategorias.php");

if($_GET["del"]=="donut" || $_GET["del"]=="cat"){
	$id_donut = $_GET["varname"];
	($_GET["del"]=="cat") ?	Categoria::Delete($id_donut) : Donut::Delete($id_donut);
	$message= "Dados excluidos com sucesso";//redirecionamento
			echo "<script type='text/javascript'>
 		alert('$message');
 		window.location='http://localhost/titiadonuts/admin/index.php';</script>";	

}else{
	echo "permissão negada!!";
	?><<a href="http://localhost/titiadonuts/admin/index.php">Voltar para página inicial</a><?php
}