$(document).ready(function(){

    $('#langds').on('change',function(){

     let lang =  $(this).val();
   
     $.ajax({
           url:'teames',
           type:"post",
           datatType : 'json',
           data: {"lang" : lang,  "_token": "{{ csrf_token() }}",},
          
         
         success: function(data)
       {
           console.log('AJAX call success');
       },
   })

   })
 });
