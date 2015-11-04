$('.searchname,.searchtel').click(
    function(){
        var url = $(this).attr('href');
        if($('.select_status').val() !=-1 && $('.select_status').val() !='undefined' )
        {
            url=url+'&status='+$('.select_status').val();
        }
        if($('.select_type').val() !=-1)
        {
            url= url+"&service_type="+$('.select_type').val();
        }
        url = url+'&search_input='+$(this).prev().val();
        location.href = url;
        return false;
    });