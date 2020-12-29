
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
           <?php include_once("../includes/navbar.php") ?>


            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-plain table-plain-bg">
                                <div class="card-header ">
                                    <h4 class="card-title">Donuts</h4>
                                    <!--<p class="card-category">Here is a subtitle for this table</p>-->
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <th>ID</th>
                                            <th>Produto</th>
                                            <th>Preço</th>
                                            <th>Vendas</th>
                                            <th>Categoria</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if ($donuts = Donut::List_donuts()) {
                                                foreach ($donuts as $donut) { ?>
                                                    <tr>
                                                        <td><?=$donut->id?></td>
                                                        <td><?=$donut->nome?></td>
                                                        <td>R$ <?=number_format($donut->preco, 2, ',',".")?></td>
                                                        <td>0</td>
                                                        <td><?=$donut->categoria?></td>
                                                        <td><!--editar-->
                                                             <a href="editar-produto.php?varname=<?=$donut->id?>" style="margin-right: 8px"><i class="nc-icon nc-ruler-pencil"></i></a>
                                                            <!--remover-->
                                                            <a href=""><i class="nc-icon nc-simple-remove"></i></a>
                                                        </td>
                                                    </tr>
                                        <?php   }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <?php include_once("../includes/fotter.php") ?>