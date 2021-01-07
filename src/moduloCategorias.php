<?php
require_once(__DIR__.'/../db/MySQL.class.php');
class Categoria{
    private $id;
    private $nome;
    public function __construct($id = null, $nome = null){//atributos
        $this->id = $id;
        $this->nome = $nome;
    }

    public function __set($atributo,$valor){//set
        $this->$atributo = $valor;
    }
    public function __get($atributo){//get
        return $this->$atributo;
    }

    public function Insert(){//funcao de insercao
        $conexao = new MySQL();//conexao com o banco
        $sql = "INSERT INTO categorias(nome) 
                VALUES('".$this->nome."');";     //string para o banco
         $conexao->executa($sql);//executa no banco
    }

    public static function List_categorias(){// funcao de listagem
        $conexao = new MySQL();//conexao com o banco
        $sql = "SELECT * FROM categorias ;";//string de todos os donuts
        $dados = $conexao->consulta($sql);//executa no banco
        if(!empty($dados)){//se nao está vazio
            $donuts=array();
            foreach($dados as $dado){//percorre todo o array retornado do banco por linha
                $donut= new Categoria();//cria o objeto e captura todos os itens de uma linha
                $donut->id = $dado['id_categoria']; 
                $donut->nome = $dado['nome'];
                $donuts[]=$donut;//adiciona a um array de objetos
            }
            return $donuts;
        }else{
            return "false";
        }
    }
    public function Delete($idcat){//funcao de delecao
        $conexao = new MySQL(); 
        $sql = "DELETE FROM categorias WHERE id_categoria=".$idcat.";";
        $conexao->executa($sql);
    }
}
