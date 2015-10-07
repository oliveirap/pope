$(document).ready(function(){

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
		$span = $obj.parent().children(".error");
		$span.html("");
		$obj = obj;
		if($obj.hasClass("input-error"))
			$obj.removeClass("input-error");
		$obj.addClass("input-ok")
	}

	function removeErrorTicket(obj){
		$obj = obj;
		$span = $obj.parent().children(".error");
		$span.html("");
		$obj = obj;
		if($obj.hasClass("input-error--ticket"))
			$obj.removeClass("input-error--ticket");
		$obj.addClass("input-ok--ticket")
	}
		// TESTE DE REGEX
	function validarEmail(email){
		var emailRegex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		return emailRegex.test(email);	
	}

	function validarUser(user){
		var regex = /^[a-z0-9_-]{3,16}$/;
		return regex.test(user);
	}

	function validaPass(pass){
		var regex = /^[a-z0-9_-]{6,18}$/;
		return regex.test(pass);
	}

	function validaTicket(ticket){
		var regex = /^[a-z0-9A-Z]{6}$/;
		return regex.test(ticket);
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
		if($this.val().length < 11){
			$span.html("Deve conter no mínimo 11 carácteres.")
			addError($this);
			//$this.removeClass("input-ok");
			//$this.addClass("input-error");
		}
		else {			
			removeError($this);
		}
	});


	$("#mail").on("blur", function(){
		$this = $(this);
		$span = $this.parent().children(".error");
		
		if(validarEmail($this.val())){
			removeError($this);
		}
		else{
			addError($this);
			$span.html("Por favor, insira o endereço de e-mail válido.");
		}
	});

	$("#cmail").on("blur", function(){
		$this = $(this);
		$span = $this.parent().children(".error");
		if(validarEmail($this.val()) && $this.val() == $("#mail").val())
			removeError($this);
		else{
			addError($this);
			$span.html("Os e-mails digitados devem ser iguais.");
		}
	});

	$("#matr").on("blur", function(){
		$this = $(this);
		$span = $this.parent().children(".error");
		if($this.val() != "")
			removeError($this);
		else{
			$span.html("Por favor, insira seu código de matrícula.");
			addError($this);
		}
	});

	$("#usuario").on("blur", function(){
		$this = $(this);
		$span = $this.parent().children(".error");
		if(validarUser($this.val()))
			removeError($this);
		else{
			addError($this);
			$span.html("O nome de usuário deve ter entre 3 e 16 carácteres, sem carácteres especiais.");
		}
	});

	$("#senha").on("blur", function(){
		$this = $(this);
		$span = $this.parent().children(".error");
		if(validaPass($this.val()))
			removeError($this);
		else{
			addError($this);
			$span.html("A senha deve conter de 6 a 18 carácteres, sem carácteres especiais.");
		}
	});

	$("#csenha").on("blur", function(){
		$this = $(this);
		$span = $this.parent().children(".error");
		if($this.val() == $("#senha").val() && validaPass($this.val()))
			removeError($this);
		else{
			addError($this);
			$span.html("Senhas não coincidem.");
		}
	});

	$("#ticket").on("blur", function(){
		$this = $(this);
		$span = $this.parent().children(".error");
		if(validaTicket($this.val()))
			removeErrorTicket($this);
		else{
			addErrorTicket($this);
			$span.html("Um ticket deve ter 6 carácteres, entre letras e números.")
		}
	});

});