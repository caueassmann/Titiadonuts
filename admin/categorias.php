
 <?php
include("includes/header.php");
require_once("../src/moduloCategorias.php");
?>

<!DOCTYPE html>
<html lang="en">
<style>
    #link{
      background-color: #6fc7e3;
      border-radius: 8px;
      color: #fff;
      cursor: pointer;
      margin: 10px;
      padding: 6px 20px;
      float: right;
  }
</style>

<body>
    <div class="wrapper">
        <?php include("includes/sidebar.php") ?>
        <div class="main-panel">


            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-plain table-plain-bg">
                                <div class="card-header ">
                                    <h4 class="card-title">Categorias</h4>
                                    <!--<p class="card-category">Here is a subtitle for this table</p>-->
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>ID</th>
                                            <th>Nome</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if ($categorias = Categoria::List_categorias()) {
                                                foreach ($categorias as $cat) { ?>
                                                    <tr>
                                                        <td><?=$cat->id?></td>
                                                        <td><?=$cat->nome?></td>
                                                        <td><!--remover-->
                                                            <a href="form/excluirRegistros.php?varname=<?=$cat->id?>&del=cat" style="margin-right: 8px"><i class="nc-icon nc-simple-remove"></i></a>
                                                        </td>
                                                    </tr>
                                        <?php   }
                                            } ?>
                                        </tbody>
                                    </table>
                                    <a href="editar-categoria.php" id="link">Adicionar Categoria</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <?php include_once("includes/fotter.php") ?>