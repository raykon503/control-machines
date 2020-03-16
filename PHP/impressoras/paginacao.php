<?php

    include_once "../conexao.php";
    include_once "./listar_impressora.php"; 

    //Paginação - Somar a quantidade de usuários
    $result_pg = "SELECT COUNT(id) AS num_result FROM impressoras";
    $resultado_pg = mysqli_query($conn, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);

    //Quantidade de pagina
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    //Limitar os link antes depois
    $max_links = 1;
	?>
    <nav id ="navegation">
		<ul class="pagination">
			<li class="page-item">
				<?php echo "<a href='#' style='text-decoration:none' onclick='listar_impressora(1, $qnt_result_pg)'><span class='page-link'>Primeira</span></a>"?>
			</li>
	<?php
	for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
		if($pag_ant >= 1){
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_impressora($pag_ant, $qnt_result_pg)'>$pag_ant </a></li>";
		}
	}
	?>
			<li class="page-item active">
				<span class="page-link">
	<?php
	echo "$pagina";
	?>
				</span>
			</li>

	<?php
	for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
		if($pag_dep <= $quantidade_pg){
			echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_impressora($pag_dep, $qnt_result_pg)'>$pag_dep</a></li>";
		}
	}
	?>
			<li class="page-item">
				<?php echo "<a href='#' style='text-decoration:none' onclick='listar_impressora($quantidade_pg, $qnt_result_pg)'><span class='page-link'>Última</span></a>"?>
			</li>
		</ul>
	</nav>