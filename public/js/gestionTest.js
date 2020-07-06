//Open modal depending on the clicked data-id
$('.container-gestion').on('click', '.popup.begin', evt => {
  $(`.modal[data-id='${$(evt.currentTarget).data('id')}']`).removeClass('hidden');

  let d = new Date();
  let h = d.getHours();
  let m = (d.getMinutes()<10?'0':'') + d.getMinutes();
  $('.startTime').html(h+':'+m);
  h++;
  $('.endTime').html(h+':'+m);
});

//Close the modal
$('.container-gestion').on('click', '.close', evt => {
  $('.modal').addClass('hidden');
})

//Confirm modal
$('.container-gestion').on('click', '.popup.end', evt => {
  $('.confirm-modal #bike_id').attr('value', $(evt.currentTarget).data('id'));
  $('.confirm-modal').removeClass('hidden');
})
$('.container-gestion').on('click', '.cancel', evt => {
  $('.confirm-modal').addClass('hidden');
})

//Check if user already in test
$('.container-gestion').on('click', 'option', evt => {
  if($(evt.currentTarget).data('busy')) {
    $('.error-busy').removeClass('hidden')
    $("input[name='submit']").attr('disabled', true).addClass('disabled')
  }
  else {
    $('.error-busy').addClass('hidden')
    $("input[name='submit']").attr('disabled', false).removeClass('disabled')
  }
})

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$('.container-gestion').on('submit', '.recherche-form', evt => {
  evt.preventDefault();
  let dataId = $(evt.currentTarget).data('id');
  let username = $(`.recherche[data-id='${dataId}']`).val();

  $.ajax({
    type: 'POST',
    url: env_url+'/searchUser',
    data: { username: username },
    success: function (data) {
      if(data.results.length > 0){
        $(`.resultsList[data-id='${dataId}']`).empty()
        data.results.forEach(user => {
          $(`.resultsList[data-id='${dataId}']`).append(`<option value='${user.id}' data-busy="${user.tests.length > 0}">${user.person.firstname} ${user.person.name} - ${user.username}</option>`);
        })
      } else {
        $(`.resultsList[data-id='${dataId}']`).html(`<option value='0'>Aucun résultat</option>`);
      }
    }
  });
});
