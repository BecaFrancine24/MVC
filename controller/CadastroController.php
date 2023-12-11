<?php
require_once("../model/cadastroMedicamento.php");
class cadastroController{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Cadastro();
        $this->incluir();
    }

    private function incluir(){
        if(isset($_POST['nome'], $_POST['laboratorio'], $_POST['quantidade'], $_POST['precoCompra'], $_POST['precoVenda'], $_POST['data'])){
            $this->cadastro->setNome($_POST['nome']);
            $this->cadastro->setLaboratorio($_POST['laboratorio']);
            $this->cadastro->setQuantidade($_POST['quantidade']);
            $this->cadastro->setPrecoCompra($_POST['precoCompra']);
            $this->cadastro->setPrecoVenda($_POST['precoVenda']);
            $this->cadastro->setData(date('Y-m-d', strtotime($_POST['data'])));
            $result = $this->cadastro->incluir();
    
            if($result >= 1){
                echo "<script>alert('Registro incluído com sucesso!');document.location='../view/cadastroMedicamentos.php'</script>";
            }else{
                echo "<script>alert('Erro ao gravar registro!, medicamento encontra-se no sistema.');history.back()</script>";
            }
        } else {
            echo "<script>alert('Campos obrigatórios não preenchidos!');history.back()</script>";
        }
    }
}
new cadastroController();