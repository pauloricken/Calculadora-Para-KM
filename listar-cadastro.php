 <!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<h1>listar cadastros</h1>

<?php

      include ("conexao.php");


    $conn = $GLOBALS["conn"];
    $sql = "SELECT * FROM cadastro";
    $res = $conn -> query($sql);
    $qtd = $res -> rowCount();

    if($qtd > 0){
		?>
        <table class= 'table table - houver
        table-striped table-bordered'>

            <tr>
            <th>#</th>
            <th>Nome</th>
            <th>modelo do carro</th>
            <th>local de origem </th>
            <th>local de destino </th>
            <th> KMp </th>
            <th> litro gasto </th>
            <th> valor atual gasolina</th>
            <th> autonomia </th>
            <th> valor gasto por km</th>
            <th> valor total gasto</th>
            </tr>

			<?php
        while ($row = $res->fetch()) {
			?>
            <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['nome'] ?></td>
            <td><?=$row['modelocarro'] ?></td>
            <td><?=$row['localdeorigem'] ?></td>
            <td><?=$row['localdest'] ?></td>
            <td><?=$row['klp'] ?></td>
            <td><?=$row['litrogasto'] ?></td>
            <td><?=$row['valorcomb'] ?></td>

            <td><?=$row['autonomia'] ?></td>
            <td><?=$row['litrogasto'] ?></td>
            <td><?=$row['total'] ?></td>
            </tr>
			<?php
        }
        print "</table>";
    }else{
        print "<p class ='alert alert-danger'>não encotrou resultados ;(</p>";
    }


?>
<br>
<a href="index.php" class="btn btn-primary">voltar para pagina principal</a>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" id="novoCarro" >
  Cadastrar Novo Carro
</button>

<!-- Modal -->
<div class="modal fade" id="ModalNovo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novo Carro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" id="salvar" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>

</body>
<script>
	$(document).ready(function () {

		// Ao Clicar em novo carro, pegamos o html do form, preenchemos o body do modal com ele, e mostramos o modal
		$("#novoCarro").on('click', function (event) {
			event.preventDefault();
			event.stopPropagation();

		// Fazemos o AJAX pegando o form.
			$.ajax({
				method: "GET",
				contentType: 'application/json; charset=utf-8',
				url: 'http://localhost/CacKM/home.php',
			}).done(function (msg, status, xhr) {
				// Preenchemos o modal com o form.
				$("#ModalNovo .modal-body").html(msg);
				// E mostramos o modal.
				$("#ModalNovo").modal("show");
			});
		});

		// Ao clicar no botao de salvar, empacotamos o conteúdo do form e despachamos pra action.
		$("#salvar").on('click', function (e) {

			// Impedimos a reação padrão.
			e.preventDefault();

			// Fazemos o ajax com o form serializado.
			$.ajax({
				type: "POST",
				url: 'http://localhost/CalcKM/salvar-cadastro.php',
				data: new FormData($('form')[0]),
				cache: false,
				contentType: false,
				processData: false,
				success: function (data, status, xhr) {
					alert(data);
			}
		});
		});
	});

</script>