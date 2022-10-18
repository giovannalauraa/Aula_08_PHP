<?php
    require_once "Conexao.class.php";

    class Disciplina{
        private $nome;
        private $cargaHoraria;
        private $ementa;

        public function exibirDados(){
            echo "<br />";
            echo "<strong> O nome da ". __CLASS__ ." é: </strong>". $this->nome;
            echo "<br />";
            echo "<strong> A carga Horaria da ". __CLASS__ ." é: </strong>". $this->cargaHoraria;
            echo "<br />";
            echo "<strong> A ementa da ".__CLASS__." é: </strong>". $this->ementa;
            echo "<br />";

        }

        public function __construct($nome="", $cargaHoraria="", $ementa=""){
            $this->nome = $nome;
            $this->cargaHoraria = $cargaHoraria;
            $this->ementa = $ementa;
            echo "<br /><i> Classe criada...</i><br />";
        }

        public function setNome($nome){
            $this->nome = $nome;
        }
        
        public function getNome(){
            return $this->nome;
        }

        public function inserirDisciplina()
        {
            $cn = new Conexao();
            $conexaoBanco = $cn->getInstance();

            $stmt = $conexaoBanco->prepare("INSERT INTO disciplina VALUES (:nome, :cargaHoraria, :ementa)");
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':cargaHoraria', $this->cargaHoraria);
            $stmt->bindParam(':ementa', $this->ementa);

            $resultado = $stmt->execute();

            if(!$resultado){
                echo "<br /> Erro, não foi possível inserir a disciplina";
                exit;
            }
            echo "<br /> <strong><i>Disciplina inserida com sucesso!</i></strong>";
        }
        
        public function buscarTodasDiciplinas(){
            $cn = new Conexao(); //Conectando com o Banco, toda vez é necessário
            $conexaoBanco = $cn->getInstance();

            $stmt = $conexaoBanco->prepare("SELECT * FROM disciplina");

            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;

            //fetchALL = Pega todos os dados
        }
    }

    //CRUD 
    //C -> CREATE
    //R -> SELECT
    //U -> UPDATE
    //D -> DELETE

    /*View -> form 
    /Controller -> recebe.php
    /Class -> model
    */