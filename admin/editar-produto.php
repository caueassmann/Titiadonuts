
 <?php
include_once("includes/header.php");
require_once("../src/moduloDonuts.php");
require_once("../src/moduloCategorias.php");
?>
<!DOCTYPE html>
<style>
    /* Esconde o input */
input[type='file'] {
  display: none
}

/* Aparência que terá o seletor de arquivo */
#FileLabel {
  background-color: #6fc7e3;
  border-radius: 8px;
  color: #fff;
  cursor: pointer;
  margin: 10px;
  padding: 6px 20px
}
#FileLabel:hover{
    background-color: #9ddef2;
}
</style>
<html lang="en">
<body>
    <div class="wrapper">
        <?php include_once("includes/sidebar.php") ?>
        <div class="main-panel">
             <?php include_once("includes/navbar.php"); 
              $id_donut = $_GET["varname"];
              $nome = null;
              $imagem = "default.png";
              $preco = null;
              $cat = null;

              if ($id_donut != "s") {
                $donut = Donut::ViewDonuts($id_donut);
                $nome = $donut->__get("nome");
                $preco = $donut->__get("preco");
                $imagem = $donut->__get("foto");
                $cat = $donut->__get("categoria");

                $images = scandir("../src/imagens");
                foreach($images as $img){
                    if(!in_array($img, array(".", "..")) && $donut->foto ==$img){
                        $imagem = $img;//captura da imagem respectiva do produto na pasta src/imagens
                    }
                } 
              }


            $acao = ($id_donut=="s") ? "adicionar": "editar"; 

              
              ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Editar Donut</h4>
                                </div>
                                <div class="card-body">
                                    <form action="form/processa.php?varname=<?=$id_donut?>" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-7 ml-2 px-1">
                                                <div class="form-group">
                                                    <label>Nome</label>
                                                    <input type="text" name="nome" class="form-control" placeholder="Username" value="<?=$nome?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="preco">Preço</label>
                                                    <input name="preco" id=preco" type="float" class="form-control" placeholder="Preço" value="<?=$preco?>">
                                                </div>
                                            </div>
                                            <div class="row">
                                              <div class="col-12 ml-2">
                                                 <label for="categoria">Categorias</label>
                                                 <select id="categoria" name="categoria">
                                                   <?php
                                                   $lista = Categoria::List_categorias();
                                                   foreach ($lista as $l) {
                                                      $validate = ($l->__get("nome") == $cat) ? "selected" : "";
                                                      echo '<option  value="'.$l->__get("nome").'" '.$validate.'>'.$l->__get("nome").'</option>';
                                                    }
                                                    ?>
                                                 </select>
                                              </div>
                                            </div>
                                        </div>
                                         <label for="imgChooser" class="form-label mt-2" id="FileLabel">Alterar Imagem:</label>
                                        <input id="imgChooser" type="file" name="file_img"/>
                                        <div class="row">
                                            <img  id="preview" class="img-fluid mx-auto d-block " style="border: 9px solid #6fc7e3; max-height: 300px; max-width: 300px;"src="../src/imagens/<?=$imagem?>" alt="<?=$imagem?>">
                                        </div>
                                        <input type="hidden" name="imagem" value="<?=$donut->foto?>">
                                        <button type="submit" name="action" value="<?=$acao?>"class="btn btn-info btn-fill pull-right mt-2 " style="text-transform: capitalize;"><?=$acao?> Donut</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
               function readImage() {
                    if (this.files && this.files[0]) {
                        var file = new FileReader();
                        file.onload = function(e) {
                            document.getElementById("preview").src = e.target.result;
                        };       
                        file.readAsDataURL(this.files[0]);
                    }
                }

                document.getElementById("imgChooser").addEventListener("change", readImage, false);

            </script>
            <?php include_once("includes/fotter.php") ?>