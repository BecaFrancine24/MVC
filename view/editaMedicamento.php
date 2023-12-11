<!DOCTYPE HTML>
    <html>
    <?php include("head.php") ?>
    <script language="javascript" type="text/javascript">
    function validar(formulario) {
        var quantidade = form.quantidade.value;
        var preco = form.preco.value;
        for (i = 0; i <= formulario.length - 2; i++) {
            if ((formulario[i].value == "")) {
                alert("Preencha o campo " + formulario[i].name);
                formulario[i].focus();
                return false;
            }
        }
        if (quantidade <= 0) {
            alert('A quantidade de medicamentos não pode ser igual ou inferior a 0');
            form.quantidade.focus();
            return false;
        }
        if (preco <= 0) {
            alert('O preço do medicamentos não pode ser igual ou infeiror a 0');
            form.preco.focus();
            return false;
        }
        formulario.submit();
    }
    </script>

    <body>
        <?php include("telaPrincipal.php") ?>
        <?php require_once("../controller/EditaController.php");?>
        <div class="container-fluid mt-3">
            <div class="row">
                <form method="post" action="../controller/EditaController.php" id="form" name="form"
                    onsubmit="validar(document.form); return false;" class="col-12">
                    <div class="form-row">
                        <div class="col-9">
                            <label for="">Medicamento</label>
                            <input class="form-control" type="text" id="nome" name="nome"
                                value="<?php echo $editar->getNome(); ?>" required autofocus>
                        </div>
                        <div class="col-3">
                            <label for="">Quantidade</label>
                            <input class="form-control" type="number" id="quantidade" name="quantidade"
                                value="<?php echo $editar->getQuantidade(); ?>" required>
                        </div>
                        <div class="col-4">
                            <label for="">Laboratório</label>
                            <input class="form-control" type="text" id="laboratorio" name="laboratorio"
                                value="<?php echo $editar->getlaboratorio(); ?>" required>
                        </div>
                        <div class="col-2">
                            <label for="">Data da Validade</label>
                            <input class="form-control" type="date" id="data" name="data"
                                value="<?php echo $editar->getData(); ?>" required>
                        </div>
                        <div class="col-3">
                            <label for="">Preço da Compra</label>
                            <input class="form-control" type="number" id="precoCompra" name="precoCompra"
                                value="<?php echo $editar->getPrecoCompra(); ?>" required>
                        </div>
                        <div class="col-3">
                            <label for="">Preço de Venda</label>
                            <input class="form-control" type="number" id="precoVenda" name="precoVenda"
                                value="<?php echo $editar->getPrecoVenda(); ?>" required>
                        </div>
                        <select name="flag">
                            <?php $c = $editar->getFlag();?>
                            <option value="<?php echo $editar->getFlag();?>">
                                <?php echo  ($editar->getFlag()== 0)? "Desativado" :"Ativado" ?></option>
                            <option value="<?php echo ($c == 0)? "1" : "0" ?>">
                                <?php echo ($editar->getFlag()!= 0)? "Desativado" :"Ativado" ?></option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $editar->getNome();?>">
                        <button type="submit" class="btn btn-success" id="editar" name="submit"
                            value="editar">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
