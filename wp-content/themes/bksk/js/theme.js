$('.toplink').click(function(e){
	e.preventDefault();
		$('html, body').animate({scrollTop : 0},600);
		return false;
	});

function dynamicSize() {
	var width = $(document).width();
	if($('body').hasClass('page-template-page-inspiration') || $('body').hasClass('page-template-page-instagram')) {
		console.log('big');
		if(width >= 1200) {
			$('.item').removeClass('fourcol twocol').addClass('fivecol');
		}
		else if(width < 1200 && width >= 768) {
			$('.item').removeClass('fivecol twocol').addClass('fourcol');
		}
		else if(width < 767 && width >= 490) {
			$('.item').removeClass('fivecol fourcol').addClass('twocol');
		} 
		if(w > 320 && menu.is(':hidden')) {
			  menu.removeAttr('style');
		}
	}
}
	
$(document).ready(function(){
	dynamicSize();
});	

$(window).resize(function() {
	dynamicSize();
		var w = $(window).width();
		if(w > 490 && menu.is(':hidden')) {
			  menu.removeAttr('style');
		}
});

  var pull    = $('#pull');
    menu    = $('.menu-navigation-container ul');
    menuHeight  = menu.height();
 
  $(pull).on('click', function(e) {
    e.preventDefault();
    menu.slideToggle();
  });
  
if($('body').hasClass('page-template-page-interiors')) {
	var section1 = $('.section1').html();
	console.log(section1);
	var w = $(window).width();
// 	if(w >= 1200) {
// 		$('.twocol.container').append(section1);
// 		$('.fourcol .section1').remove();
// 	}
} else if($('body').hasClass('page-template-page-mobile')) {	
	var w = $(window).width();
	if (w > 900) {
		document.location = "/";
	} else {
		$('#main').animate({opacity:1});
	}

$(window).resize(function() {
	var w = $(window).width();
	if(w > 900) {
		if($('.home--mobile').is(':visible')) {
		  $('.home--mobile').animate({opacity:0});
		  $('#message').animate({opacity:1});
		}
	} else {
// 		if($('#main').is(':hidden')) {
			$('#message').animate({opacity:0});
			$('.home--mobile').animate({opacity:1});
// 		}
	}
});

} else if($('body').hasClass('home')) {
$(document).ready(function(){
	var w = $(window).width();
	if (w <= 900) {
		document.location = "mobile";
	} else {
		$('#main').delay(0).animate({opacity: 1});
	}
});

$(window).resize(function() {
	var w = $(window).width();
	if(w < 900) {
		if($('.home--browser').is(':visible')) {
		  $('.home--browser').animate({opacity:0});
			 $('#message').animate({opacity:1}); 
		}
	} else {
// 		if($('#main').is(':hidden')) {
			$('#message').animate({opacity:0});
			$('.home--browser').animate({opacity:1});
// 		}
	}
});

	var $grid = $('.grid');
	$grid.imagesLoaded(function(){
		$('.grid').masonry({
			percentPosition: true,
			columnWidth: '.grid-sizer',
			gutter: '.gutter-sizer',
			itemSelector: '.item'
		});	
	});
} else if($('body').hasClass('post-type-archive-lab')) {
	var $grid = $('.grid-lab');
	$grid.imagesLoaded(function(){
		$grid.masonry({
			percentPosition: true,
			columnWidth: '.grid-sizer',
			itemSelector: '.threecol'
		});	
		console.log('grid');
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
			gutter: '.gutter-sizer',
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

var slideID;

$('.grid-item--partner').on('click', function(){
	slideID = $(this).data('slide-id');
	console.log(slideID);
	overlay(slideID);
});

function overlay(slideID) {	
// 	var this = $('.grid-item--partner').find()
	var slide = $('[data-slide-id="'+slideID+'"]');
	totalSlides = $(".grid-item--partner").length;
	console.log(slide);
	var id = $(slide).data('id');
	var name = $(slide).find('a').data('name');
	var title = $(slide).find('a').data('title');
	var credentials = $(slide).find('a').data('credentials');
	var bio = $(slide).find('a').data('bio');
	var img = $(slide).find('a').data('largesrc');
	var resume = $(slide).find('a').data('resume');
	var link = $(slide).find('a').data('link');
	var resumeText;
	if(resume == '') {
		resumeText = '';
	} else {
		resumeText = '<a target="_blank" href="'+resume+'">Resume</a>';
	}
	console.log(id, link);
	partnerSub(id, link);
	$('.overlay').addClass('open');
	$('.overlay .content').html('<header><h2><img class="header-img" src="'+img+'" /><span class="comma">'+name+'</span> <span class="small">'+credentials+'</span></h2><h3>'+title+'</h3></header><article><div class="left">'+bio+resumeText+'</div><div class="right"><img src="'+img+'" /></div><div class="sub"></div></article>');
}

$('.close').on('click', function(){
	console.log("fa");
	$('.overlay').removeClass('open');
});

function partnerSub(currentID, link) {
    $.ajax({
        type: "POST",
        url: "/overlay-team.php",
        data: {
            id: currentID
        },
        success: function(data) {
	        console.log(data);
	        $('.sub').append(data);
	    }
    });
}

$(".prev, .next").click(function() {
	if ($(this).hasClass("next")){
	  if (slideID != totalSlides){
	    slideID++;
	  } else {
	    slideID = 1;
	  }
	} else{
	  if (slideID != 1){
	    slideID--;
	  } else {
	    slideID = totalSlides;
	  }
	}
	dataID = $('[data-slide="' + slideID + '"]').attr("id");
	overlay(slideID);
	return false;
});


// Grid.init();

$('.grid-item--staff').hover(
  function() {
    $( this ).removeClass( "bw" );
  }, function() {
    $( this ).addClass( "bw" );
  }
 );	

} else if($('body').hasClass('page-template-page-recognition') || $('body').hasClass('page-id-5361') || $('body').hasClass('tag')) {

var headers = $('.accordion-header');
var contentAreas = $('.accordion-content').hide();
var expandLink = $('.accordion-expand-all');

// add the accordion functionality
headers.click(function() {
	var arrow = $(this).find('.arrow');
    var panel = $(this).next();
    var isOpen = panel.is(':visible');
 
    // open or close as necessary
    panel[isOpen? 'slideUp': 'slideDown']()
        // trigger the correct custom event
        .trigger(isOpen? 'hide': 'show');
    
    arrow.toggleClass('open');

    // stop the link from causing a pagescroll
    return false;
});

// hook up the expand/collapse all
expandLink.click(function(){
    var isAllOpen = $(this).data('isAllOpen');
    
    contentAreas[isAllOpen? 'hide': 'show']()
        .trigger(isAllOpen? 'hide': 'show');
});

// when panels open or close, check to see if they're all open
contentAreas.on({
    // whenever we open a panel, check to see if they're all open
    // if all open, swap the button to collapser
    show: function(){
        var isAllOpen = !contentAreas.is(':hidden');   
        if(isAllOpen){
            expandLink.text('Collapse All')
                .data('isAllOpen', true);
        }
    },
    // whenever we close a panel, check to see if they're all open
    // if not all open, swap the button to expander
    hide: function(){
        var isAllOpen = !contentAreas.is(':hidden');
        if(!isAllOpen){
            expandLink.text('Expand all')
            .data('isAllOpen', false);
        } 
    }
});

function replaceMentions ( text ) {
    return text.replace(/@([a-z\d_]+)/ig, '<a href="http://twitter.com/$1">@$1</a>'); 
}

function replaceHash( text ) {
    return text.replace(/#([a-zA-Z0-9]+)/g, '<a href="http://twitter.com/hashtag/$1">#$1</a>'); 
}

var user = 'bkskarchitects';
$.ajax({
	url: '/twitterproxy.php?url='+encodeURIComponent('statuses/user_timeline.json?screen_name='+user+'&count=4'), 
	type: 'GET',
	success: function(data) {
		var tweet_array = [];
		for(i in data) {
			console.log(data);
			var tweet_data = data[i]
			var tweet = tweet_data.text;
			tweet = tweet.replace(/(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig, function(url) {
				return '<a href="'+url+'">'+url+'</a>';
			}).replace(/B@([_a-z0-9]+)/ig, function(reply) {
				return  reply.charAt(0)+'<a href="http://twitter.com/'+reply.substring(1)+'">'+reply.substring(1)+'</a>';
			});
			tweet = replaceMentions(tweet);
			tweet = replaceHash(tweet);
			var date = tweet_data.created_at,
			split = date.split(' '),
			newDate = split[1]+' '+split[2];
			name = tweet_data.user.screen_name;
			var text = '<span class="gray"><a href="http://twitter.com/'+name+'" target="_blank">@'+name+'</a> - '+newDate+'</span><p>'+tweet+'</p>';
			tweet_array.push(text);
			var tweet_display = tweet_array.join('');
			$(".twitter").html(tweet_array);
		}
	},
	error: function(data) { console.log(data); }
});
	
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

} else if($('body').hasClass('single-work')) {	

$(document).on('ready', function(){
	setMaxWidth();
	
    $( window ).bind( "resize", setMaxWidth );
    
    function setMaxWidth() {
    	$( "#slides img" ).css( "maxWidth", ( $( window ).width() * 0.9 | 0 ) + "px" );
    }
    
/*
    function unifyHeights() {
        var maxHeight = 0;
        $('.slick-track').children('img').each(function() {
            var height = $(this).outerHeight();
            // alert(height);
            if ( height > maxHeight ) {
                maxHeight = height;
            }
        });
        $('img').css('height', maxHeight);
    }
    unifyHeights();
*/
   
});
$('#slides').slick({
  centerMode: true,
  centerPadding: '3%',
  slidesToShow: 1,
  variableWidth: true,
  draggable: true,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerPadding: '0'
      }
    }
  ]
});
	
} else if($('body').hasClass('post-type-archive-work')) {

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
    console.log('class'+class);
	$(class).addClass('grid-item--featured');	
    
    if ( $grid.data('isotope') ) {
	  buttonFilter = filterSelector;
      $grid.isotope();
    }

    window.location.hash = filterSelector;

    return false;

  });

  // quick search regex
	var qsRegex;
	var buttonFilter;
	
	// use value of search field to filter
var $quicksearch = $('.quicksearch').keyup( debounce( function() {
  qsRegex = new RegExp( $quicksearch.val(), 'gi' );
  $grid.isotope();
}) );
	
// debounce so filtering doesn't happen every millisecond
function debounce( fn, threshold ) {
  var timeout;
  return function debounced() {
    if ( timeout ) {
      clearTimeout( timeout );
    }
    function delayed() {
      fn();
      timeout = null;
    }
    setTimeout( delayed, threshold || 100 );
  };
}

  // if there was a filter, trigger click on corresponding option
  if ( filterSelector ) {
// 	  console.log(filterSelector);
	buttonFilter = filterSelector;
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

	}
  }
  
  $('.filter--remove').on( 'click', function() {
	all = true;
    reset(all);
  });
  
  function reset(all) {
	console.log('reset & all: '+all);
	$('.quicksearch').val('');
	buttonFilter = '';
	qsRegex = '';
	window.location.hash = '';
	filters = {};
	$grid.isotope();
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
// 		filter: filterSelector,
		filter: function() {
	    	var $this = $(this);
			var searchResult = qsRegex ? $this.find('h3').text().match( qsRegex ) : true;
			var buttonResult = buttonFilter ? $this.is( buttonFilter ) : true;
			return searchResult && buttonResult;
	  },
		packery: {
			gutter: '.gutter-sizer',
		},
	});

});

$grid.on( 'arrangeComplete', function( event, filteredItems ) {
// 	console.log('arrangecomplete'+filter);
if (filteredItems.length <= 0) {
  	$('#empty').fadeIn();
} else {
	$('#empty').hide();
}
});
} //end work