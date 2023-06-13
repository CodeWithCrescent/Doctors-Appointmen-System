// BS-Stepper Init
document.addEventListener('DOMContentLoaded', function () {
window.stepper = new Stepper(document.querySelector('.bs-stepper'))
})

// //submit form
// var form = document.getElementById("form");
//
// document.getElementById("submit").addEventListener("click", function () {
// form.submit();
// });




//Datemask dd/mm/yyyy
$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });

$(function () {
  //Money Euro
  $('[data-mask]').inputmask();

  bsCustomFileInput.init(); //Profile Picture Upload name

// $.validator.setDefaults({
// submitHandler: function () {
//   alert( "Form successful submitted!" );
// }
// });
$('#loginForm').validate({
rules: {
  email: {
    required: true,
    email: true,
  },
  password: {
    required: true
  },
},
messages: {
  email: {
    required: "Please enter a email address",
    email: "Please enter a vaild email address"
  },
  password: {
    required: "Please provide your password"
  }
},
errorElement: 'span',
errorPlacement: function (error, element) {
  error.addClass('invalid-feedback');
  element.closest('.input-group').append(error);
},
highlight: function (element, errorClass, validClass) {
  $(element).addClass('is-invalid');
},
unhighlight: function (element, errorClass, validClass) {
  $(element).removeClass('is-invalid');
}
});

//Registration Form validation
$('#registerForm').validate({
rules: {
  email: {
    required: true,
    email: true,
  },
  password: {
    required: true,
    minlength: 5
  },
  gender: {
    required: true
  }
},
messages: {
  email: {
    required: "Please enter a email address",
    email: "Please enter a vaild email address"
  },
  password: {
    required: "Please provide your password",
    minlength: "Your password must be at least 5 characters long"
  },
  firstname: {
    required: "Please provide your firstname"
  },
  lastname: {
    required: "Please provide your lastname"
  },
  phone: {
    required: "Please enter your phone number"
  },
  gender: {
    required: "Please choose gender"
  }, 
  birthdate: {
    required: "Please enter your birthdate"
  },
},
errorElement: 'span',
errorPlacement: function (error, element) {
  error.addClass('invalid-feedback');
  element.closest('.form-group').append(error);
},
highlight: function (element, errorClass, validClass) {
  $(element).addClass('is-invalid');
},
unhighlight: function (element, errorClass, validClass) {
  $(element).removeClass('is-invalid');
}
});
});
