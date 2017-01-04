if($('body').hasClass('home')) {
$('body').ready(function(){
	$('.grid').masonry({
		percentPosition: true,
		columnWidth: '.grid-sizer',
		gutter: 14,
		itemSelector: '.item'
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
var $grid = $('.grid-work');
$grid.imagesLoaded(function(){
	$('.grid-work').animate({opacity: 1});
	var hashOptions = $.deparam.fragment();
	$grid.isotope({
	  percentPosition: true,
	  itemSelector: '.grid-item',
	  layoutMode: 'packery',
	  filter: filterSelector,
// 	  filter: '.Architecture.Sustainability',
	  packery: {
	  	gutter: 14,
// 	  	columnWidth: '.grid-sizer'
	},
	});
console.log(hashOptions);
if(hashOptions[0] == null) {
// 		$grid.isotope({});
	} else {
		$grid.isotope(hashOptions);
	}
});

    var cnt = $("img").length;
    $("img").one("load", function() {
        cnt--;

        // If all images are loaded, init Packery
        if (cnt === 0)
        {
            $(".grid-work").packery({
               itemSelector: "grid-item"
            });
        }

    }).each(function() {
      if(this.complete) $(this).load();
    });

// filter items on button click
/*
$('#discipline a').on( 'click', function(e) {
	e.preventDefault();
	$('.filter').fadeOut(100);
	$('#discipline a').removeClass('active');
  var filterValue = $(this).attr('data-filter');
  $grid.isotope({ filter: filterValue });
  $(this).addClass('active');
  $('.filter'+filterValue).delay(400).fadeIn();
});
*/

$('#discipline a').on( 'click', function(e) {
	var $this = $(this);
// 	e.preventDefault();
	var checkBox = $(this).find(':input');
	if ($(checkBox).is(':checked')) {
		$(checkBox).prop('checked', false);
	} else {
		$(checkBox).prop('checked', true);
	}
	$('.filter').fadeOut(100);
	$('#discipline a').removeClass('active');
  var filterValue = $(this).attr('data-filter');
  if(filterValue == '.Architecture') {
	  filterValue = '.Specialty,.filter.Architecture';
  }
  console.log(filterValue);
  var href = $(this).attr('href').replace( /^#/, '' ),
      option = $.deparam( href, true );
	$.bbq.pushState( option );
	$(this).addClass('active');
	$('.filter'+filterValue).delay(400).fadeIn();
	return false;
});

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

var filters = {};

/*
$('#project_type a').on( 'click', function(e) {
	e.preventDefault();  
	var checkBox = $(this).find(':input');
	if ($(checkBox).is(':checked')) {
		$(checkBox).prop('checked', false);
	} else {
		$(checkBox).prop('checked', true);
	}
	var $this = $(this);
	$('#project_type a').removeClass('active');
	var filterValue = $(this).attr('data-filter');
	var href = $(this).attr('href').replace( /^#/, '' ),
    option = $.deparam( href, true );
	$.bbq.pushState( option );
	$(this).addClass('active');
	if($(this).parents().hasClass('Preservation')) {
		console.log("YUP");
	}
	else if($(this).hasClass('Preservation')) {
		$('.filter.Architecture').fadeOut(100);
		$('.filter.Preservation').delay(400).fadeIn();
	} else {
		$('.filter.Preservation').fadeOut(100);
	}
	return false;
});
*/

  var filters = {},
      // get filter from hash, remove leading '#'
      filterSelector = window.location.hash.slice(1);

  $('#project_type a').click(function(){
    // store filter value in object
    // i.e. filters.color = 'red'
    var $this = $(this),
        name = $this.attr('data-filter-name'),
        value = $this.attr('data-filter-value'),
        isoFilters = [],
        filterName, prop;

    filters[ name ] = value;

    for ( prop in filters ) {
      isoFilters.push( filters[ prop ] );
    }
    console.log(filters);

    var filterSelector = isoFilters.join('');

    // trigger isotope if its ready
    if ( $grid.data('isotope') ) {
      $grid.isotope({ filter: filterSelector });
    }
    console.log(filterSelector);

    window.location.hash = filterSelector;

    // toggle highlight
//     $this.parents('ul').find('.selected').removeClass('selected');
    $this.parent().addClass('selected');

    return false;

  });


  // if there was a filter, trigger a click on the 
  // corresponding option
  if ( filterSelector ) {
    var selectorClasses = filterSelector.split('.').slice(1);
    $.each( selectorClasses, function( i, selectorClass ) {
      $('#project_type a[data-filter-value=".' + selectorClass + '"]').click();
    });
  }

$(window).bind( 'hashchange', function( event ){
  // get options object from hash
  var hashOptions = $.deparam.fragment();
  // apply options from hash
  var filter = hashOptions['filter'];
//   $grid.isotope( hashOptions );
  $(filter).addClass('active');
})
  // trigger hashchange to capture any hash data on init
  .trigger('hashchange');

$('body.post-type-archive-work').ready(function(){
	  var hashOptions = $.deparam.fragment();
  var filter = hashOptions['filter'];
  $('a').removeClass('active');
   $grid.isotope( hashOptions );
  var filterA = $('a').find('[data-filter="'+filter+'"]');
  console.log(filterA);
    $('a'+filter).addClass('active');
});

function filterDisplay(filter) {

}
}