Vue.filter('default', function (value, default_value) {
  if (value) {
    return value;
  } else {
    return default_value;
  }
});
new Vue({
  el: 'form'
});

$(function() {
  $('.clouds-left').velocity({ left: -1000 }, 4000);
  $('.clouds-right').velocity({ left: 2000 }, 4000);
  $('.rain').velocity({ opacity: 0 }, 3000);
  $('.thanks-text').velocity({ opacity: 1 }, 3000);
  $('.thanks').velocity({ opacity: 1}, 3000);

  $("#receive_copy").change(function() {
    if(this.checked) {
      $('.whale').velocity({
        bottom: '25vw',
        right: '5vw',
        rotateZ: "-15deg",
      }, 1500);

      $('.explosion').velocity({
        opacity: 1
      }, {
        duration: 1500,
        delay: 1500
      });
    } else {
      $('.whale').velocity({
        bottom: '0',
        right: '0',
        rotateZ: "0deg",
      }, 1500);

      $('.explosion').velocity({
        opacity: 0
      }, 150);
    }
  });

  $('#send').on('click', function() {
    $('form').submit();
  });

})
