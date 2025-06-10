<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../filecss/cssapplication.css">
    <title>Hôtel Royal du Kafigue</title>
</head>
<body>
<!--page acceuil-->
    <div class="cadre-accueil">
        <div class="bar-navigation">
            <p style="background-color: #fff; border-radius: 0px 35px; padding: 5px 35px;">HRK</p>
            <P style="color: #fff;">ESPACE D'APPLICATION</P>
            <p class="btn-favicon"><button>&minus;</button><button>&#9632;</button><button>&times;</button></P> 
        </div>
        <div class="bienvenu"><p>Bienvenue dans l'application l'Hôtel Royal du Kafigue</p></div>
        <div class="font-image-accueil">
             <div class="btn">
            <button type="submit" class="user">Utilisateur</button>
            <button type="reset" class="quitter">Quitter</button>
        </div>
        </div>
    </div>
<!--authentification-->
  <div class="cadre-authentification">
        <div class="bar-navigation">
            <p style="background-color: orangered; border-radius: 0px 35px;">HRPK</p>
            <P>Anthentification</P>
              <p class="btn-favicon"><button>&minus;</button><button>&#9632;</button><button>&times;</button></P> 
        </div>
        <div class="bienvenu"><p>Bienvenue dans l'application de gestion des reservations</p></div>
        <div class="font-image">
            <form id="loginForm" class="form-fm">
            <label for="username">Login: </label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Mot de passe: </label>
            <input type="password" id="password" name="password" required><br>
            <button type="button" onclick="submitLoginForm()" class="suivant">Suivant</button>
        </form>
        </div>
    </div>
<!--directeur-->
  <div class="cadre-c">
        <div class="bar-navigation">
            <p style="background-color: orangered; border-radius: 0px 35px;">HRPK</p>
            <P>Directeur</P>
            <p>-</p>
            <p>carre</p>
            <P>&times;</P> 
        </div>
        <div><p>Bienvenue dans l'application de l'hotel HRPK</p></div>
        <div><p>DIRECTEUR</p></div>
        <div>
            <img src="" alt="">
            <button>Liste des reservations</button>
            <button>Liste des factures</button>
        </div>
    </div>
<!--chef de reception-->
  <div class="cadre-d">
        <div class="bar-navigation">
            <p style="background-color: orangered; border-radius: 0px 35px;">HRPK</p>
            <P>Chef des reception</P>
            <p>-</p>
            <p>carre</p>
            <P>&times;</P> 
        </div>
        <div><p>Cet espace est reservé au chef des receptionnistes</p></div>
        <div>
            <p>gestion des chmbres</p>
            <button>ajouter</button>
            <button>modifier</button>
            <button>supprimer</button>
            <p> hrpkf</p>
            <p> gestion des tarifs</p>
            <button>mise a jour </button>
            <p>gestion des facture</p>
            <button>ajouter</button>
            <button>modifier</button>
            <button>supprimer</button>
        </div>
        <div>
            <img src="kkk" alt="">

            <button>liste des chambres</button>
            <button>Liste des factures</button>
        </div>
    </div>
<!--receptionniste-->
  <div class="cadre-e">
        <div class="bar-navigation">
            <p style="background-color: orangered; border-radius: 0px 35px;">HRPK</p>
            <P>ESPACE D'APPLICATION</P>
            <p>-</p>
            <p>carre</p>
            <P>&times;</P> 
        </div>
           <div><p>Cet espace est reservé au receptionnistes</p></div>
        <div>
            <p>reservation des chambres</p>
            <button>ajouter</button>
            <button>modifier</button>
            <button>supprimer</button>
            <p> hrpkf</p>
            <p>gestion des clients</p>
            <button>ajouter</button>
            <button>modifier</button>
            <button>supprimer</button>
        </div>
        <div>
            <img src="kkk" alt="">
            
            <button>liste des reservations</button>
            <button>Liste des clients</button>
        </div>
    </div>
<!--maitre hotel-->
  <div class="cadre-f">
        <div class="bar-navigation">
            <p style="background-color: orangered; border-radius: 0px 35px;">HRPK</p>
            <P>ESPACE D'APPLICATION</P>
            <p>-</p>
            <p>carre</p>
            <P>&times;</P> 
        </div>
          <div><p>Cet espace est reservé au maitre hotal</p></div>
        <div>
            <p>gestion des salles</p>
            <button>ajouter</button>
            <button>modifier</button>
            <button>supprimer</button>
            <p> hrpkf</p>
            <p>gestion des tables</p>
            <button>ajouter</button>
            <button>modifier</button>
            <button>supprimer</button>
        </div>
        <div>
            <img src="kkk" alt="">
            
            <button>liste des reservations</button>
            <button>Liste des clients</button>
        </div>
    </div>
    <!--maitre de sport-->
    <div class="cadre-g">
        <div class="bar-navigation">
            <p style="background-color: orangered; border-radius: 0px 35px;">HRPK</p>
            <P>ESPACE DES SPORTS</P>
            <p>-</p>
            <p>carre</p>
            <P>&times;</P> 
        </div>
          <div><p>Cet espace est reservé au maitre sport & nagere</p></div>
        <div>
            <p>gestion des sports</p>
            <button>ajouter</button>
            <button>modifier</button>
            <button>supprimer</button>
            <p> hrpkf</p>
            <p>gestion des natation</p>
            <button>ajouter</button>
            <button>modifier</button>
            <button>supprimer</button>
        </div>
        <div>
            <img src="kkk" alt="">
            
            <button>liste des sportifs</button>
            <button>Liste des nageres</button>
        </div>
    </div>
<!--les formulaire des reservations-->
  <div class="cadre-h">
        <div class="bar-navigation">
            <p style="background-color: orangered; border-radius: 0px 35px;">HRPK</p>
            <P>ESPACE DES RESERVATIONS</P>
            <p>-</p>
            <p>carre</p>
            <P>&times;</P> 
        </div>
          <div><p>Formulaire des reservations</p></div>
        
        <div>
           <form action="">
            <label for="">Client</label>: <select id="link-type" onchange="changeInputMode()">
                <option value="url">URL</option>
                <option value="whatsapp">WHATSAPP</option>
                <option value="facebook">FACEBOOk</option>
                <option value="instagram">INSTAGRAM</option>
                <option value="eleve">ELEVE</option>
                <option value="etudiant">ETUDIANT</option>
                <option value="fonctionnaire">fonctionnaire</option>
                <option value="chauffeur">CHAUFFEUR</option>
            </select>
            <label for="">Date</label>:<input type="date" name="" value"" id "" require>
            <label for="">type</label>: <select id="link-type" onchange="changeInputMode()">
                <option value="url">URL</option>
                <option value="whatsapp">WHATSAPP</option>
                <option value="facebook">FACEBOOk</option>
                <option value="instagram">INSTAGRAM</option>
                <option value="eleve">ELEVE</option>
                <option value="etudiant">ETUDIANT</option>
                <option value="fonctionnaire">fonctionnaire</option>
                <option value="chauffeur">CHAUFFEUR</option>
            </select>
            <label for="">Montant</label>:<input type="text" name="" value"" id "" require>
            <button type="submit">Enregistrer</button>
           </form>
        </div>
    </div>
</body>
</html>