$('.user-menu').on('click',function(event) {
    
    event.preventDefault();
    
    var $menu = $(this);

    var url = $menu.attr("href");
   
    
    //realiza el request
    var sendData = $.get(url);

    //muesta el resultado
    sendData.done(function(html) {
           
        $('#content').empty().append(html);
        
        //utilizado para manupular las url dinamicamente
        //history.pushState({},'',url);        
    });
});


