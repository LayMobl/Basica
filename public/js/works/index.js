/*
    ./js/works/index.js
 */

    $(function(){

      $('#more').click(function(e){
        e.preventDefault();


        var nbreProjets = $('.work-preview').length;
        var url = $(this).attr('data-url');

        $.ajax({
          url: url,
          data: {
            offset: nbreProjets
          },
          method: 'post',
          success: function(reponsePHP){
            $('.work-list').append(reponsePHP)
                            .find('.work-preview:nth-last-of-type(-n+6)')
                            .hide().fadeIn();
          }
        });


      });

    });
