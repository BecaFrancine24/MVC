<?php

require_once("../config.php");
class Banco{

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }

    public function setMedicamento($nome,$laboratorio,$quantidade,$precoCompra,$precoVenda,$data){
        $stmt = $this->mysqli->prepare("INSERT INTO medicamentos (`nome`, `laboratorio`, `quantidade`, `precoCompra`, `precoVenda`, `data`) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss",$nome,$laboratorio,$quantidade,$precoCompra,$precoVenda,$data);
         if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }

    public function getMedicamento(){
        $result = $this->mysqli->query("SELECT * FROM medicamentos");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;

    }

    public function deleteMedicamento($id){
        if($this->mysqli->query("DELETE FROM `medicamentos` WHERE `nome` = '".$id."';")== TRUE){
            return true;
        }else{
            return false;
        }

    }
    public function pesquisaMedicamento($id){
        $result = $this->mysqli->query("SELECT * FROM medicamentos WHERE nome='$id'");
        return $result->fetch_array(MYSQLI_ASSOC);

    }
    public function updateMedicamento($nome,$laboratorio,$quantidade,$precoCompra,$precoVenda,$flag,$data,$id){
        $stmt = $this->mysqli->prepare("UPDATE `medicamentos` SET `nome` = ?, `laboratorio`=?, `quantidade`=?, `precoCompra`=?, `precoVenda`=?, `flag`=?,`data` = ? WHERE `nome` = ?");
        $stmt->bind_param("sssssss",$nome,$laboratorio,$quantidade,$precoCompra,$precoVenda,$flag,$data,$id);
        if($stmt->execute()==TRUE){
            return true;
        }else{
            return false;
        }
    }
}
?>
