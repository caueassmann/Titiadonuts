
 <?php
include_once("../includes/header.php");
require_once("../../src/moduloDonuts.php");
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <div class="wrapper">
        <?php include_once("../includes/sidebar.php") ?>
        <div class="main-panel">
             <?php include_once("../includes/navbar.php"); 
              $id_donut = $_GET["varname"];
              $donut = Donut::ViewDonuts($id_donut);?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Editar Donut</h4>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-7 ml-2 px-1">
                                                <div class="form-group">
                                                    <label>Nome</label>
                                                    <input type="text" class="form-control" placeholder="Username" value="<?=$donut->__get("nome")?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Preço</label>
                                                    <input type="float" class="form-control" placeholder="Preço" value="<?=number_format($donut->__get("preco"), 2, ',','.')?>">
                                                </div>
                                            </div>
                                        </div>
                                         <label for="formFileSm" class="form-label mt-2">Alterar Imagem:</label>
                                        <input id="imgChooser"class="form-control form-control-sm col-6 mb-2" id="formFileSm" type="file"/>
                                        <div class="row">
                                            <?php
                                                $images = scandir("../../src/imagens");
                                                $imagem ="default.png"; //caso nao seja encontrada a imagem
                                                foreach($images as $img){
                                                    if(!in_array($img, array(".", "..")) && $donut->foto ==$img){
                                                        $imagem = $img;//captura da imagem respectiva do produto na pasta src/imagens
                                                    }
                                                }?>
                                            <img  id="preview" class="img-fluid mx-auto d-block " style="border: 9px solid #6fc7e3; max-height: 300px; max-width: 300px;"src="../../src/imagens/<?=$imagem?>" alt="...">
                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right mt-2 ">Update Profile</button>
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
            <?php include_once("../includes/fotter.php") ?>