<?php
require_once("../../src/moduloDonuts.php");
if(isset($_POST) && $_POST["action"] == "editar" || $_POST["action"] == "adicionar"){
	$id_donut = $_GET["varname"];
	if ($_POST["nome"]=="" || $_POST["preco"]=="" /*|| $_POST["categoria"]==""*/) {//verifica se foi deixado algum valor vazio
	 	$message= "Alguns dados não foram inseridos, por favor, verifique e tente novamente";
	 	echo "<script type='text/javascript'>
	 		alert('$message');
	 		window.location='http://localhost/titiadonuts/admin/examples/edita_produto.php?varname=".$id_donut."';</script>";
	} else{
		
		$nova_img= ($_FILES['file_img']["name"]!= null) ? $_FILES['file_img']["name"] :$_POST["imagem"] ;
		if ($nova_img == $_FILES['file_img']["name"] ) {
			$nova_img_temp = $_FILES['file_img']["tmp_name"];
 			move_uploaded_file( $nova_img_temp, '../../src/imagens/'.$nova_img);
 			echo 'https://localhost/titiadonuts/src/imagens/'.$nova_img;
		}
		$preco = $_POST["preco"];
		$donut = new Donut(null, "tradicional",$_POST["nome"],$preco,$nova_img);
		($_POST["action"]=="editar") ? $donut->Edit($id_donut) : $donut->Insert($id_donut);
		
		$message= "Dados alterados com sucesso";//redirecionamento
			echo "<script type='text/javascript'>
 		alert('$message');
 		window.location='http://localhost/titiadonuts/admin/examples/produtos.php?';</script>";
	}
} else{
	echo "permissão negada!!";
	?><a href="http://localhost/titiadonuts/admin/examples/produtos.php">Voltar para página inicial</a><?php
}