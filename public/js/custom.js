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
                        $('#title').val('');
                        $('#body').val('');
                        $('#status').val('add');
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

$(".edit").click(function (e) {
    var post_id=$(this).data('post');
    var csrfToken = $("[name='_token']").val();
    $.ajax({
        type: 'POST',
        url: 'edit',
        data: 'post_id=' + post_id + '&_token='+ csrfToken +'&status=edit',
        
        success: function (response) {
            if (response) {
                $('#title').val(response['title']);
                $('#body').val(response['body']);
                $('#post_id').val(post_id);
                $('#status').val('edit');
                
            } else {
               
                alert('fail');
            }
        }
    });

});
    
  
    
});