$(document).ready(function(){

//Variaveis para post
	var register_check_page = "http://localhost:8080/pope/assets/modulos/register_check_disp.php";
//Login
	// Válida usuário no login
	$("#input-usuario").on("blur", function(){
		if($(this).val() == ""){ 
			$(this).addClass("has-error").attr("placeholder", "Digite seu usuário");			
		}
		else{
			if($(this).hasClass("has-error"))
				$(this).removeClass("has-error");
		}
	});
	// Válida senha no login
	$("#input-senha").on("blur", function(){
		if($(this).val() == ""){ 
			$(this).addClass("has-error").attr("placeholder", "Digite sua senha");			
		}
		else{
			if($(this).hasClass("has-error"))
				$(this).removeClass("has-error");
		}
	});

	// Válida campos ao submeter form
	$("#login-toggle").on("click", function(event){
		$form_data = $("#login-form").serializeArray();
		var error = true;
		$.each($form_data, function(campo, value){
			$input = $form_data[campo];
			$elemento = $("#input-" + $input['name']);
			if($input['value'] == ""){				
				$elemento.addClass("has-error");				
				error = false;
			}
		});
		
		if(!error){ 
			alert("Por favor, preencha todos os campos.");
			event.preventDefault();
		}		
		
	});

// CADASTRO
	// array de erros no formulário.
	var register_erros = {
		nome		: true,
		email 		: true,
		matricula 	: true,
		usuario 	: true,
		senha 		: true,
		ticket 		: true
	};

	// Registra erros no array
	function errosRegisterForm(key, valor){
		register_erros[key] = valor;
	}

	//Muda cor da label no form de cadastro
	function addError(obj){
		$obj = obj;
		if($obj.hasClass("input-ok"))
			$obj.removeClass("input-ok");		
		$obj.addClass("input-error");
	}

	function addErrorTicket(obj){
		$obj = obj;
		if($obj.hasClass("input-ok--ticket"))
			$obj.removeClass("input-ok--ticket");		
		$obj.addClass("input-error--ticket");
	}

	function removeError(obj){
		$obj = obj;
		$span = $obj.parent().children("span");
		$span.html("");
		if($obj.hasClass("input-error"))
			$obj.removeClass("input-error");
		$obj.addClass("input-ok")
	}

	function removeErrorTicket(obj){
		$obj = obj;
		if($obj.hasClass("input-error--ticket"))
			$obj.removeClass("input-error--ticket");
		$obj.addClass("input-ok--ticket")
	}

	// TESTE DE REGEX
	function validarEmail(email){
		var emailRegex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
		return emailRegex.test(email);	
	}

	function validarUser(user){
		var regex = /^[a-zA-Z0-9_@%#$&!.-]{3,16}$/;
		return regex.test(user);
	}

	function validaPass(pass){
		var regex = /^[a-z0-9A-Z_@%$#&!.-]{6,}$/;
		return regex.test(pass);
	}

	function validaTicket(ticket){
		var regex = /^[a-z0-9A-Z]{6}$/;
		return regex.test(ticket);
	}
	function validaNome(nome){
		var regex = /^[a-zA-Z0-9]{11,}$/;
		return regex.test(nome);
	}
	function validaMatr(matr){
		var regex = /^[0-9]{14}$/;
		return regex.test(matr);
	}

	$(".input-cadastro").on("focus", function(){
		$this = $(this);	
		$this.parent().addClass("input-ativo");
	});

	$(".input-cadastro").on("blur", function(){
		$this = $(this);	
		$this.parent().removeClass("input-ativo");
	});

	//Funções para verificar inputs form de cadastro
	$("#nome").on("blur", function(){
		$this = $(this);
		$span = $this.parent().children(".error");
		if(validaNome($this.val())){
			$span.html("Deve conter no mínimo 11 carácteres.")
			addError($this);
			errosRegisterForm("nome", true);
		}
		else {			
			removeError($this);
			errosRegisterForm("nome", false);
		}
	});

	// Validação client de email
	$("#mail").on("blur", function(){
		$mailcamp = $(this);		
		$mail = $this.val();
		$span = $this.parent().children(".error");		
		if(validarEmail($mail)){ // Se estiver no formato certo
			$.post(register_check_page, {mail: $mail}, function(data){ // Checa disponibilidade
				console.log(data);
				data = jQuery.parseJSON(data);
				if(data["disponivel"]){
					removeError($mailcamp);
					$span.html("");					
					errosRegisterForm("email", false);
				}
				else{
					addError($mailcamp); // Não disponivel
					$span.removeClass("success").addClass("error").html("E-mail indisponível.");
					errosRegisterForm("email", true);
				}				
				
			});
		}
		else{ // Erro de formato
			addError($mailcamp);
			$span.removeClass("success").addClass("error").html("Endereço inválido.");
			errosRegisterForm("email", true);
		}
	});

	//Validação client de e-mails iguais
	$("#cmail").on("blur", function(){
		$this = $(this);
		$span = $this.parent().children(".error");
		if(validarEmail($this.val()) && $this.val() == $("#mail").val()){
			removeError($this);
			errosRegisterForm("email", false);
		}
		else{
			addError($this);
			$span.html("Os e-mails digitados devem ser iguais.");
			errosRegisterForm("email", true);
		}
	});

	// Validação client matricula
	$("#matr").on("blur", function(){
		$campomatricula = $(this);
		$matricula = $campomatricula.val();
		$span = $this.parent().children("span");
		if(validaMatr($matricula)){ // Se estiver no formato correto
			$.post(register_check_page, {matricula: $matricula}, function(data){ // Checa disponibilidade
				data = jQuery.parseJSON(data);
				if(data["disponivel"]){
					removeError($campomatricula);
					$span.html("");
					errosRegisterForm("matricula", false);
				}
				else if(!data["disponivel"]){
					addError($campomatricula);
					$span.removeClass("success").addClass("error").html("Matricula já cadastrada.");	
					errosRegisterForm("matricula", true);
				}
			});
		}
		else{
			$span.removeClass("success").addClass("error").html("Por favor, insira seu código de matrícula.");
			addError($campomatricula);
			errosRegisterForm("matricula", true);
		}
	});

	// Validação de formato de usuario
	$("#usuario").on("blur", function(){
		$usercamp = $(this);
		$user = $usercamp.val();
		$span = $usercamp.parent().children(".error");
		if(validarUser($user)){ // No formato
			$.post(register_check_page, {usuario: $user}, function(data){ //Verifica a disponibilidade
				data = jQuery.parseJSON(data);
				if(data["disponivel"]){
					removeError($usercamp);
					$span.html("");
					errosRegisterForm("usuario", false);
				}
				else{ // Não disponivel
					$span.removeClass("success").addClass("error").html("Usuário indisponível.");
					addError($usercamp);
					errosRegisterForm("usuario", true);
				}
			})
		}
		else{ // Erro de formato
			addError($usercamp);
			$span.html("O nome de usuário deve ter entre 3 e 16 carácteres.");
			errosRegisterForm("usuario", true);
		}
	});

	// Validação de formato da senha
	$("#senha").on("blur", function(){
		$this = $(this);
		$span = $this.parent().children(".error");
		if(validaPass($this.val())){
			removeError($this);
			errosRegisterForm("senha", false);
		}
		else{
			addError($this);
			$span.html("A senha deve conter no mínimo 6 carácteres.");
			errosRegisterForm("senha", true);
		}
	});

	// Validação client de senhas iguais
	$("#csenha").on("blur", function(){
		$this = $(this);
		$span = $this.parent().children(".error");
		if($this.val() == $("#senha").val() && validaPass($this.val())){
			removeError($this);
			errosRegisterForm("senha", false);
		}
		else{
			addError($this);
			$span.html("Senhas não coincidem.");
			errosRegisterForm("senha", true);
		}
	});

	// Válidação client ticket
	$("#ticket").on("blur", function(){
		$ticket = $(this); 
		$span = $ticket.parent().children("span");
		if(validaTicket($ticket.val())){ //Se estiver no formato certo
			$.post(register_check_page, {ticket: $ticket.val()}, function(json){ //Manda um post para o php
				json = jQuery.parseJSON(json);
				if(json['disponivel']){ // Que retorna a disponibilidade
					removeErrorTicket($ticket);	
					$span.removeClass("error").addClass("success").html("<i class='fa fa-check fa-lg'></i>");					
					errosRegisterForm("ticket", false);
				}
				else{
					addErrorTicket($ticket); //Não disponível
					$span.removeClass("success").addClass("error").html("<i class='fa fa-times fa-lg'></i>");
					errosRegisterForm("ticket", true);
				}
			});	
		}
		else{
			addErrorTicket($ticket); // Erro de formato
			$span.removeClass("success").addClass("error").html("<i class='fa fa-times fa-lg'></i>")
			errosRegisterForm("ticket", true);
		}
	});

	// Validação de campos ao submeter
	$("#register-submit").on("click", function(event){
		$this = $(this);
		$.each(register_erros, function(chave, valor){
			if(register_erros[chave]){
				console.log(register_erros[chave]);
				//alert("Por favor, preencha todos os campos corretamente.");
				event.preventDefault();
			}
			else
				return true;	
		});
	});

// PAINEL
	// Lista do menu lateral
	$(".drop-toggle>a").on("click", function(event){
		$this = $(this).parent();
		$this.toggleClass("aberto");
		$indicador = $this.find(".indicador");
		$indicador.toggleClass("rodar");
		event.preventDefault();
	});
	$(".add-spinner").hover(function(){
		$this = $(this);
		var i = $this.find("i");
		i.toggleClass("fa-spin");
	}, function(){
		$this = $(this);
		var i = $this.find("i");
		i.toggleClass("fa-spin");
	});
});