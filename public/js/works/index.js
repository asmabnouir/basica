/*
    ./www/js/works/index.js
 */

 $(function(){
   $('#moreWorks').click(function(e){
     e.preventDefault();

     var nbreworks = $('.works_index').length;
     var url = $(this).attr('data-url');
     $.ajax({
       url: url,
       // url: 'ajax/works/olders/10/' + nbreworks,
       data: {
         offset: nbreworks,
         limit: 6
       },
       method: 'post',
       success: function(reponsePHP){
         $('#list-works').append(reponsePHP)
                         .find('.works_index:nth-last-of-type(-n+6)')
                         .hide().fadeIn();
       }
     });

   });



 });
