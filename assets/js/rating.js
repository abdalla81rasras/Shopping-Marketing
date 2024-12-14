$(document).ready(function () {
    $(".rateyo").each(function () {
        $(this).rateYo({
            starWidth: "16px",
            normalFill: "#b3b3b3",
            ratedFill: "#fdd835",
            numStars: 5,
            minValue: 0,
            maxValue: 5,
            precision: 1,
            //rating: 3,
            onChange: null,
            onSet: null,
            readOnly: true
        });
    });
});

var readOnly = $("#rating").rateYo("option", "readOnly"); 

$("#rating").rateYo("option", "readOnly", false);

$(function () {
    $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
        var rating = data.rating;
        $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
        $(this).parent().find('input[name=rating]').val(rating);
    });  
});

