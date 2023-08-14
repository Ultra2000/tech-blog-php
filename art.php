<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=techhunt', 'root', '');

// Vérification que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération des données de l'article
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Insertion de l'article dans la base de données
    $stmt = $pdo->prepare('INSERT INTO articles (titre, description) VALUES (:title, :content)');
    $stmt->execute(array('titre' => $title, 'description' => $content));
    $article_id = $pdo->lastInsertId();

    // Parcours des chapitres soumis dans le formulaire
    for ($i = 1; isset($_POST['chapter_title_' . $i]); $i++) {

        // Récupération des données du chapitre
        $chapter_title = $_POST['chapter_title_' . $i];
        $chapter_content = $_POST['chapter_content_' . $i];

        // Enregistrement de l'image du chapitre
        $chapter_image_name = '';
        if (!empty($_FILES['chapter_image_' . $i]['name'])) {
            $chapter_image_name = $article_id . '_' . $i . '_' . $_FILES['chapter_image_' . $i]['name'];
            move_uploaded_file($_FILES['chapter_image_' . $i]['tmp_name'], 'uploads/' . $chapter_image_name);
        }

        // Insertion du chapitre dans la base de données
        $stmt = $pdo->prepare('INSERT INTO chapters (article_id, title, content, image) VALUES (:article_id, :title, :content, :image)');
        $stmt->execute(array('article_id' => $article_id, 'title' => $chapter_title, 'content' => $chapter_content, 'image' => $chapter_image_name));
    }

    // Redirection vers la page d'accueil
    header('Location: index.html');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="art.php" enctype="multipart/form-data">
    <label for="title">Titre de l'article :</label>
    <input type="text" name="title" id="title" required>
    <br>
    <label for="content">Contenu de l'article :</label>
    <textarea name="content" id="content" required></textarea>
    <br>
    <div id="chapters">
        <div class="chapter">
            <h3>Chapitre 1</h3>
            <label for="chapter_title_1">Titre du chapitre :</label>
            <input type="text" name="chapter_title_1" id="chapter_title_1" required>
            <br>
            <label for="chapter_content_1">Contenu du chapitre :</label>
            <textarea name="chapter_content_1" id="chapter_content_1" required></textarea>
            <br>
            <label for="chapter_image_1">Image du chapitre :</label>
            <input type="file" name="chapter_image_1" id="chapter_image_1">
            <hr>
        </div>
    </div>
    <button type="button" id="add_chapter">Ajouter un chapitre</button>
    <br>
    <input type="submit" value="Ajouter l'article">
</form>

<script>
    const chapterCount = 1;
    const addButton = document.getElementById('add_chapter');
    const chaptersContainer = document.getElementById('chapters');
    addButton.addEventListener('click', function() {
        const newChapterCount = chapterCount +1;
        const newChapter = document.createElement('div');
        newChapter.classList.add('chapter');
        newChapter.innerHTML = `
            <h3>Chapitre ${newChapterCount}</h3>
            <label for="chapter_title_${newChapterCount}">Titre du chapitre :</label>
            <input type="text" name="chapter_title_${newChapterCount}" id="chapter_title_${newChapterCount}" required>
            <br>
            <label for="chapter_content_${newChapterCount}">Contenu du chapitre :</label>
            <textarea name="chapter_content_${newChapterCount}" id="chapter_content_${newChapterCount}" required></textarea>
            <br>
            <label for="chapter_image_${newChapterCount}">Image du chapitre :</label>
            <input type="file" name="chapter_image_${newChapterCount}" id="chapter_image_${newChapterCount}">
            <hr>
        `;
        chaptersContainer.appendChild(newChapter);
        chapterCount = newChapterCount;
    });
</script>

</body>
</html>