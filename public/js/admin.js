
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     $("#old_pwd").keyup(function (e) {
         e.preventDefault();
         //alert('hihi')
         var old_pwd = $(this).val()
         console.log(old_pwd)
        $.ajax({
            type: "post",
            url: "admin/pass",
            data: {old_pwd:old_pwd},
            dataType: "json",
            success: function (response) {
               console.log(response)
               if(response ==false){
                $('#old_span').html("<i class='text-danger'>current pwd is incorrect</i>")
            }else if (response ==true){
                $('#old_span').html("<i class='text-success'>current pwd is correct</i>")

            }
            },error:function(err){
                console.log(err)
                $('#old_span').html("<i class='text-danger'>current pwd is incorrect</i>")
            }
        });
     });
     $("#confirm_pwd").keyup(function (e) {
        e.preventDefault();
        var x =$("#new_pwd").val()
        var y =$(this).val()
        if(y.match(x)){
            $('#confirm_span').html("<i class='text-success'>password Match </i>")
        }else{
            $('#confirm_span').html("<i class='text-danger'>password Doesnt match </i>")
        }
     });


    
 });
