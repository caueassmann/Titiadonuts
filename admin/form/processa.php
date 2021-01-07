<?php
require_once("../../src/moduloDonuts.php");
require_once("../../src/moduloCategorias.php");
if(isset($_POST) && $_POST["action"] == "editar" || $_POST["action"] == "adicionar"){
	$id_donut = $_GET["varname"];
	if ($_POST["preco"]=="" || $_POST["categoria"]=="") {//verifica se foi deixado algum valor vazio
		if ($_POST["nome"]=="") {
			$message= "Alguns dados não foram inseridos, por favor, verifique e tente novamente";
	 	echo "<script type='text/javascript'>
	 		alert('$message');
	 		window.location='http://localhost/titiadonuts/admin/edita_produto.php?varname=".$id_donut."';</script>";
		}elseif ($_GET["varname"]=="cat") {
			$categoria = new Categoria(null, $_POST["nome"]);
			$categoria->Insert();
			$message= "Dados alterados com sucesso";//redirecionamento
			echo "<script type='text/javascript'>
	 		alert('$message');
	 		window.location='http://localhost/titiadonuts/admin/index.php';</script>";

		}
	 	
	} else{
		
		
		$nova_img= ($_FILES['file_img']["name"]!= null) ? $_FILES['file_img']["name"] :$_POST["imagem"] ;
		if ($nova_img == $_FILES['file_img']["name"] ) {
			$nova_img_temp = $_FILES['file_img']["tmp_name"];
 			move_uploaded_file( $nova_img_temp, '../../src/imagens/'.$nova_img);
 			echo 'https://localhost/titiadonuts/src/imagens/'.$nova_img;
		}
		$preco = $_POST["preco"];
		$donut = new Donut(null, $_POST["categoria"],$_POST["nome"],$preco,$nova_img);
		($_POST["action"]=="editar") ? $donut->Edit($id_donut) : $donut->Insert();
		
		$message= "Dados alterados com sucesso";//redirecionamento
			echo "<script type='text/javascript'>
 		alert('$message');
 		window.location='http://localhost/titiadonuts/admin/index.php';</script>";
	}
} else{
	echo "permissão negada!!";
	?><a href="http://localhost/titiadonuts/admin/index.php">Voltar para página inicial</a><?php
}