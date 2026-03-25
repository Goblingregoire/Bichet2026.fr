<?php
try {
    $pdo = new PDO(
        "mysql:host=mysqlXXX.cluster121.hosting.ovh.net;dbname=nom_de_ta_base;charset=utf8",
        "ton_utilisateur",
        "ton_mot_de_passe"
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion OK"; // juste pour tester
} catch (PDOException $e) {
    die("Erreur DB : " . $e->getMessage());
}
