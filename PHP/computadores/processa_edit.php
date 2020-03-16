<?php 
    include_once("../conexao.php");
    
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $patrimonio = mysqli_real_escape_string($conn, $_POST['patrimonio']);
    $marca = mysqli_real_escape_string($conn, $_POST['marca']);
    $modelo = mysqli_real_escape_string($conn, $_POST['modelo']);
    $office = mysqli_real_escape_string($conn, $_POST['office']);
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $local = mysqli_real_escape_string($conn, $_POST['local']);
    $departamento = mysqli_real_escape_string($conn, $_POST['departamento']);
    $date = date_create($_POST['date'] ,timezone_open("Europe/Oslo"));
    $dateP = date_format($date,"Y/m/d");

    $result_cursos = "UPDATE computadores SET nome='$nome', patrimonio='$patrimonio', marca='$marca', modelo='$modelo', office='$office', usuario='$usuario', local='$local', departamento='$departamento', Date='$dateP' WHERE id = '$id'";
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