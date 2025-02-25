<?php
session_start(); 
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
    "Nougat",
    "moi, qui vois"
];

// Si le formulaire est soumis
if (isset($_POST['validate'])) {
    $selectedItems = isset($_POST['items']) ? $_POST['items'] : [];
    $_SESSION['selectedItems'] = $selectedItems;
    header('Location: salut.php');
    exit;
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
    <a href="accueil.html" class="btn-return">Accueil</a>
  </nav>
<main>
  <h1>Faites votre choix</h1>

  <!-- Carte qui va flipper -->
  <div class="flip-card" id="flipCard">
    <div class="flip-card-inner" id="flipCardInner">
      <!-- Face avant (liste) -->
      <div class="flip-card-front">
        <form action="" method="post">
          <div class="red-border">
            <?php foreach ($items as $item): ?>
              <label>
                <input type="radio" name="items[]" value="<?php echo htmlspecialchars($item); ?>">
                <?php echo htmlspecialchars($item); ?>
              </label>
              <br>
            <?php endforeach; ?>
            <div class="button-row">
            <button type="submit" name="validate" class="btn-validate">Valider</button>
            <button type="button" class="btn-turn" onclick="flipCard()">Ca te dis rien !</button>
          </div>
          </div>
        </form>
      </div>
      <!-- Face arrière (description) -->
      <div class="flip-card-back">
        <div class="red-border">
        <h2>Toi qui vois!</h2>
        <p>Si la liste ne vous inspire pas, voici les préférences de Camellia</p>
         <p> Fruits: Pêche, fraise, cerise</p>
         <p> Couleurs: Rouge, noir, violet</p>
         <p> Manga: Nana, Deadpool</p>
         <p> Fleurs: Marguerites</p>
        <button type="button" class="btn-turn" onclick="flipCard()">Bon désolée, j'ai pas plus d'info</button>
      </div>
    </div>
  </div>

  <!-- Petit script pour toggler la classe flipped -->
  <script>
  function flipCard() {
    const flipCard = document.getElementById('flipCard');
    flipCard.classList.toggle('flipped');
  }
  </script>
</main>
</body>
</html>
