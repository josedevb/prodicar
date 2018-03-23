/**
 * Created by Gerardoepp on 21/9/2016.
 */

//Validando los campos de perfil

$(document).ready(function() {

    $('#form_contrasena').validate({

        errorClass:'has-error help-block',
        validClass:'has-success',
        errorElement:'span',

        highlight: function (element, errorClass, validClass) {
            $(element).parents("div.form-group.form-md-line-input").addClass(errorClass).removeClass(validClass);

        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents(".has-error").removeClass(errorClass).addClass(validClass);
        },

        rules: {

            clave:
            {
                required: true,
                minlength: 8,
                maxlength: 20,
                digits:true
            },

            clave2:
            {
                required: true,
                minlength: 8,
                maxlength: 20,
                digits:true,
                equalTo:"#clave"
            },

        },

        messages: {
            clave: {
                required: "Este campo es requerido",
                minlength: "Por favor ingresa  un minimo de 8 caracteres",
                maxlength: "El maximo de caracteres es 20",
                digits: "Solo puedes ingresar numeros enteros",
            },

            clave2: {
                required: "Este campo es requerido",
                minlength: "Por favor ingresa  un minimo de 11 caracteres",
                maxlength: "El maximo de caracteres es 11",
                digits: "Solo puedes ingresar numeros enteros",
                equalTo:"Las contraseñas no coinciden",
            },

        }

    });




});
