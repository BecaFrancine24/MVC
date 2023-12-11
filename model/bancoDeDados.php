<?php

require_once("../config.php");
class Banco{

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $this->mysqli = mysqli_connect(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
        $this->mysqli->set_charset("utf8");
    }

    public function setMedicamento($nome,$laboratorio,$quantidade,$precoCompra,$precoVenda,$data){
        $stmt = $this->mysqli->prepare("INSERT INTO medicamentos (`nome`, `laboratorio`, `quantidade`, `precoCompra`, `precoVenda`, `data`) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $nome, $laboratorio, $quantidade, $precoCompra, $precoVenda, $data);
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

    public function deleteMedicamento($id) {
        
        $stmt = $this->mysqli->prepare("DELETE FROM medicamentos WHERE idmedicamentos = ?");
        
        if ($stmt === false) {
            echo "Erro na preparação da instrução: " . $this->mysqli->error;
            return false;
        }
    
        
        $stmt->bind_param("i", $id);
    
        if ($stmt->execute() == TRUE) {
            
            return true;
        } else {
            
            echo "Erro na execução da instrução: " . $stmt->error;
            return false;
        }
    }

    public function pesquisaMedicamento($id){
        $result = $this->mysqli->query("SELECT * FROM medicamentos WHERE idmedicamentos ='$id'");
        return $result->fetch_array(MYSQLI_ASSOC);

    }

    public function updateMedicamento($nome,$laboratorio,$quantidade,$precoCompra,$precoVenda,$flag,$data,$id){
        $stmt = $this->mysqli->prepare("UPDATE `medicamentos` SET `nome` = ?, `laboratorio`=?, `quantidade`=?, `precoCompra`=?, `precoVenda`=?, `flag`=?,`data` = ? WHERE `idmedicamentos` = ?");
        $stmt->bind_param("ssssssss",$nome,$laboratorio,$quantidade,$precoCompra,$precoVenda,$flag,$data,$id);
        if($stmt->execute()==TRUE){
            return true;
        }else{
            return false;
        }
    }
}
?>
