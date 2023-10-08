<?php

function valider($motDePasse)
{

    if (strlen($motDePasse) < 6 || strlen($motDePasse) > 10) {
        return "Erreur : Le mot de passe doit avoir entre 6 et 10 caractères.";
    }

    $sel = "XYZ456%";

    $motDePasseAvecSel = $motDePasse . $sel;

    $motDePasseChiffre = password_hash($motDePasseAvecSel, PASSWORD_BCRYPT);

    echo "Sel: $sel<br>";
    echo "Mot de passe chiffré: $motDePasseChiffre<br>";

    $motDePasseTest = "MonMotDePasse"; 

    if (password_verify($motDePasseTest . $sel, $motDePasseChiffre)) {
        return "Mot de passe correct, Merci!";
    } else {
        return "Mot de passe incorrect, svp, entrez le mot de passe valide.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST["nom"];
    $motDePasse = $_POST["motDePasse"];

    $resultatValidation = valider($motDePasse);
    echo $resultatValidation;
}

?>
