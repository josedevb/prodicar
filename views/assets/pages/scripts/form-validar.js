/**
 * Created by Gerardoepp on 21/9/2016.
 */

//Validando los campos de perfil

$(document).ready(function() {

    $('#form_perfil').validate({

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

            nombre:
            {
                required: true,
                minlength: 2,
                maxlength: 30,
                nombre:true
            },

            numero:
            {
                required: true,
                minlength: 11,
                maxlength: 11,
                telefono:true
            },

            direccion:
            {
                required: true,
                minlength: 15,
                maxlength: 80

            },

            informacion:
            {
                required: true,
                minlength: 10,
                maxlength: 45

            }
        },

        messages: {
            nombre: {
                required: "Este campo es requerido",
                minlength: "Por favor ingresa  un minimo de 10 caracteres",
                maxlength: "El maximo de caracteres es 30",
            },

            numero: {
                required: "Este campo es requerido",
                minlength: "Por favor ingresa  un minimo de 11 caracteres",
                maxlength: "El maximo de caracteres es 11",
            },
            direccion: {
                required: "Este campo es requerido",
                minlength: "Por favor ingresa  un minimo de 15 caracteres",
                maxlength: "El maximo de caracteres es 80"
            },
            informacion: {
                required: "Este campo es requerido",
                minlength: "Por favor ingresa  un minimo de 10 caracteres",
                maxlength: "El maximo de caracteres es 80"
            }
        }

    });

    //Añadiendo un metodo al jquery validator para verificar el numero
    jQuery.validator.addMethod("telefono", function(value, element) {
        return this.optional(element) || /^[0-9]+$/.test(value);
    }, "Por favor ingresa un numero valido");
    //Creando nuevo Metodo para validar nombre de usuario
    jQuery.validator.addMethod("nombre", function(value, element) {
        return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
    }, "Solo ingresa letras");


});
