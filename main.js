$(document).ready(function(){
  $('.admin_content').on('click', function(event){
    event.preventDefault();
    $(this).closest('.header_dropdown').find('.account_dropdown').toggle();
  });
});