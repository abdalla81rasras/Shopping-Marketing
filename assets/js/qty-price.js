$(document).ready(function() {
    update_amount();
    $("#qty,#total").on("keyup keypress change", function() {
        update_amount();
    });
});

function update_amount() {
    $(".table > tbody > tr").each(function(){
        var quantity = $(this).find("#qty").val();
        var price = $(this).find("#prices").text();
        var total = parseFloat(quantity*price);
        $(this).find("#total").text(total)
    });
}