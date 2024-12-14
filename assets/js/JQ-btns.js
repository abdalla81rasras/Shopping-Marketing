$(document).ready(function(){

    $("#btn_search").click(function(e){
        e.preventDefault();
        $("#search_likes").toggle(" ");
    });

    $("#n-table").click(function(){
        $("#table-order").show("");
    });

    $(function(){
        $("[data-toggle=popover]").popover(
            {
                html: true,
                sanitize: false
            }
        );
    });
});
