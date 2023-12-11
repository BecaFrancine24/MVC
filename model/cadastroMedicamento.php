<?php
require_once("bancoDeDados.php");

class Cadastro extends Banco {

    private $nome;
    private $laboratorio;
    private $quantidade;
    private $precoCompra;
    private $precoVenda;
    private $flag;
    private $data;

    
    public function setNome($string){
        $this->nome = $string;
    }
    public function setLaboratorio($string){
        $this->laboratorio = $string;
    }
    public function setQuantidade($string){
        $this->quantidade = $string;
    }
    public function setPrecoCompra($string){
        $this->precoCompra = $string;
    }
    public function setPrecoVenda($string){
        $this->precoVenda = $string;
    }
    public function setFlag($string){
        $this->flag = $string;
    }
    public function setData($string){
        $this->data = $string;
    }
    
    public function getNome(){
        return $this->nome;
    }
    public function getLaboratorior(){
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
    public function getFlag(){
        return $this->flag;
    }
    public function getData(){
        return $this->data;
    }


    public function incluir(){
        return $this->setMedicamento($this->getNome(),$this->getLaboratorior(),$this->getQuantidade(),$this->getPrecoCompra(),$this->getPrecoVenda(),$this->getData());
    }
}
?>
