$(function() {
  $('.patient').addClass('active')
  $('.patient ul').addClass('show ')

  $("#dob").flatpickr({
    altInput: true,
    altFormat: "j F Y",
    dateFormat: "d-m-Y",
  });

  $("#dob").change(function() {
    var date = $(this).val();
    var dob_year = date.substring(6,10)
    var date_now = new Date().getFullYear()
    var dob_month = date.substring(3,5)
    var month_now = new Date().getMonth() + 1
    if(dob_month <= month_now) {
      $("#age").val(date_now - dob_year)
    }else {
      $("#age").val((date_now - dob_year) - 1)
    }
  })

  var id_card = new Cleave('#id_card', {
    delimiter: ' ',
    blocks: [1, 4, 5,2,1]
});

  var phone_number = new Cleave('#phone_number', {
    delimiter: '-',
    blocks: [3, 3, 4]
});

var emc_phone = new Cleave('#emc_phone', {
  delimiter: '-',
  blocks: [3, 3, 4]
});


  $('#form_add_patient').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.parsley-error').toggleClass('is-invalid', !ok);
  })
  .on('form:submit', function() {
    return false; // Don't submit form for this demo
  });
})
