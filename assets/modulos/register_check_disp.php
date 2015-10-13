<?php 
	require_once 'mconfig.php';	
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