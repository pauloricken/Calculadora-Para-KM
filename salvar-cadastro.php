<?php

   include_once("conexao.php");

   $conn = $GLOBALS["conn"];
   switch ($_REQUEST["acao"]){
    case 'cadastro':
       $nome = $_POST["nome"];
       $localdeorigem = $_POST["localdeorigem"];
       $modelocarro = $_POST["modelocarro"];
       $localdest = $_POST["localdest"];
       $klp = $_POST["klp"];
       $litrogasto = $_POST["litrogasto"];
       $valorcomb = $_POST["valorcomb"];

       $autonomia = $_POST['klp']/$_POST['litrogasto'];

       $valorgasto = $_POST['valorcomb']/$autonomia;

	   $total = $valorgasto * $_POST['klp'];

        $sql = "INSERT INTO cadastro (nome,modelocarro,localdeorigem,localdest,klp,litrogasto,valorcomb,autonomia,valorgasto,total) values ('{$nome}', '{$modelocarro}','{$localdeorigem}', '{$localdest}','{$klp}','{$litrogasto}', '{$valorcomb}','{$autonomia}','{$valorgasto}','{$total}')";
		;

        $res = $conn->query($sql);

        if ($res==true) {
           print "<script>alert('cadastrado com sucesso');</script>";
           print "<script>location.href='?page=listar';</script>";
        }else{

                print "<script>alert('Não foi possivel cadastrar');</script>";
                print "<script>location.href='?page=listar';</script>";

        }


   }

   ?>