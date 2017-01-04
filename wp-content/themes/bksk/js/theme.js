if($('body').hasClass('home')) {
$(document).ready(function(){
	var $grid = $('.grid');
	$grid.imagesLoaded(function(){
	$('.grid').masonry({
		percentPosition: true,
		columnWidth: '.grid-sizer',
		gutter: 14,
		itemSelector: '.item'
	});	
	$('#main').delay(0).animate({opacity: 1});
	});
});
} else if($('.content').hasClass('grid-team')) {
	$('.grid-team').animate({opacity: 1});
	var $grid = $('.grid-team');
$grid.imagesLoaded(function(){
	$grid.isotope({ 
	  percentPosition: true,
	  itemSelector: '.grid-item',
	    masonry: {
			columnWidth: '.grid-sizer',
			gutter: 12
  		}
  	});
});

$('.grid-item--staff').hover(
  function() {
    $( this ).removeClass( "bw" );
  }, function() {
    $( this ).addClass( "bw" );
  }
 );	
	
} else {

// init Isotope
/*
$( "input" ).on( "click", function() {
	if($(this).is(':checked')) {
		$(this).prev('label a').addClass('active');
	} else {
		$(this).prev('label a').removeClass('active');
	}
});
*/
/*
$('#project_type a').on( 'click', function(e) {
	e.preventDefault();  
	$('#project_type a').removeClass('active');
	var filterValue = $(this).attr('data-filter');
  $grid.isotope({ filter: filterValue });
  $(this).addClass('active');
});
*/


  var $grid = $('#grid'),
      filters = {},
      // get filter from hash, remove leading '#'
      filterSelector = window.location.hash.slice(1);

  $('#filters a').click(function(){
    // store filter value in object
    // i.e. filters.color = 'red'
    var $this = $(this),
        name = $this.attr('data-filter-name'),
        value = $this.attr('data-filter-value'),
        isoFilters = [],
        filterName, prop;
	
	var checkBox = $(this).find(':input');
	if ($(checkBox).is(':checked')) {
		$(checkBox).prop('checked', false);
	} else {
		$(checkBox).prop('checked', true);
	}
	
	var filterValue = $(this).attr('data-filter');
	if(filterValue == '.Architecture') {
	  filterValue = '.Specialty,.filter.Architecture';
  	}
  	$('.filter'+filterValue).delay(400).fadeIn();
  	if($(this).parents().hasClass('Preservation')) {
		console.log("YUP");
	}
	else if($(this).hasClass('Preservation')) {
		$('.filter.Architecture').fadeOut(100);
		$('.filter.Preservation').delay(400).fadeIn();
	} else {
		$('.filter.Preservation').fadeOut(100);
	}
  	
	if($this.parents('li').hasClass('selected')) {
		delete filters[ name ];
		$this.parents('li').removeClass('selected');
	} else {
		filters[ name ] = value;	
		$this.parent().addClass('selected');
	}

    for ( prop in filters ) {
	      isoFilters.push( filters[ prop ] );	
    }

    var filterSelector = isoFilters.join('');

    if ( $grid.data('isotope') ) {
      $grid.isotope({ filter: filterSelector });
    }

    window.location.hash = filterSelector;

    return false;

  });


  // if there was a filter, trigger click on corresponding option
  if ( filterSelector ) {
    var selectorClasses = filterSelector.split('.').slice(1);
    $.each( selectorClasses, function( i, selectorClass ) {
      $('#filters a[data-filter-value=".' + selectorClass + '"]').click();
    });
  }

$grid.imagesLoaded(function(){
	$('.grid-work').animate({opacity: 1});
	$grid.isotope({
		percentPosition: true,
		itemSelector: '.grid-item',
		layoutMode: 'packery',
		filter: filterSelector,
		packery: {
			gutter: 14,
		},
	});
});

function filterDisplay(filter) {

}
} //end work