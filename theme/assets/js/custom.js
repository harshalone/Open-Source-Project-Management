(function($, window, document) {
 
$('.loadissue').click(function(){
  event.preventDefault();
  var url_to_load = $(this).attr('href');
  $("#ajax-container").load( url_to_load, { limit: 25 }, function() {
   alert( url_to_load );
  });
});

}(window.jQuery, window, document));