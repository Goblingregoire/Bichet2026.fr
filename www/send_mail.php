<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

/* ======================
   Vérification méthode
====================== */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'message' => 'Méthode non autorisée'
    ]);
    exit;
}

/* ======================
   Nettoyage des données
====================== */
$nom       = trim($_POST['nom'] ?? '');
$prenom    = trim($_POST['prenom'] ?? '');
$adresse   = trim($_POST['adresse'] ?? '');
$telephone = trim($_POST['telephone'] ?? '');
$email     = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
$sujet     = trim($_POST['sujet'] ?? '');
$message   = trim($_POST['message'] ?? '');
$accept    = isset($_POST['acceptation']);

if (
    !$nom || !$prenom || !$adresse || !$telephone ||
    !$email || !$sujet || !$message || !$accept
) {
    echo json_encode([
        'success' => false,
        'message' => 'Tous les champs sont obligatoires'
    ]);
    exit;
}

try {
    $mail = new PHPMailer(true);

    /* ======================
       Configuration SMTP OVH
    ====================== */
    $mail->isSMTP();
    $mail->Host       = 'ssl0.ovh.net';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'contact@bichet2026.fr';
    $mail->Password   = 'MarignyBICHET2026@';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;
    $mail->CharSet    = 'UTF-8';

    /* ======================
       EMAIL ADMIN
    ====================== */
    $mail->setFrom('contact@bichet2026.fr', 'Site Bichet 2026');
    $mail->addAddress('contact@bichet2026.fr');
    $mail->addReplyTo($email, "$prenom $nom");

    $mail->isHTML(true);
    $mail->Subject = "📩 Nouveau message – $sujet";
    $mail->Body = "
        <div style='font-family: Arial, sans-serif; max-width:600px; margin:auto;'>
            <a href='https://bichet2026.fr'>
                <img src='https://bichet2026.fr/logo.png' alt='Bichet 2026' style='max-width:200px;'>
            </a>
            <h2>Nouveau message depuis le site</h2>
            <p><strong>Nom :</strong> $nom</p>
            <p><strong>Prénom :</strong> $prenom</p>
            <p><strong>Adresse :</strong> $adresse</p>
            <p><strong>Téléphone :</strong> $telephone</p>
            <p><strong>Email :</strong> $email</p>
            <hr>
            <p><strong>Message :</strong><br>$message</p>
        </div>
    ";

    $mail->send();

    /* ======================
       EMAIL CONFIRMATION UTILISATEUR
    ====================== */
    $mail->clearAddresses();
    $mail->addAddress($email, "$prenom $nom");

    $mail->Subject = "✅ Votre message a bien été envoyé";
    $mail->Body = "
        <div style='font-family: Arial, sans-serif; max-width:600px; margin:auto; text-align:center;'>
            <a href='https://bichet2026.fr'>
                <img src='https://bichet2026.fr/logo.png' alt='Bichet 2026' style='max-width:180px; margin-bottom:20px;'>
            </a>
            <h2>Merci pour votre message</h2>
            <p>Bonjour <strong>$prenom</strong>,</p>
            <p>
                Votre message a bien été envoyé.<br>
                Nous vous répondrons dans les plus brefs délais.
            </p>
            <p style='margin-top:30px;'>— L’équipe Bichet 2026</p>
        </div>
    ";

    $mail->send();

    echo json_encode([
        'success' => true,
        'message' => 'Votre message a bien été envoyé. Merci pour votre contact.'
    ]);

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Erreur lors de l’envoi du message.'
    ]);
}
