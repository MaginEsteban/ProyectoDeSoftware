$('.user-menu').on('click',function(event) {
    
    event.preventDefault();

    var $userAdd = $(this);

    var url = $userAdd.attr("href");
   
    //realiza el request
    var sendData = $.post(url);

    //muesta el resultado
    sendData.done(function(html) {
           
        $('#content').empty().append(html);
                
    });
});


