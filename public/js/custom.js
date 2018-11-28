jQuery(document).ready(function () {


    $("#post").click(function (e) {
            e.preventDefault(e);
            var title=$('#title').val();
            var body=$('#body').val();
            var csrfToken = $("[name='_token']").val();
            var $form = $(e.target);
            $.ajax({
                type: 'POST',
                url: $("#form-add").attr('action'),
                data: $('#form-add').serialize(),
                success: function (response) {

                    if (response == 'fail') {
                        $('#fail').hide();
                        
                    } else {
                        $('textarea[name=body').val('');
                        $('input[name=title').val('');
                        $('#status').val('add');
                        $('#posts').prepend(response);
                       
                    }


                }
            });
        

    });

    $("#update").click(function (e) {
        e.preventDefault(e);
        var title=$('#title').val();
        var body=$('#body').val();
        var post_id=$('#post_id').val();
        var csrfToken = $("[name='_token']").val();
        var $form = $(e.target);
        $.ajax({
            type: 'POST',
            url: $("#form-update").attr('action'),
            data: $('#form-update').serialize(),
            success: function (response) {

                if (response == 'fail') {
                    $('#fail').hide();
                    
                } else {
                    $('input[name=body').val('');
                    $('input[name=title').val('');
                    $("#form-add").show();
                    $("#form-update").hide();
                    $('#post-'+post_id).hide();
                    $('#posts').prepend(response);
                   
                }


            }
        });
    

});
    $(".del").click(function (e) {
       
        var post_id=$(this).data('post');
        var csrfToken = $("[name='_token']").val();
        $.ajax({
            type: 'POST',
            url: 'delete',
            data: 'post_id=' + post_id + '&_token='+ csrfToken,
            success: function (response) {

                if (response == 'success') {
                    
                    $('#post-'+post_id).hide();
                } else {
                  
                }


            }
        });
    

});

$('.comment').keypress(function (e) {
    if (e.which == 13) {
     var post_id=$(this).data('post');
     var csrfToken = $("[name='_token']").val();
     if($(this).val()!=''){
            $.ajax({
                type: 'POST',
                url: 'comment',
                data: 'post_id=' + post_id + '&_token='+ csrfToken +'&comment='+$(this).val(),
                
                success: function (response) {
                    if (response) {
                        $(this).val('');
                        $('#comments-'+post_id).prepend(response);
                       
                        
                    } else {
                       
                        alert('fail');
                    }
                }
            });
        }
     
    }
  });

$(".edit").click(function (e) {
    var post_id=$(this).data('post');
    var csrfToken = $("[name='_token']").val();
    $("#form-update").show();
    $("#form-add").hide();
    $.ajax({
        type: 'POST',
        url: 'edit',
        data: 'post_id=' + post_id + '&_token='+ csrfToken +'&status=edit',
        
        success: function (response) {
            if (response) {
                $('#title').val(response['title']);
                $('#body').val(response['body']);
                $('#post_id').val(post_id);
               
                
            } else {
               
                alert('fail');
            }
        }
    });

});
    
  
    
});