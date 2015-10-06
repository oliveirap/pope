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
		})
		
		if(!error){ 
			alert("Por favor, preencha todos os campos.");
			event.preventDefault();
		}
		
		
	})

});