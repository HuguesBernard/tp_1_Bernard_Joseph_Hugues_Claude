<?php

function validation($passeword)
{
    if (strlen($passeword) < 6 || strlen($passeword) > 10) {
        return "Votre mot de passe de passe doit avoir au moins 6 caracteres et au plus 10 caracteres";
    }

    $dusel = "XYZ112%";

    $passewordAvecdusel = $passeword . $dusel;

    $passewordChiffre = hash('hugues123', $passewordAvecdusel);

    echo "Sel: $dusel<br>";
    echo "Mot de passe chiffré: $passewordChiffre<br>";

    $passewordTest = "MotDePasseTest";

    if (hash('hugues123', $passewordTest . $dusel) === $passewordChiffre) {
        return "Mot de passe correct, Merci!";
    } else {
        return "Mot de passe incorrect, svp, inserez le mot de passe valide.";
    }
}

// Test de la fonction avec un exemple de mot de passe
$motDePasseAValider = "MonMotDePasse";
$resultatValidation = validation($motDePasseAValider);
echo $resultatValidation;

?>