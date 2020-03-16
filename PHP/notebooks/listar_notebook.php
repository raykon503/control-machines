<?php
include_once "../conexao.php";

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
//calcular o inicio visualização
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

//consultar no banco de dados
$result_usuario = "SELECT * FROM notebooks ORDER BY id ASC LIMIT $inicio, $qnt_result_pg";
$resultado_usuario = mysqli_query($conn, $result_usuario);


//Verificar se encontrou resultado na tabela "usuarios"
if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
	?>
	<table>
			<?php
			while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
				?>
				<tr data-toggle="modal" data-target="#exampleModal2" data-whatever="<?php echo $row_usuario['id']; ?>" data-whatevernome="<?php echo $row_usuario['nome']; ?>" data-whateverpatrimonio="<?php echo $row_usuario['patrimonio']; ?>" data-whatevermarca="<?php echo $row_usuario['marca']; ?>" data-whatevermodelo="<?php echo $row_usuario['modelo']; ?>" data-whateveroffice="<?php echo $row_usuario['office']; ?>" data-whateverusuario="<?php echo $row_usuario['usuario']; ?>" data-whateverlocal="<?php echo $row_usuario['local']; ?>" data-whateverdepartamento="<?php echo $row_usuario['departamento']; ?>" data-whateverdata="<?php echo $row_usuario['Date']; ?>">
					<th><?php echo $row_usuario['id']; ?></th>
					<td><?php echo $row_usuario['nome']; ?></td>
                    <td><?php echo $row_usuario['patrimonio']; ?></td>
                    <td><?php echo $row_usuario['marca']; ?></td>
                    <td><?php echo $row_usuario['modelo']; ?></td>
                    <td><?php echo $row_usuario['office']; ?></td>
					<td><?php echo $row_usuario['usuario']; ?></td>
					<td><?php echo $row_usuario['local']; ?></td>
                    <td><?php echo $row_usuario['departamento']; ?></td>
					<td><?php $datte = date_create ($row_usuario['Date'],timezone_open("Europe/Oslo"));
						echo date_format($datte, "d/m/Y"); ?></td>
				</tr>
			<?php
			}
				?>
	</table>
<?php

}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
}