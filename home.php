
<div class = "container">
<form action="salvar-cadastro.php?acao=cadastro" method="POST" >
    <input type="hidden" name = "acao" value="cadastro">
    <div class="mb-5">
        <label>Nome - Motorista</label>
        <input type="text" name= "nome" class="form-control">
    </div>

    <div class="mb-5" >
        <label>modelo do carro e sua placa </label>
        <input type="text" name = "modelocarro" class="form-control">
    </div>

    <div class="mb-5" >
        <label>Local de Origem </label>
        <input type="text" name = "localdeorigem" class="form-control">
    </div>

    <div class="mb-5" >
        <label>Seu destino </label>
        <input type="text" name = "localdest" class="form-control">
    </div>

    <div class="mb-5" >
        <label> KM percorrido </label>
        <input type="text" name = "klp" class="form-control">
    </div>

    <div class="mb-5" >
        <label> Litros de combustivel gastos </label>
        <input type="text" name = "litrogasto" class="form-control">
    </div>

    <div class="mb-5" >
        <label> valor do combustivel Atual </label>
        <input type="text" name = "valorcomb" class="form-control">
    </div>



</form>
</div>