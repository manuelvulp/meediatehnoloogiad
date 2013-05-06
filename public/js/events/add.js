var timer = 200;

var animationSpeed = 100;


$('input').keyup(function() {
  var inputName = $(this).attr('name');
  var inputValue = $(this).val();

  delayRequest(inputName, inputValue);
})

$('textarea').keyup(function() {
  var inputName = $(this).attr('name');
  var inputValue = $(this).val();

  delayRequest(inputName, inputValue);
})

function delayRequest(inputName, inputValue) {
  if(delayRequest.timeout) {
    clearTimeout(delayRequest.timeout);
  }

  delayRequest.timeout = setTimeout(function() {
    validateInput(inputName, inputValue);
  }, timer);
}

function validateInput(inputName, inputValue) {
  $.ajax({
    url:        'http://localhost/Meediatehnoloogiad/public/events/validate_field/',
    type:       'POST',
    data:       { inputName: inputName, inputValue: inputValue  },
    dataType:   'json',
  })
  .done(function(data) {
    parseReturn(data);
  })
  .error(function(data) {
    console.log("Error...")
  })
}

function parseReturn(returnData) {
  if (returnData.errors === 'none') {
    $('.error-' + returnData.inputName + '-text').fadeOut(animationSpeed, 'linear', function() {
      $('.error-' + returnData.inputName).find($('.checkmark')).fadeIn(animationSpeed);
    });
  } else {
    $('.error-' + returnData.inputName).find($('.checkmark')).fadeOut(animationSpeed, 'linear', function() {
      $('.error-' + returnData.inputName + '-text').fadeIn(animationSpeed);
      $('.error-' + returnData.inputName + '-text').html(returnData.errors);
    });
  }
}

