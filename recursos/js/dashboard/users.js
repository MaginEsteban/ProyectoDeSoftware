$('.user-menu').on('click',function(event) {
    
    event.preventDefault();
    
    var $menu = $(this);

    var url = $menu.attr("href");
   
    
    //realiza el request
    var sendData = $.post(url);

    //muesta el resultado
    sendData.done(function(html) {
           
        $('#content').empty().append(html);
        history.pushState({},'',url);        
    });
});


