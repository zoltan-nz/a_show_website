 jQuery(document).ready(function($) {

   var ids = $('.wpbdp-listing:not(.wpbdp-listing-single)').map(function() {return $(this).attr('id')});

   $.each(ids, function(index, id) {
     var business_name = $('#'+id).find('.wpbdp-field-businessname a').text();
     
     var html = 
        "<div class='panel-heading'>"+
        "<h4 class='panel-title'>"+       
        "<a data-toggle='collapse' data-parent='.listings' href='#"+id+"'>"+
        business_name+
        "</a>"+
        "</h4>"+
        "</div>";
     $(html).insertBefore('#'+id);
		});
   
   $('.wpbdp-listing:not(.wpbdp-listing-single)').wrap('<div class="panel-collapse collapse">');
   
});