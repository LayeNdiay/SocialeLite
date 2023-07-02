document.addEventListener('DOMContentLoaded', function () {
  let boutons = document.querySelectorAll('.monButton');
  let forms = document.querySelectorAll('.form');
  let xhr = new XMLHttpRequest();

  function clickhandler() {
    for (let bouton of boutons) {
      bouton.classList.remove('btn-primary');
      bouton.classList.remove('btn');
    }
    for (let form of forms) {
      form.classList.remove('active');
    }
    //   // Récupérer les informations à envoyer
    let info = this.getAttribute('data-info');
    this.className = 'btn btn-primary';

    for (let form of forms) {
      if (form.classList.contains(info)) {
        form.classList.add('active');
      }
    }
  }

  for (let bouton of boutons) {
    bouton.classList.remove('btn-primary');
    bouton.addEventListener('click', clickhandler);
  }
});

// --------------------------------------------------------------------------
