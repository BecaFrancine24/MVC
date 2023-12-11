<?php
require_once("../model/bancoDeDados.php");

class editarController {

    private $editar;
    private $nome;
    private $autor;
    private $quantidade;
    private $preco;
    private $data;
    private $flag;

    public function __construct($id){
        $this->editar = new Banco();
        $this->criarFormulario($id);
    }
    private function criarFormulario($id){
        $row = $this->editar->pesquisaMedicamento($id);
        if(!$row) {
            die('Erro no Id' . $id);
        }
        $this->nome = $row['nome'];
        $this->laboratorio = $row['laboratorio'];
        $this->quantidade = $row['quantidade'];
        $this->precoCompra = $row['precoCompra'];
        $this->precoVenda = $row['precoVenda'];
        $this->data = $row['data'];
        $this->flag = $row['flag'];
        $this->id = $id;
    }


    public function editarFormulario($nome, $laboratorio, $quantidade, $precoCompra, $precoVenda, $data, $flag, $id){
        if($this->editar->updateMedicamento($nome, $laboratorio, $quantidade, $precoCompra, $precoVenda, $flag, $data, $id) == TRUE){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/index.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }

    public function getNome(){
        return $this->nome;
    }
    public function getLaboratorio(){
        return $this->laboratorio;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }
    public function getPrecoCompra(){
        return $this->precoCompra;
    }
    public function getPrecoVenda(){
        return $this->precoVenda;
    }
    public function getData(){
        return $this->data;
    }
    public function getFlag(){
        return $this->flag;
    }

    public function getId(){
        return $this->id;
    }


}
$id = filter_input(INPUT_GET, 'id');
$editar = new editarController($id);
if(isset($_POST['submit'])){
    $editar->editarFormulario($_POST['nome'],$_POST['laboratorio'],$_POST['quantidade'],$_POST['precoCompra'],$_POST['precoVenda'],$_POST['data'],$_POST['flag'],$_POST['idMed']);
}
?>
