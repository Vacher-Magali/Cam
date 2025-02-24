<?php
session_start();
// On récupère la liste stockée dans la session (ou un tableau vide si rien)
$selectedItems = $_SESSION['selectedItems'] ?? [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Merci !</title>
  <link rel="stylesheet" href="salut.css">
</head>
<body>

  <!-- Conteneur pour centrer le message -->
  <div class="container">
    <!-- Titre avec effet de frappe -->
    <h1 class="typing">Merci pour Elle !</h1>
    
    <!-- Sous-titre avec effet de frappe -->
    <h2 class="typing">Tu as choisi:</h2>
    
    <!-- Liste des choix avec effet de frappe -->
    <div class="typing">
        <?php if (!empty($selectedItems)): ?>
            <ul>
                <?php foreach ($selectedItems as $selected): ?>
                    <li><?php echo htmlspecialchars($selected); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Bravo tu n'as rien séléctionner looser</p>
        <?php endif; ?>
    </div>
  </div>
</body>
</html>
