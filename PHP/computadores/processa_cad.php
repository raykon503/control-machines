<?php
    include_once("../conexao.php");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

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
	
	$result_cursos = "INSERT INTO computadores (nome, patrimonio, marca, modelo, office, usuario, local, departamento, Date) VALUES ('$nome', '$patrimonio', '$marca', '$modelo', '$office', '$usuario', '$local', '$departamento', '$dateP')";
    $resultado_cursos = mysqli_query($conn, $result_cursos);
    
    if(mysqli_affected_rows($conn) != 0){
        echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:8080/layout-listar-registros-bootstrap4/index.html'>
				<script type=\"text/javascript\">
					alert(\"Computador Cadastrado com Sucesso.\");
				</script>
			";
    }else{
        echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost:8080/layout-listar-registros-bootstrap4/index.html'>
				<script type=\"text/javascript\">
					alert(\"Computador não foi cadastrado com Sucesso.\");
				</script>
			";
    }

    mysqli_close($conn);