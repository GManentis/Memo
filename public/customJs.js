function Save()
{
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
       $.ajax({
          url: "/ajaxInsert",
          method: 'post',
          data: {
             name: $('#name').val(),
             surname: $('#surname').val(),
             mail: $('#mail').val(),
             telephone: $("#phone").val()
          },
          success: function(result)
          {
             $('#response').html(result.response);
          }});
}


