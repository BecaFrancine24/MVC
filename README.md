CRUD-MVC-PHP
Crud em MVC e PHP

Objetivo:
Desenvolver um sistema CRUD simples em PHP (sem frameworks) e MySQL para a administração de medicamentos.

Detalhes:
Os medicamentos devem contar com as seguintes informações:

Nome
Laboratório
Quantidade
Preço (em reais, sendo necessário a colocação de virgula)
Flag para medicamento ativo/inativo (não afetando na listagem, somente um valor para referência)
Data de validade
Regras:
As regras abaixo devem ser seguidas ao cadastrar/editar um medicamento:

Não devem haver medicamentos com o mesmo nome
A quantidade de medicamentos e o preço, não podem ser zerados nem negativos
O Medicamento deve ter o valor inicial de inativo, podendo ser alterado posteriormente diretamente por meio da listagem (link ou Ajax) ou edição completa do medicamento
Na listagem o preço deve ser formatado no padrão brasileiro (R$ 1.050,10).
Detalhes sobre o programa:
config.php são os arquivos de configurações do sistema de livraria
diretório "view" é onde fica todas as telas do sistema
diretório "controller" é onde fica fica as funcionalidades do sistema que interragem com o banco de dados
diretório "model" é onde fica os arquivos de conexão com o banco de dados
No diretório "view" existem 3 páginas principais: cadastroMedicamento.php, editaMedicamento.php e index.php. a página head e telaPrincipal são os escopos do HTML e Menu do sistemas respectivamente.

No diretório "controller" estão os arquivos PHP que executam as funcionalidades do sistema.

No diretório "model" estão os arquivos de conexão com o Banco de Dados

O arquivo script.sql é o scrip em sql que cria o banco e a tabela.