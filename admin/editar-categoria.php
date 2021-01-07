
 <?php
include_once("includes/header.php");
require_once("../src/moduloDonuts.php");
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <div class="wrapper">
        <?php include_once("includes/sidebar.php") ?>
        <div class="main-panel">
             <?php include_once("includes/navbar.php"); 
              ?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Editar Categoria</h4>
                                </div>
                                <div class="card-body">
                                    <form action="form/processa.php?varname=cat" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-7 ml-2 px-1">
                                                <div class="form-group">
                                                    <label>Nome</label>
                                                    <input type="text" name="nome" class="form-control" placeholder="Username" value="">
                                                </div>
                                            </div>
                                        <button type="submit" name="action" value="adicionar" class="btn btn-info btn-fill pull-right mt-2 " style="text-transform: capitalize;">Adicionar Categoria</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include_once("includes/fotter.php") ?>