$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
        Swal.fire({
          title: '<span style="color: red;">Tens a certeza?</span>',
          html: "<span style='color: black;'>Apagar esta informação?</span>", // Modificação aqui
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sim, apagar!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Apagado!',
                        'Informação apagada.',
                        'success'
                      )
                    }
                  }) 


    });

  });
