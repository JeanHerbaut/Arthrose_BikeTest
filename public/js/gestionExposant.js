// Get the modal
let modal = document.getElementById("myModal");

// Get the button that opens the modal
let btn = document.getElementsByClassName("popup")[0];

// Get the <span> element that closes the modal
let span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function () {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

//requette ajax
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$('#company-select').on('change', evt => {
  evt.preventDefault()
  let companyId = $("#company-select option:selected").val();


  $.ajax({
    type: 'POST',
    url: env_url+'/gestion-exposant',
    data: { companyId: companyId },
    success: function (data) {
      $('.wrapper-velos').empty()
      $('#company').empty()
      $('.nothing').empty()
      $('.collaborateurs').empty()
      $('#company').append('<p>' + data.company[0].name + '</p>')
      data.users.forEach(user => {
        let html = '<p>' + user.person.firstname + ' ' + user.person.name + '</p>'
        $('.collaborateurs').append(html)
      });
      if (data.bikes.length > 0) {
        data.bikes.forEach(product => {
          product.bikes.forEach(element => {
            let html =
              '<div class="vignette-test">'
              + '<img class="velo-img" src="' + env_url + product.image + '" alt="">'
              + '<p><strong>' + product.shortDesc + '</strong></p>'
              + '<p>' + product.brand.name + '</p>';
            $('.wrapper-velos').append(html);
          });
        });
      } else {
        let html = "<p>Cet exposant n'a pas de produits à afficher</p>"
        $('.nothing').append(html)
      }
    }
  });
})
