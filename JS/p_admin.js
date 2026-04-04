
// Animation pour afficher/masquer la sidebar avec flèche
document.getElementById("toggleSidebar").addEventListener("click", function () {
  const sidebar = document.getElementById("sidebar");
  const content = document.getElementById("content");
  const toggleIcon = document.getElementById("toggleSidebar");

  // Ajoute ou retire la classe "collapsed"
  sidebar.classList.toggle("collapsed");
  content.classList.toggle("collapsed");

  // Animation de rotation pour la flèche
  toggleIcon.classList.toggle("rotate");
});

// Fonction pour animer les chiffres
function animateNumbers(elementId, endValue, duration) {
  let startValue = 0;
  const increment = endValue / (duration / 20);

  const interval = setInterval(() => {
    startValue += increment;
    if (startValue >= endValue) {
      startValue = endValue;
      clearInterval(interval);
    }
    document.getElementById(elementId).textContent = Math.floor(startValue);
  }, 20);
}

// Exemple d'animation pour les cartes
animateNumbers("users", 150, 1000); // 150 en 1 seconde
animateNumbers("revenues", 800, 1000);
animateNumbers("alerts", 10, 1000);

    // Configuration du graphique
      const ctx = document.getElementById('consultationChart').getContext('2d');
      const consultationChart = new Chart(ctx, {
        type: 'line', // Type de graphique linéaire
        data: {
          labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'], // Mois
          datasets: [
            {
              label: 'Consultations',
              data: [30, 50, 45, 60, 70, 65, 80, 90, 75, 85, 95, 100], // Nombre de consultations par mois
              borderColor: 'rgba(75, 192, 192, 1)', // Couleur de la ligne
              backgroundColor: 'rgba(75, 192, 192, 0.2)', // Couleur d'arrière-plan sous la ligne
              borderWidth: 2, // Épaisseur de la ligne
              tension: 0.4, // Courbure de la ligne
            },
          ],
        },
        options: {
          responsive: true, // Responsivité pour tous les écrans
          plugins: {
            legend: {
              display: true, // Affiche la légende
              position: 'top',
            },
          },
          scales: {
            y: {
              beginAtZero: true, // Commence à zéro pour l'axe Y
            },
          },
        },
      });
