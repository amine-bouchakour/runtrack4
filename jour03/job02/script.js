$('document').ready(function(){

console.log('toto');




$('#myModal').on('shown.bs.modal', function () {
    $('achatPapillon').trigger('focus')
  })


})