$(function() {
  $("#menu").submit(function(e) {
    e.preventDefault();
    let msj;
    let edad = $('#dato').val();
    if (edad >= 18) {
      msj = 'mayor de edad';
    } else {
      msj = 'meno de edad';
    }
    console.log(msj)
  });
});
