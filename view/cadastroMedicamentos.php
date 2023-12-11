<!DOCTYPE HTML>
<html>
<?php include("head.php") ?>
    <script language="javascript" type="text/javascript">
        function formatarMoeda() {
            var elemento = document.getElementById('preco');
            var valor = preco.value;

            valor = valor + '';
            valor = parseInt(valor.replace(/[\D]+/g, ''));
            valor = valor + '';
            valor = valor.replace(/([0-9]{2})$/g, ",$1");

            if (valor.length > 6) {
                valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
            }

            elemento.value = valor;
        }

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
                alert('O preço do medicamento não pode ser igual ou infeiror a 0');
                form.preco.focus();
                return false;
            }
            formulario.submit();
        }
    </script>
    <body>
        <?php include("telaPrincipal.php") ?>
        <div class="container-fluid mt-3">
            <div class="row">
                <form method="post" action="../controller/ControllerCadastro.php" id="form" name="form"
                    onsubmit="validar(document.form); return false;" class="col-12">
                    <div class="form-row">
                        <div class="col-9">
                            <label for="">Medicamento</label>
                            <input class="form-control" type="text" id="nome" name="nome" required autofocus>
                        </div>
                        <div class="col-3">
                            <label for="">Quantidade</label>
                            <input class="form-control" type="number" id="quantidade" name="quantidade" required>
                        </div>
                        <div class="col-4">
                            <label for="">Laboratório</label>
                            <input class="form-control" type="text" id="laboratorio" name="laboratorio" required>
                        </div>
                        <div class="col-2">
                            <label for="">Data da Validade</label>
                            <input class="form-control" type="date" id="data" name="data" placeholder="Data da Validade" required>
                        </div>
                        <div class="col-3">
                            <label for="">Preço da Compra</label>
                            <input class="form-control" type="text" id="precoCompra" name="precoCompra" required>
                        </div>
                        <div class="col-3">
                            <label for="">Preço de Venda</label>
                            <input class="form-control" type="text" id="preco" name="precoVenda"  required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" id="cadastrar">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>