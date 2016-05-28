$(window).on('load', function() {
  hideAllForms();
});

$('#annoucement').click(function() {
  hideAllForms();
  $('#annoucement-form').css('display', 'block');
});

$('#assignment').click(function() {
  hideAllForms();
  $('#assignment-form').css('display', 'block');
});

var hideAllForms = function() {
  $('.forms').each(function(idx) {
    $(this).css('display', 'none');
  });
};