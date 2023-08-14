<?php

// Récupérer l'identifiant unique de l'article
$article_id = $_GET['id'];

// Établir une connexion à la base de données
$conn = new mysqli('localhost', 'utilisateur', 'motdepasse', 'ma_base_de_données');

// Vérifier la connexion
if ($conn->connect_error) {
    die('Erreur de connexion à la base de données : ' . $conn->connect_error);
}

// Récupérer le nombre de vues pour l'article
$stmt = $conn->prepare('SELECT view_count FROM article_views WHERE article_id = ?');
$stmt->bind_param('i', $article_id);
$stmt->execute(); 
$stmt->bind_result($view_count);
$stmt->fetch();
$stmt->close();

// Afficher le nombre de vues
echo 'Cet article a été vu ' . $view_count . ' fois.';

?>