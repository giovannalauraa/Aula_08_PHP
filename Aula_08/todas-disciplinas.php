<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas Disciplinas</title>
</head>
<body>

  <?php
     require_once "Disciplina.class.php";
     $objetoDisciplina = new Disciplina();
     $disciplinas = $objetoDisciplina->buscarTodasDiciplinas();

     foreach($disciplinas AS $dc){
        echo $dc["nome"]. "<br />";
        echo $dc["cargaHoraria"]. "<br />";
        echo $dc["ementa"]. "<br />";
        echo "<br>";
     }

     //var_dump($disciplinas); -> confirmar o funcionamento
    ?>
    
</body>
</html>