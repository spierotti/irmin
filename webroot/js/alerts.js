$("document").ready(function(){
    setTimeout(function(){
        $("div.success").fadeOut();
    }, 4000 ); // 4 secs

    setTimeout(function(){
        $("div.alert").fadeOut();
    }, 4000 ); // 4 secs

    setTimeout(function(){
        $("div.warning").fadeOut();
    }, 4000 ); // 4 secs
});