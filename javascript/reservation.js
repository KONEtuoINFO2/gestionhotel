
window.addEventListener('DOMContentLoaded', () => {
  // Obtenir la date du jour au format yyyy-mm-dd
  const today = new Date();
  const yyyy = today.getFullYear();
  const mm = String(today.getMonth() + 1).padStart(2, '0');
  const dd = String(today.getDate()).padStart(2, '0');
  const dateToday = `${yyyy}-${mm}-${dd}`;

  // Champ : Date de réservation (readonly)
  const dateReservation = document.getElementById("date-reservation");
  if (dateReservation) {
    dateReservation.value = dateToday;
  }

  // Champ : Date d’arrivée
  const dateArrivee = document.getElementById("date-arrivee");
  if (dateArrivee) {
    dateArrivee.value = dateToday;
    dateArrivee.min = dateToday;
  }

  // Champ : Date de départ
  const dateDepart = document.getElementById("date-depart");
  if (dateDepart) {
    dateDepart.min = dateToday;
  }

  // Ajuster date de départ dynamiquement si arrivée est modifiée
  if (dateArrivee && dateDepart) {
    dateArrivee.addEventListener("change", () => {
      const selectedArrivee = dateArrivee.value;
      dateDepart.min = selectedArrivee;

      if (dateDepart.value < selectedArrivee) {
        dateDepart.value = selectedArrivee;
      }
    });
  }
  
});
