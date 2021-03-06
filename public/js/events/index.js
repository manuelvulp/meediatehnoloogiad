var animationSpeed = 150;

var colorTextHover = 'white';
var colorText = 'black';

var facebookSize = 16;
var facebookWhite = 'http://localhost/Meediatehnoloogiad/public/img/logos/facebook_white.png';
var facebookBlack = 'http://localhost/Meediatehnoloogiad/public/img/logos/facebook_black.png';

$('.event').mouseenter(function() {
  $(this).stop().animate({ 
    'background-position-x': '100%',
  }, animationSpeed) 

  $(this).find($('a')).css('color', colorTextHover);

  $(this).find($('.event-facebook')).attr('src', facebookWhite);
})

$('.event').mouseleave(function() {
  $(this).stop().animate({ 
    'background-position-x': '0%',
  }, animationSpeed) 

  $(this).find($('a')).css('color', colorText);

  $(this).find($('.event-facebook')).attr('src', facebookBlack);
})