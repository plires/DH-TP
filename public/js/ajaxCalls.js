$(document).ready(function(){



  	/// Ajax calls

    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

    $('.favoritos_home').click(function(e){
  		e.preventDefault();

      var product_id = $(this).closest('.item').data("id");
      var user_id = $('.user-id').data('id');
      var element = this;

     var childrenFlag = $(this).children();

     if( !childrenFlag.hasClass('ion-flag-active') ){

       var url = '../user/favourites';


       $.ajax({
         url: url,
         type: 'POST',
         data: ({
           "product_id": product_id,
           "user_id": user_id
         }),

         success: function(response) { // What to do if we succeed

           $(element).children().addClass('ion-flag-active');

         },

         error: function(jqXHR, textStatus, errorThrown) {
           alert('Hubo un error, intente mas tarde');
         }
       });


     }else{

       var url = '../user/favourites/{data}';
        console.log('borra favorito');

       $.ajax({
         url: url,
         type: 'DELETE',
         data: ({
           "product_id": product_id,
           "user_id": user_id
         }),

         success: function(response) { // What to do if we succeed

          var childrenFlag = $(element).children();
           childrenFlag.removeClass('ion-flag-active');

         },

         error: function(jqXHR, textStatus, errorThrown) {
           alert('Hubo un error, intente mas tarde');
         }
       });

     }


  	})


  	/// End ajax calls


  $('#search-input').keyup(function(){

     if($(this).val() !== '' ){
        $('.search-results').fadeIn();

     }else{
         $('.search-results').fadeOut();
     }

     var url = 'user/products/search/{term}';

     var searchTerm = $(this).val();




     $.ajax({
       url: url,
       type: 'GET',
       data: ({
         "search_term": searchTerm,
       }),

       success: function(response) { // What to do if we succeed
          $('.search-results-list').empty();
         $.each(response, function( index, value ) {
            $('.search-results-list').append( "<li> <a href= "+ "/user/products/" + value.id + " >"  +  value.title + "  </a></li>" );
         });


       },

       error: function(jqXHR, textStatus, errorThrown) {
         alert('Hubo un error, intente mas tarde');
       }
     });


    })
  });
