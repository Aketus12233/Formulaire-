<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $situation_matrimoniale = $_POST['situation_matrimoniale'];
    $num_carte_identite = $_POST['num_carte_identite'];
    $date_naissance = $_POST['date_naissance'];
    $profession = $_POST['profession'];
    $salaire_mensuel = $_POST['salaire_mensuel'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $montant_pret = $_POST['montant_pret'];
    $duree = $_POST['duree'];
    
    // Calcul des mensualités
    $taux_interet = 2.70; // Taux d'intérêt
    $mensualite = ($montant_pret * ($taux_interet / 100) / 12) / (1 - (1 + $taux_interet / 100 / 12) ** (-$duree));
    $mensualite = round($mensualite, 2);
    
    // Envoyer l'email
    $to = "flexcredit49@gmail.com";
    $subject = "Nouvelle demande de prêt";
    $message = "Nom: $nom\nPrénom: $prenom\nSituation Matrimoniale: $situation_matrimoniale\nNuméro de la carte d'identité: $num_carte_identite\nDate de naissance: $date_naissance\nProfession: $profession\nSalaire Mensuel: $salaire_mensuel\nEmail: $email\nNuméro de téléphone: $telephone\nMontant du prêt: $montant_pret\nDurée (mois): $duree\nMensualité: $mensualite €";
    $headers = "From: $email";
    
    mail($to, $subject, $message, $headers);
    
    // Message de confirmation
    echo "<h2>Votre demande de prêt est soumise. Nous allons étudier votre dossier et vous faire un retour.</h2>";
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire de Prêt</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Leningsaanvraag</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nom">Naam:</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Voornaam:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="situation_matrimoniale">Burgerlijke staat:</label>
                <select class="form-control" id="situation_matrimoniale" name="situation_matrimoniale" required>
                    <option value="single">Alleenstaand</option>
                    <option value="getrouwd">Getrouwd</option>
                    <option value="gescheiden">Gescheiden</option>
                </select>
            </div>
            <div class="form-group">
                <label for="num_carte_identite">Nummer van de identiteitskaart:</label>
                <input type="text" class="form-control" id="num_carte_identite" name="num_carte_identite" required>
            </div>
            <div class="form-group">
                <label for="date_naissance">Geboortedatum:</label>
                <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
            </div>
            <div class="form-group">
                <label for="profession">Beroep:</label>
                <input type="text" class="form-control" id="profession" name="profession" required>
            </div>
            <div class="form-group">
                <label for="salaire_mensuel">Maandinkomen:</label>
                <input type="number" class="form-control" id="salaire_mensuel" name="salaire_mensuel" required>
            </div>
            <div class="form-group">
                <label for="email">E-mailadres:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="telephone">Telefoonnummer:</label>
                <input type="text" class="form-control" id="telephone" name="telephone" required>
            </div>
            <div class="form-group">
                <label for="montant_pret">Bedrag van de lening (€):</label>
                <input type="number" class="form-control" id="montant_pret" name="montant_pret" required>
            </div>
            <div class="form-group">
                <label for="duree">Looptijd van de lening (in maanden):</label>
                <input type="number" class="form-control" id="duree" name="duree" required>
            </div>
            <button type="submit" class="btn btn-primary">Verzenden</button>
        </form>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>>