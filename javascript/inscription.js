document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("signupForms");
  const messageBox = document.getElementById("messageInscription");

  form.addEventListener("submit", function (e) {
    e.preventDefault(); // Empêche l'envoi automatique

    // Nettoyage du message précédent
    messageBox.textContent = "";
    messageBox.style.color = "";

    // Récupération des valeurs
    const nomInput = document.getElementById("nom");
    const nom = nomInput ? nomInput.value.trim() : "";

    const emailInput = document.getElementById("email");
    const email = emailInput ? emailInput.value.trim() : "";

    const telephoneInput = document.getElementById("telephone");
    const telephone = telephoneInput ? telephoneInput.value.trim() : "";

    const motdepasseInput = document.getElementById("motdepasse");
    const motdepasse = motdepasseInput ? motdepasseInput.value : "";

    const confirmationInput = document.getElementById("confirmation");
    const confirmation = confirmationInput ? confirmationInput.value : "";

    let message = "";

    // --- Vérifications ---
    if (nom === "") {
      message = "Le nom est requis.";
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      message = "Adresse e-mail invalide.";
    } else if (!/^\+225\d{10}$/.test(telephone)) {
      message = "Téléphone invalide. Format attendu : +225XXXXXXXX.";
    } else if (motdepasse.length < 8) {
      message = "Le mot de passe doit contenir au moins 8 caractères.";
    } else if (!/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])/.test(motdepasse)) {
      message = "Le mot de passe doit inclure une majuscule, une minuscule, un chiffre et un caractère spécial.";
    } else if (motdepasse !== confirmation) {
      message = "Les mots de passe ne correspondent pas.";
    }

    // --- Affichage ou soumission ---
    if (message !== "") {
      messageBox.textContent = message;
      messageBox.style.color = "red";
      return; // Stoppe l'envoi
    }

    // Ajout de la date d'inscription (ISO format)
    const dateInput = document.getElementById("date_inscription");
    if (dateInput) {
      dateInput.value = new Date().toISOString();
    }

    // Message visuel de confirmation
    messageBox.textContent = "Validation réussie. Envoi en cours...";
    messageBox.style.color = "green";

    // Soumission du formulaire
    form.submit();
  });
});