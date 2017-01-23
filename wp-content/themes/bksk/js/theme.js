if($('body').hasClass('home')) {
$(document).ready(function(){
	var $grid = $('.grid');
	$grid.imagesLoaded(function(){
	$('.grid').masonry({
		percentPosition: true,
		columnWidth: '.grid-sizer',
		gutter: '.gutter-sizer',
		itemSelector: '.item'
	});	
	$('#main').delay(0).animate({opacity: 1});
	});
});
} else if($('.content').hasClass('grid-team')) {
	var $grid = $('.grid-team');
$grid.imagesLoaded(function(){
// 	var $stamp = $grid.find('.og-expander');
	$grid.isotope({
		percentPosition: true,
		itemSelector: '.grid-item',
		layoutMode: 'packery',
		filter: filterSelector,
		packery: {
			gutter: 16,
		},
// 		stamp: $stamp
	});
	$('.grid-team').animate({opacity: 1});
});

/*
$('.grid-item--staff a').on('click', function(){
	var width = $('.grid-team').width();
	var $stamp = $grid.find('.og-expander');
// 	$(this).parent().append('<div class="expander"><h3>NAME</h3><p>TEXT</p></div>');
	$('.og-expander').css({'width':width,'left':0});
	setTimeout(function(){
		$grid.isotope( 'stamp', $stamp );
		$grid.isotope('layout');
	}, 400);
});
*/

$('.grid-item--partner').on('click', function(){
	var id = $(this).data('id');
	var name = $(this).find('a').data('name');
	var title = $(this).find('a').data('title');
	var bio = $(this).find('a').data('bio');
	var img = $(this).find('a').data('largesrc');
	console.log(id);
	$('.overlay').addClass('open');
	$('.overlay .content').html('<header><h2>'+name+'</h2><h3>'+title+'</h3></header><article><div class="left">'+bio+'</div><div class="right"><img src="'+img+'" /></div></article>');
});

$('.close').on('click', function(){
	console.log("fa");
	$('.overlay').removeClass('open');
});

function overlayNext() {
	
}


// Grid.init();

$('.grid-item--staff').hover(
  function() {
    $( this ).removeClass( "bw" );
  }, function() {
    $( this ).addClass( "bw" );
  }
 );	
	
} else if($('body').hasClass('page-id-2')) {
	function initMap() {
	var uluru = {lat: 40.743371, lng: -73.990508};
	var map = new google.maps.Map(document.getElementById('map'), {
	zoom: 15,
	styles: [{"featureType":"administrative","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":-100},{"lightness":"50"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"lightness":"30"}]},{"featureType":"road.local","elementType":"all","stylers":[{"lightness":"40"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]},{"featureType":"water","elementType":"labels","stylers":[{"lightness":-25},{"saturation":-100}]}],
	center: uluru
	});
	var marker = new google.maps.Marker({
	position: uluru,
	map: map
	});
	}
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

  var $grid = $('#grid'),
  	  all,
  	  newDiscipline,
      filters = {},
      // get filter from hash, remove leading '#'
      filterSelector = window.location.hash.slice(1);

  $('#filters a').click(function(){
	  $('.grid-item').removeClass('grid-item--featured');
	  $('#empty').hide();
    // store filter value in object
    // i.e. filters.color = 'red'
    var $this = $(this),
    	selected = $(this),
        name = $this.attr('data-filter-name'),
        value = $this.attr('data-filter-value'),
        type = $this.attr('data-filter-type'),
        isoFilters = [],
        filterName, prop;
	
	var checkBox = $(this).find(':input');
	if ($(checkBox).is(':checked')) {
		$(checkBox).prop('checked', false);
	} else {
		$(checkBox).prop('checked', true);
	}
	
	if($this.parents('li').hasClass('discipline')) {
		if(!$this.parents('li').hasClass('selected') && $('ul.discipline .selected').length) {
			console.log('2 disciplines now checked: reset');
			all = false;
			reset(all);
			$this.parent().addClass('selected');
			return false;
		} else if($this.parents('li').hasClass('selected') && $this.parents('li').hasClass('discipline') && $('ul.discipline .selected').length != 2) {
			console.log('only discipline removed: reset');
			all = false;
			reset(all);
			$this.parents('li').removeClass('selected');
			return false;
		}
	}

  	if($this.parents('ul').hasClass('specialty')) {
	  	$.each( filters, function(key, value){
		  	if(key.indexOf('type') != -1) {
				delete filters[ key ]; 
				$('.project_type li').removeClass('selected');
		  	}
	  	});
/*
	  	if($this.parents('li').hasClass('selected') || $('ul.specialty .selected').length == 2) {
		  	console.log('remove');
		  	delete filters[ name ];
		    $('.specialty').find('.selected').removeClass('selected');
		    $('.specialty').find('input:checked').prop('checked', false);
		}
*/
  	}
  	
  	//regular filters
	if($this.parents('li').hasClass('selected') && !$this.parents('li').hasClass('discipline') && !$this.parents('ul').hasClass('specialty')) {
		console.log('delete');
		delete filters[ name ];
		$this.parents('li').removeClass('selected');
	} else if($this.parents('li').hasClass('selected') && $this.parents('li').hasClass('discipline')) {
		if(value == '.Architecture') {
			value = '.Interiors';
		} else {
			value = '.Architecture';
		}
		filters[ name ] = value;	
		$this.parents('li').removeClass('selected');
	} else if($this.parents('li').hasClass('selected') && $this.parents('ul').hasClass('specialty')) {
		console.log('remove');
		delete filters[ name ];
		$('.specialty').find('.selected').removeClass('selected');
		$('.specialty').find('input:checked').prop('checked', false);
	} else {
// 		console.log('add');
		console.log(filters);
		filters[ name ] = value;
		if($('ul.specialty .selected').length != 0) {
			$('.specialty').find('.selected').removeClass('selected');
			$('.specialty').find('input:checked').prop('checked', false);
		}	
		$this.parent().addClass('selected');
	}

    for ( prop in filters ) {
	      isoFilters.push( filters[ prop ] );	
    }

    var classFilters = isoFilters.map(function(el) {
	    return '.featured_A'+el;
	}); 
    
    var filterSelector = isoFilters.join('');
    
    if(value == '.Architecture' || value == '.Interiors') {
	    newDiscipline = true;
	    filterDisplay(filterSelector, newDiscipline, $this);
    } else {
	    newDiscipline = false;
	    filterDisplay(filterSelector, newDiscipline, $this);
    }
    
    var classSelector = classFilters.join(',');
	var class = classSelector.replace(/A\./g, '');
    console.log(class);
	$(class).addClass('grid-item--featured');	
    
    if ( $grid.data('isotope') ) {
      $grid.isotope({ filter: filterSelector });
    }

    window.location.hash = filterSelector;

    return false;

  });


  // if there was a filter, trigger click on corresponding option
  if ( filterSelector ) {
// 	  console.log(filterSelector);
    var selectorClasses = filterSelector.split('.').slice(1);
    $.each( selectorClasses, function( i, selectorClass ) {
      $('#filters a[data-filter-value=".' + selectorClass + '"]').click();
    });
  }

  
  function filterDisplay(filterValue, newDiscipline, selected) {
// 	var filterValue = $(this).attr('data-filter');
// 	console.log('filterValue: '+filterValue);
	var selectedClass = selected.attr('class');
// 	console.log('selected: '+selectedClass);
	if(newDiscipline == true) {
	if(filterValue == '.Architecture') {
		console.log('filterDisplay: Architecture');
		$('.filter').fadeOut();
		$('.filter'+filterValue).delay(100).fadeIn();
  	} else {
	  	if($('ul.Interiors').is(':hidden')) {
		  	console.log('ya');
			$('.filter').fadeOut();
			$('.filter'+filterValue).fadeIn();
		}
	}
	} else {
	if(selected.parents('ul').hasClass('Architecture')) {
		console.log('true');
		if($('ul.Architecture').is(':visible')) {
			
		} else {
			console.log('arch');
			$('.filter').fadeOut();
			$('.filter.Architecture').delay(100).fadeIn();	
		}
	} else if(filterValue.search('interiors') != -1 || filterValue.search('environments') != -1) {
		if($('.filter.Interiors').is(':visible')) {
		} else {
			console.log('ya1');
			$('.filter').fadeOut();
			$('.filter.Interiors').fadeIn();	
		}
		if(!$('a.Interiors').hasClass('selected')) {
			$('a.Interiors input').prop('checked', true);
			$('a.Interiors').parents('li').addClass('selected');
		}
	} else if(filterValue.search('.sustainability') != -1) {
		$('.filter--three').fadeOut(100);
	  	$('a.sustainability input, a.Architecture input').prop('checked', true);
		$('a.sustainability, a.Architecture').parent('li').addClass('selected');
		$('.filter--two.Architecture').delay(100).fadeIn();
  	} else if(filterValue.search('.preservation') != -1) {
		console.log('filterDisplay: Preservation');
		$('a.preservation input, a.Architecture input').prop('checked', true);
// 		$('a.preservation, a.Architecture').parent('li').addClass('selected');
		$('.filter.Interiors, .filter--three.Architecture').fadeOut(0);
		$('.filter--two.Architecture,.filter--three.Preservation').delay(400).fadeIn();
	} else if(filterValue.search('.sustainability') == -1 && filterValue.search('.preservation') == -1 && !selected.parents('ul').hasClass('Interiors')) {
		$('.filter--three').fadeOut(100);
		$('.filter--three.Architecture').delay(400).fadeIn();
	} 
/*
	else if($(this).parents('.filter').hasClass('Interiors')) {
// 		console.log('tr2ue');
		$('a.Interiors input').prop('checked', true);
		$('a.Interiors').parent('li').addClass('selected');
		$('.filter.Architecture').fadeOut(100);
		$('.filter.Interiors').fadeIn();
	}
*/
/*
	else if($(this).parents('.filter').hasClass('Architecture')) {
		$('a.Architecture input').prop('checked', true);
		$('a.Architecture').parent('li').addClass('selected');
	}
*/
	}
  }
  
  $('.filter--remove').on( 'click', function() {
	all = true;
    reset(all);
  });
  
  function reset(all) {
	console.log('reset & all: '+all);
	filters = {};
	window.location.hash = '';
	$grid.isotope({ filter: '*' });
	if(all == false) {
		$('.filter a').find(':input').prop('checked', false);
		$('.filter li').removeClass('selected');
	} else {
		$('#filters a').find(':input').prop('checked', false);	
		$('#filters li').removeClass('selected');
	}
	$('.filter--two,.filter--three').fadeOut();
  }

$grid.imagesLoaded(function(){
	$('.grid-work').animate({opacity: 1});
	$grid.isotope({
		percentPosition: true,
		itemSelector: '.grid-item',
		layoutMode: 'packery',
		filter: filterSelector,
		packery: {
			gutter: 16,
		},
	});

});

$grid.on( 'arrangeComplete', function( event, filteredItems ) {
if (filteredItems.length <= 0) {
  	$('#empty').fadeIn();
} else {
	$('#empty').hide();
}
});
} //end work