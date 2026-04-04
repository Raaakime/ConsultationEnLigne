// Affichage automatique 

  window.addEventListener('load', function () {
    const modal = new bootstrap.Modal(document.getElementById('monModal'));
    modal.show();

  });




// Affiche ou masque le bouton selon la position de la page
window.onscroll = function() {
  toggleBackToTopBtn();
};

function toggleBackToTopBtn() {
  const btn = document.getElementById("backToTopBtn");
  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    btn.style.display = "block";
  } else {
    btn.style.display = "none";
  }
}

// Fonction pour remonter en haut de la page
function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
}


