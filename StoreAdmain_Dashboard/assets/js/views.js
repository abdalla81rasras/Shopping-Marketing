$('#songs-load').on('click', function(e)  {
    e.preventDefault();  
    var $rows = $('.songs-table .table-views tr');
    var lastActiveIndex = $rows.filter('.active:last').index();
    $rows.filter(':lt(' + (lastActiveIndex + 1000000) + ')').addClass('active');
    $('#songs-load').hide();
});
  
