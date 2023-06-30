
document.addEventListener('DOMContentLoaded', function () {
  let monBoutons = document.getElementsByTagName('button');
  let xhr = new XMLHttpRequest();

  function clickhandler() {
    for (let monBouton of monBoutons) {
      monBouton.classList.remove('btn-primary');
      monBouton.classList.remove('btn');
    }
    // Récupérer les informations à envoyer
    let info = this.getAttribute('data-info');
    this.className = 'btn btn-primary';
    // Gérer la réponse
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var modalBody = document.getElementById('formulaire');
        // alert(xhr.response/Text);
        modalBody.innerHTML = xhr.responseText;
      } else if (xhr.readyState === 4 && xhr.status !== 200) {
        alert("Une erreur s'est produite lors du chargement du formulaire.");
      }
    };

    // Préparer la requête
    xhr.open(
      'GET',
      'formulaire/' + encodeURIComponent(info),
      true
    );
    // Envoyer la requête
    xhr.send();
  }

  for (let monBouton of monBoutons) {
    monBouton.classList.remove('btn-primary');
    monBouton.addEventListener('click', clickhandler);
  }
});

// --------------------------------------------------------------------------
