$('#comedores_list').hide();

$(document).on('change','#selectTypeUser',function(){
    var opt = $('#selectTypeUser option:selected').val();
    //es administrador de comedor
    if(opt == 3)
        $('#comedores_list').show();  
    else
        $('#comedores_list').hide();
    
} );