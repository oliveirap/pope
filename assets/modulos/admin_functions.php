<?php 
	function getUsers($tb, $tipo, $where = null){
		$tipo = Escapar($tipo);
		$where = (!empty($where)) ? " AND ".$where : null;
		var_dump($where);
		$tb = PREFIX."_".$tb;
		$query = "SELECT id, nome, email FROM $tb WHERE tipo = $tipo AND status = 1$where";
		var_dump($query);
		$conn = Conectar();
		$retorno = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));
		Fechar($conn);
		return $retorno;
	}

	function deleteUsers($tb, $id){
		$conn = Conectar();
		$tb = PREFIX."_".$tb;
		$query = "DELETE FROM $tb WHERE id = $id";
		$retorno = mysqli_query($conn, $query) or die("Error: " . mysqli_error($conn));
		Fechar($conn);
		if(mysqli_affected_rows($retorno) > 0){
			return "Não há usuários com esse ID";
		}
		else 
			return "Usuário de id $id deletado.";
	}
?>