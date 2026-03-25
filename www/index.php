<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require 'db.php';

$isAdmin = isset($_SESSION['admin']);

// Fonction pour récupérer le contenu
function content($id, $pdo) {
    $stmt = $pdo->prepare("SELECT value FROM content WHERE identifier=?");
    $stmt->execute([$id]);
    return $stmt->fetchColumn();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Mon site</title>
<style>
.admin-edit { outline: 1px dashed red; cursor: text; }
.admin-bar { position: fixed; top:0; left:0; right:0; background:black; color:white; padding:10px; }
</style>
</head>
<body>

<?php if ($isAdmin): ?>
<div class="admin-bar">
  MODE ADMIN | <a href="logout.php" style="color:white">Déconnexion</a>
</div>
<?php endif; ?>

<h1 class="editable" data-id="home_title"><?= content('home_title', $pdo) ?></h1>
<p class="editable" data-id="home_text"><?= content('home_text', $pdo) ?></p>

<h2>Image principale</h2>
<img src="<?= content('home_image', $pdo) ?>" data-id="home_image" class="editable-img" style="max-width:300px;cursor:pointer">

<?php if ($isAdmin): ?>
<input type="file" id="upload" style="display:none">
<?php endif; ?>

<script>
const isAdmin = <?= $isAdmin ? 'true' : 'false' ?>;

if (isAdmin) {
    // Édition du texte
    document.querySelectorAll('.editable').forEach(el => {
        el.contentEditable = true;
        el.classList.add('admin-edit');
        el.addEventListener('blur', () => {
            fetch('save.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({id: el.dataset.id, value: el.innerText})
            });
        });
    });

    // Édition des images
    const uploadInput = document.getElementById('upload');
    document.querySelectorAll('.editable-img').forEach(img => {
        img.addEventListener('click', () => {
            uploadInput.dataset.id = img.dataset.id;
            uploadInput.click();
        });
    });

    uploadInput.addEventListener('change', e => {
        const file = e.target.files[0];
        const formData = new FormData();
        formData.append('image', file);
        formData.append('id', uploadInput.dataset.id);

        fetch('upload.php', { method: 'POST', body: formData })
        .then(() => location.reload());
    });
}
</script>
</body>
</html>
