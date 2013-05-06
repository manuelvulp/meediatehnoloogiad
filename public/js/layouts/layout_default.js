/**
 * Global animation speed
 * @type Number
 */
var animationSpeed = 150;

/**
 * Search width values
 * @type Number
 */
var searchWidth     = 200;
var searchWidthFull = 350

/**
 * Menu hover effects
 * @type String
 */
// var itemMenuColor       = '#1E1E1E';
var itemMenuColor       = 'transparent';
var itemMenuText        = 'white';
var itemMenuBox         = '0 0 0px white';

var itemMenuColorHover  = 'white';
var itemMenuTextHover   = 'black';
// var itemMenuTextHover   = '#ff009d';
var itemMenuBoxHover    = '0 0 0px white';


var itemToolbarColor       = 'white';
var itemToolbarText        = 'black';
var itemToolbarBox         = '0 0 0px white';

var itemToolbarColorHover  = 'black';
var itemToolbarTextHover   = 'white';
var itemToolbarBoxHover    = '0 0 0px white';

/**
 * Current page total height & width
 */

/*
var myWidth = 0, myHeight = 0;
if( typeof( window.innerWidth ) == 'number' ) {
  //Non-IE
  myWidth = window.innerWidth;
  myHeight = window.innerHeight;
} else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
  //IE 6+ in 'standards compliant mode'
  myWidth = document.documentElement.clientWidth;
  myHeight = document.documentElement.clientHeight;
} else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
  //IE 4 compatible
  myWidth = document.body.clientWidth;
  myHeight = document.body.clientHeight;
}
*/

// var pageHeight = Math.max( body.scrollHeight, body.offsetHeight, 
//                        html.clientHeight, html.scrollHeight, html.offsetHeight );

// var screenHeight = screen.height;
var screenHeight = getBrowserHeight();
var documentHeight = $('html').height();

// console.log(screenHeight);
// console.log(documentHeight);

if (documentHeight > screenHeight)
  var pageHeight = documentHeight;
else
  var pageHeight = screenHeight - 10;


var screenWidth = screen.width;
var documentWidth = $(document).width();

if (documentWidth > screenWidth)
  var pageWidth = documentWidth;
else
  var pageWidth = screenWidth;


/**
 *  PASSWORD 
 */

var formForgottenPassword = "I have forgotten my password :(";
var formLogin = "No wait, I remember my password";


var eventUrl = $('.urlEvents').val();
var eventViewUrl = $('.urlViewEvent').val();

/**
 * MENU ITEMS HOVER EFFECTS
 * 
 */

$(".item-menu").each(function() {
  $(this).mouseenter(function() { 
    $(this).stop().animate({ 
        backgroundColor:    itemMenuColorHover,
        color:              itemMenuTextHover
    }, animationSpeed) 

    $(this).css({ "boxShadow" : itemMenuBoxHover }) 
  })

  $(this).mouseleave(function() {
    $(this).stop().animate({ 
        backgroundColor: itemMenuColor,
        color:           itemMenuText
    }, animationSpeed) 

    $(this).css({ "boxShadow" : itemMenuBox }) 
  })
})

/**
 * SEARCH INPUT ANIMATION EFFECTS
 * 
 */

$(".input-search").focus(function () {
  $(this).animate({
    width: searchWidthFull,
  }, animationSpeed)
})

$(".input-search").focusout(function () {
  var searchQuery = $(this).val();

  if( searchQuery.length < 1 ) {
    $(this).animate({
      width: searchWidth,
    }, animationSpeed)
  }
})

$(".input-search").keyup(function() {
  var searchQuery = $(this).val();

  $.ajax({
    type: 'POST',
    url: eventUrl + 'get_all_events',
    data: { queryString: searchQuery }
  })
  .done(function(data) {
    data = jQuery.parseJSON(data);
    getResults(data);
  })
  .error(function(data) {
    // console.log('Error with getting data')
  })

  if ( searchQuery.length > 0 ) {
    $(".wrapper-search").slideDown(animationSpeed);
  } else {
    $(".wrapper-search").slideUp(animationSpeed);
  }

  if ( searchQuery.length > 0 ) {
    getResults(searchQuery.length);
  } 
})

/**
 * LOGIN ANIMATION EFFECTS
 *
 */

// console.log("Page height : " + pageHeight);

$(".login").click(function() {
  $(".wrapper-login").fadeIn(animationSpeed);
  $(".wrapper-login").css({ "height" : pageHeight })
  $(".wrapper-login").css({ "width" : pageWidth})
})

$(".wrapper-login").click(function() {
  hideIfNotChild($(this));
})

$(".text-login").html(formForgottenPassword);

$(".text-forgotten-password").click(function() {
  if ($(".forgotten-password").is(":visible"))
    $(".text-login").html(formForgottenPassword);
  else 
    $(".text-login").html(formLogin);

  $(".forgotten-password").toggle(animationSpeed);
  $(".form-login").toggle(animationSpeed);
})


/**
 *  TOOLBAR ANIMATION EFFECTS
 */

$(".item-toolbar").each(function() {
  $(this).mouseenter(function() { 
    $(this).stop().animate({ 
        backgroundColor:    itemToolbarColorHover,
        color:              itemToolbarTextHover
    }, animationSpeed) 

    $(this).css({ "boxShadow" : itemToolbarBoxHover }) 
  })

  $(this).mouseleave(function() {
    $(this).stop().animate({ 
        backgroundColor: itemToolbarColor,
        color:           itemToolbarText
    }, animationSpeed) 

    $(this).css({ "boxShadow" : itemToolbarBox }) 
  })
})

$(".item-dropdown").each(function() {
  $(this).mouseenter(function() {

    $(this).stop().animate({ 
        backgroundColor:    itemToolbarColorHover,
        color:              itemToolbarTextHover
    }, animationSpeed) 

    $(this).css({ "boxShadow" : itemToolbarBoxHover }) 
  })

  $(this).mouseleave(function() {

    $(this).stop().animate({ 
        backgroundColor: itemToolbarColor,
        color:           itemToolbarText
    }, animationSpeed) 

    $(this).css({ "boxShadow" : itemToolbarBox }) 
  })
})

$(".my-profile").mouseenter(function() {
  $(".my-profile-dropdown").fadeIn(animationSpeed);
})

$(".my-profile").mouseleave(function() {
  $(".my-profile-dropdown").fadeOut(animationSpeed);
})

$(".my-venues").mouseenter(function() {
  $(".my-venues-dropdown").fadeIn(animationSpeed);
})

$(".my-venues").mouseleave(function() {
  $(".my-venues-dropdown").fadeOut(animationSpeed);
})

/**
 * FUNCTIONS
 */

function getResults(results) {
  // console.log(results);

  $(".content-search").html("");
  var width = 0;

  

  for ( var i = 0; i < results.length; i++ ) { 
    $('.content-search').append('<a href="' + eventViewUrl + results[i].event_id + '"><div class="result-search">' + results[i].title + '</div></a>');

    width = width + 240;

    $(".content-search").stop().animate({ 
          width: width
      }, animationSpeed)
  }

  // console.log($(".content-search").width());
  searchItemMouseListeners();
}

function searchItemMouseListeners() {
  $(".result-search").each(function() {
    $(this).mouseenter(function() { 
      $(this).stop().animate({ 
          backgroundColor:    itemMenuColorHover,
          color:              itemMenuTextHover
      }, animationSpeed) 

      $(this).css({ "boxShadow" : itemMenuBoxHover }) 
    })

    $(this).mouseleave(function() {
      $(this).stop().animate({ 
          backgroundColor: itemMenuColor,
          color:           itemMenuText
      }, animationSpeed) 

      $(this).css({ "boxShadow" : itemMenuBox })
    })
  })
}

function hideIfNotChild(parent) {
  parent.mousedown(function (e) {
    if (parent.has(e.target).length === 0) {
      parent.fadeOut(animationSpeed);
    }
  })
}

function getBrowserHeight() {
  var myWidth = 0, myHeight = 0;
  if( typeof( window.innerWidth ) == 'number' ) {
    //Non-IE
    myWidth = window.innerWidth;
    myHeight = window.innerHeight;
  } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
    //IE 6+ in 'standards compliant mode'
    myWidth = document.documentElement.clientWidth;
    myHeight = document.documentElement.clientHeight;
  } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
    //IE 4 compatible
    myWidth = document.body.clientWidth;
    myHeight = document.body.clientHeight;
  }
  // window.alert( 'Width = ' + myWidth );
  // window.alert( 'Height = ' + myHeight );
  return myHeight;
}