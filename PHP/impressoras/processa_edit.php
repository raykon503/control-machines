<?php 
    include_once("../conexao.php");
    
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $patrimonio = mysqli_real_escape_string($conn, $_POST['patrimonio']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $marca = mysqli_real_escape_string($conn, $_POST['marca']);
    $modelo = mysqli_real_escape_string($conn, $_POST['modelo']);
    $ip = mysqli_real_escape_string($conn, $_POST['ip']);
    $nomelogico = mysqli_real_escape_string($conn, $_POST['nomelogico']);
    $local = mysqli_real_escape_string($conn, $_POST['local']);
    $departamento = mysqli_real_escape_string($conn, $_POST['departamento']);
    $date = date_create($_POST['date'] ,timezone_open("Europe/Oslo"));
    $dateP = date_format($date,"Y/m/d");

    $result_cursos = "UPDATE computadores SET patrimonio='$patrimonio', nome='$nome', marca='$marca', modelo='$modelo', ip='$ip', nomelogico='$nomelogico', local='$local', departamento='$departamento', Date='$dateP' WHERE id = '$id'";
    $resultado_cursos = mysqli_query($conn, $result_cursos);

    if(mysqli_affected_rows($conn) != 0){
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:8080/layout-listar-registros-bootstrap4/index.html'>
            <script type=\"text/javascript\">
                alert (\"Alterado com sucesso.\");
            </script>
        ";
    }else{
        echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:8080/layout-listar-registros-bootstrap4/index.html'>
            <script type=\"text/javascript\">
                alert(\"Nao foi alterado com sucesso.\");
            </script>
        ";
    }

    mysqli_close($conn);