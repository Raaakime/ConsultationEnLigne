const calendar = document.querySelector("#calendar tbody");
      const monthYear = document.querySelector("#month-year");
      const prev = document.querySelector("#prev");
      const next = document.querySelector("#next");

      let date = new Date();

      function renderCalendar() {
        calendar.innerHTML = ""; // Nettoyer le calendrier
        const month = date.getMonth();
        const year = date.getFullYear();
        monthYear.textContent = `${date.toLocaleString("fr-FR", {
          month: "long",
        })} ${year}`;

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        let row = document.createElement("tr");

        for (let i = 0; i < firstDay; i++) {
          row.appendChild(document.createElement("td"));
        }

        for (let day = 1; day <= daysInMonth; day++) {
          const cell = document.createElement("td");
          cell.textContent = day;
          row.appendChild(cell);

          if ((firstDay + day) % 7 === 0 || day === daysInMonth) {
            calendar.appendChild(row);
            row = document.createElement("tr");
          }
        }
      }

      prev.addEventListener("click", () => {
        date.setMonth(date.getMonth() - 1);
        renderCalendar();
      });

      next.addEventListener("click", () => {
        date.setMonth(date.getMonth() + 1);
        renderCalendar();
      });

      renderCalendar();
      function renderCalendar() {
        calendar.innerHTML = ""; // Nettoyer le calendrier
        const month = date.getMonth();
        const year = date.getFullYear();
        const today = new Date();

        monthYear.textContent = `${date.toLocaleString("fr-FR", {
          month: "long",
        })} ${year}`;

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        let row = document.createElement("tr");

        for (let i = 0; i < firstDay; i++) {
          row.appendChild(document.createElement("td"));
        }

        for (let day = 1; day <= daysInMonth; day++) {
          const cell = document.createElement("td");
          cell.textContent = day;

          // Appliquer la classe "selected" si c'est aujourd'hui
          if (
            day === today.getDate() &&
            month === today.getMonth() &&
            year === today.getFullYear()
          ) {
            cell.classList.add("selected");
          }

          row.appendChild(cell);

          if ((firstDay + day) % 7 === 0 || day === daysInMonth) {
            calendar.appendChild(row);
            row = document.createElement("tr");
          }
        }
      }