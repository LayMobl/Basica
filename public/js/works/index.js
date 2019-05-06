/*
    ./js/works/index.js
 */

    $(function(){

      // Event click sur bouton
      $('#more').click(function(e){
        e.preventDefault();

        // Nombre de projets affichés
        var nbreProjets = $('.work-preview').length;
        // Url de la page
        var url = $(this).attr('data-url');

        $.ajax({
          url: url,
          data: {
            // offset changeant en fonction du nombre de projets affichés
            offset: nbreProjets
          },
          method: 'post',
          success: function(reponsePHP){
            // Rajoute la vue index des projets en fin de liste
            $('.work-list').append(reponsePHP)
                            .find('.work-preview:nth-last-of-type(-n+6)')
                            .hide().fadeIn();
          }
        });


      });

    });
