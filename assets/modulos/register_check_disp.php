<?php 
	require_once 'mconfig.php';	
	function ticketDisp($ticket, $tb){
		$ticket = Escapar($ticket);
		$conn = Conectar();
		$tb = PREFIX."_".$tb;
		$query = "SELECT cod, lim, reg FROM $tb WHERE cod = '$ticket'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if(mysqli_num_rows($result) > 0){
			$data = mysqli_fetch_assoc($result);
			if($data['reg'] < $data['lim'])
				return true;
			else
				return false;
		}
		else
			return false;
	}
	if(isset($_POST['mail'])){
		$mail = $_POST['mail'];
		$mail = Escapar($mail);
		$tb = "users";
		if(!emailExiste($mail, $tb))
			echo json_encode(array("disponivel" => true));
		else
			echo json_encode(array("disponivel" => false));
	}
	if(isset($_POST['usuario'])){
		$user = $_POST['usuario'];
		$user = Escapar($user);
		$tb = "users";
		if(!loginExiste($user, $tb))
			echo json_encode(array("disponivel" => true));
		else
			echo json_encode(array("disponivel" => false));	
	}
	if(isset($_POST['matricula'])){
		$matricula = $_POST['matricula'];
		$matricula = Escapar($matricula);
		$tb = "users";
		if(!matriculaExiste($matricula, $tb	))
			echo json_encode(array("disponivel" => true));
		else
			echo json_encode(array("disponivel" => false));
	}
	if(isset($_POST['ticket'])){
		$ticket = $_POST['ticket'];
		$tb = "tickets";
		if(ticketDisp($ticket, $tb))
			echo json_encode(array("disponivel" => true));
		else
			echo json_encode(array("disponivel" => false));
	}
 ?>