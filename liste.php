<?php
// Tableau d'éléments à cocher
$items = [
    "Red Bull: Juneberry",
    "Red Bull: mûre givrée",
    "Onigiri au thon pimenté",
    "Onigiri poulet yakitori",
    "Malteser",
    "Bière saveur pêche",
    "Nouilles poulet",
    "Bubble tea B'n Tea: pralino pistache avec billes tapiocas",
    "Nougat"
];

// Tableau pour stocker les éléments sélectionnés
$selectedItems = [];

// Si le formulaire est soumis
if (isset($_POST['validate'])) {
    // On récupère les items cochés (ou un tableau vide s'il n'y en a pas)
    $selectedItems = isset($_POST['items']) ? $_POST['items'] : [];
    // Ici, on peut ajouter une logique de traitement (ex: enregistrement en BDD)
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="liste.css">
  <title>Ma liste de choix</title>
</head>
<body>

  <!-- Barre de navigation -->
  <nav>
    <!-- Lien ou bouton pour retourner à la page d'accueil -->
    <a href="accueil.html" class="btn-return">Accueil</a>
  </nav>

  <h1>Faites votre choix</h1>

  <!-- Formulaire avec les cases à cocher -->
  <form action="" method="post">
    <!-- Conteneur avec bordure rouge -->
    <div class="red-border">
      <?php foreach ($items as $item): ?>
        <label>
          <input type="checkbox" name="items[]" value="<?php echo htmlspecialchars($item); ?>">
          <?php echo htmlspecialchars($item); ?>
        </label>
        <br>
      <?php endforeach; ?>
    </div>

    <!-- Bouton pour valider la sélection -->
    <button type="submit" name="validate" class="btn-validate">Valider</button>
  </form>

  <!-- Affichage des éléments validés -->
  <?php if (isset($_POST['validate'])): ?>
    <div class="selected-items">
      <h2>Vous avez sélectionné :</h2>
      <?php if (!empty($selectedItems)): ?>
        <ul>
          <?php foreach ($selectedItems as $selected): ?>
            <li><?php echo htmlspecialchars($selected); ?></li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p>Aucun élément sélectionné.</p>
      <?php endif; ?>
    </div>
  <?php endif; ?>

</body>
</html>
