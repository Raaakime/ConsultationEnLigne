 function toggleNotifications() {
        var notificationContainer = document.getElementById(
          "notifications-table"
        );
        var messageDrawer = document.getElementById("message-drawer");
        var userMenu = document.getElementById("user-action-menu");

        // Fermer les autres popups
        messageDrawer.style.display = "none";
        userMenu.style.display = "none";

        // Basculer l'affichage de la popup de notifications
        if (notificationContainer.style.display === "none") {
          notificationContainer.style.display = "block";
        } else {
          notificationContainer.style.display = "none";
        }
      }

      function toggleMessageDrawer() {
        var notificationContainer = document.getElementById(
          "notifications-table"
        );
        var messageDrawer = document.getElementById("message-drawer");
        var userMenu = document.getElementById("user-action-menu");

        // Fermer les autres popups
        notificationContainer.style.display = "none";
        userMenu.style.display = "none";

        // Basculer l'affichage du tiroir des messages
        if (messageDrawer.style.display === "none") {
          messageDrawer.style.display = "block";
        } else {
          messageDrawer.style.display = "none";
        }
      }

      function toggleUserMenu() {
        let notificationContainer = document.getElementById(
          "notifications-table"
        );
        let messageDrawer = document.getElementById("message-drawer");
        let userMenu = document.getElementById("user-action-menu");

        // Fermer les autres popups
        notificationContainer.style.display = "none";
        messageDrawer.style.display = "none";

        // Basculer l'affichage du menu utilisateur
        if (userMenu.style.display === "none") {
          userMenu.style.display = "block";
        } else {
          userMenu.style.display = "none";
        }
      }