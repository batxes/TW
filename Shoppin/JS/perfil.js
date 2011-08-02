$(document).ready(function(){
    $("#commentForm").validate(
{
		rules: {
			nombre: "required",
			nick: {
				required: true,
				minlength: 2
			},
			password: {
				required: true,
				minlength: 5
			},
			password2: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			}
//			email: {
//				required: true,
//				email: true
//			},
//			topic: {
//				required: "#newsletter:checked",
//				minlength: 2
//			},
		},
		messages: {
			nombre: "Por favor, inserte su nombre",
			nick: {
				required: "Por favor, inserte su nick",
				minlength: "El nick debe contener al menos 2 letras"
			},
			password: {
				required: "Por favor, inserte la contraseña",
				minlength: "La contraseña debe tener al menos 5 letras"
			},
			password2: {
				required: "Vuelva a insertar la contraseña, por favor",
				minlength: "La contraseña debe tener al menos 5 letras",
				equalTo: "Las contraseñas deben coincidir"
			}
		}
	});
       $("#tabs").tabs();
});