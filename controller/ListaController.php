<?php
require_once("../model/bancoDeDados.php");
class listarController{

    private $lista;

    public function __construct(){
        $this->lista = new Banco();
        $this->criarTabela();

    }

    private function criarTabela(){
        $row = $this->lista->getMedicamento();
        foreach ($row as $value){
            echo "<tr>";
            echo "<th>".$value['nome'] ."</th>";
            echo "<td>".$value['laboratorio'] ."</td>";
            echo "<td>".$value['quantidade'] ."</td>";
            echo "<td> R$".$value['precoCompra'] ."</td>";
            echo "<td> R$".$value['precoVenda'] ."</td>";
            echo "<td>".$value['data'] ."</td>";
            echo "<td>".$value['flag'] = ($value['flag'] == "0") ? "Desativado":"Ativado" ."</td>";
            echo "<td><a class='btn btn-warning' href='editaMedicamento.php?id=".$value['idmedicamentos']."'>Editar</a><a class='btn btn-danger' href='../controller/DeletarController.php?id=".$value['idmedicamentos']."'>Excluir</a></td>";
            echo "</tr>";
        }
    }
}

