<?php
require_once(__DIR__.'/../db/MySQL.class.php');
class Donut{
    private $id;
    private $categoria;
    private $nome;
    private $preco;
    private $foto;

    public function __construct($id = null, $categoria = null, $nome = null, $preco = null, $foto = null){//atributos
        $this->id = $id;
        $this->categoria = $categoria;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->foto = $foto; 
    }

    public function __set($atributo,$valor){//set
        $this->$atributo = $valor;
    }
    public function __get($atributo){//get
        return $this->$atributo;
    }

    public function Insert(){//funcao de insercao
        $conexao = new MySQL();//conexao com o banco
        $sql = "INSERT INTO donut(categoria, nome, preco,foto) 
                VALUES('".$this->categoria."', '".$this->nome."', ".$this->preco.", '".$this->foto."');";     //string para o banco
         $conexao->executa($sql);//executa no banco
    }

    public function Edit($iddonut){//funcao de alteracao
        $conexao = new MySQL();//conexao com o banco
        
        $sql = "UPDATE donut SET categoria = '".$this->categoria."', nome = '".$this->nome."', preco = ".$this->preco.", preco_anterior = ".$this->preco_anterior.", foto = '".$this->foto."'
                WHERE id_donut = '".$iddonut."';";//string para o banco
        $conexao->executa($sql);//executa no banco
    }

    public static function ViewDonuts($iddonut){//funcao de view
        $conexao = new MySQL();//conexao com o banco
        $sql = "SELECT * FROM donut WHERE id = ".$iddonut.";"; //string para o banco
        $dados = $conexao->consulta($sql);// executa no banco
        if ($dados) {
            $donut = new donut();//criacao de um objeto com base no retorno do banco
            $donut->id = $dados[0]['id_donut']; 
            $donut->categoria = $dados[0]['categoria'];
            $donut->nome = $dados[0]['nome'];
            $donut->preco = $dados[0]['preco'];
            $donut->preco_anterior = $dados[0]['preco_anterior'];
            $donut->foto = $dados[0]['foto'];
            return $donut;
        }
        return $donut = "Sem registros";
        
    }
    public static function List_donuts(){// funcao de listagem
        $conexao = new MySQL();//conexao com o banco
        $sql = "SELECT * FROM donut ;";//string de todos os donuts
        $dados = $conexao->consulta($sql);//executa no banco
        if(!empty($dados)){//se nao está vazio
            $donuts=array();
            foreach($dados as $dado){//percorre todo o array retornado do banco por linha
                $donut= new donut();//cria o objeto e captura todos os itens de uma linha
                $donut->id = $dado['id']; 
                $donut->categoria= $dado['categoria'];
                $donut->nome = $dado['nome'];
                $donut->preco = $dado['preco'];
                //$donut->preco_anterior =$dado['preco_anterior'];
                $donut->foto = $dado['foto'];
                $donuts[]=$donut;//adiciona a um array de objetos
            }
            return $donuts;
        }else{
            return "false";
        }
    }
    public static function List_cat(){//listagem das categorias
        $conexao = new MySQL();//conexao com o banco
        $sql = "SELECT DISTINCT categoria FROM donut;";//seleciona apenas categorias distintas
        $dados = $conexao->consulta($sql);
        if(!empty($dados)){
            $donuts=array();
            foreach($dados as $dado){ 
                $donut= $dado['categoria'];
                $donuts[]=$donut;
            }
            return $donuts;
        }else{
            return false;
        }
    }
    public function Delete($iddonut){//funcao de delecao
        $conexao = new MySQL(); 
        $sql = "DELETE FROM donut WHERE id=".$iddonut.";";
        $conexao->executa($sql);
    }
}
