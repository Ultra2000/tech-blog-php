
<?php
// Récupérer l'identifiant unique de l'article
$article_id = $_GET['id'];

// Établir une connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'techhunt');

// Vérifier la connexion
if ($conn->connect_error) {
    die('Erreur de connexion à la base de données : ' . $conn->connect_error);
}

// Vérifier si une vue existe déjà pour cet article
$stmt = $conn->prepare('SELECT id, view_count FROM article_views WHERE article_id = ?');
$stmt->bind_param('i', $article_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Si une vue existe déjà, mettre à jour le nombre de vues
    $stmt->bind_result($view_id, $view_count);
    $stmt->fetch();
    $view_count++;
    $stmt->close();
    $stmt = $conn->prepare('UPDATE article_views SET view_count = ? WHERE id = ?');
    $stmt->bind_param('ii', $view_count, $view_id);
    $stmt->execute();
} else {
    // Si aucune vue n'existe, insérer une nouvelle ligne dans la table
    $stmt->close();
    $stmt = $conn->prepare('INSERT INTO article_views (article_id, view_count) VALUES (?, 1)');
    $stmt->bind_param('i', $article_id);
    $stmt->execute();
}

// Fermer la connexion à la base de données
$stmt->close();
$conn->close();

?>
