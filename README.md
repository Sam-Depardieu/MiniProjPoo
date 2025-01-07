<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniProjPoo</title>
</head>
<body>
    <h1>MiniProjPoo</h1>

    <h2>Description</h2>
    <p>MiniProjPoo est un projet basé sur PHP qui démontre les principes de la programmation orientée objet (POO). Ce projet inclut diverses fonctionnalités telles que l'affichage d'articles, l'enregistrement de commentaires et la suppression d'articles et de commentaires.</p>

    <h2>Fonctionnalités</h2>
    <ul>
        <li><strong>Afficher les articles</strong> : Voir une liste d'articles.</li>
        <li><strong>Enregistrer des commentaires</strong> : Ajouter des commentaires aux articles.</li>
        <li><strong>Supprimer des articles</strong> : Supprimer des articles de la liste.</li>
        <li><strong>Supprimer des commentaires</strong> : Supprimer des commentaires des articles.</li>
    </ul>

    <h2>Installation</h2>
    <ol>
        <li>Clonez le dépôt :
            <pre><code>git clone https://github.com/Sam-Depardieu/MiniProjPoo.git</code></pre>
        </li>
        <li>Accédez au répertoire du projet :
            <pre><code>cd MiniProjPoo</code></pre>
        </li>
        <li>Configurez votre base de données en utilisant le fichier <code>blogpoo.sql</code>.</li>
    </ol>

    <h2>Utilisation</h2>
    <p>Ouvrez <code>index.php</code> dans votre navigateur pour voir la liste des articles. Utilisez les formulaires fournis pour ajouter des commentaires ou supprimer des articles et des commentaires.</p>

    <h2>Structure des fichiers</h2>
    <ul>
        <li><code>index.php</code> : Affiche la liste des articles.</li>
        <li><code>article.php</code> : Affiche un article et ses commentaires.</li>
        <li><code>save-comment.php</code> : Gère l'enregistrement des commentaires.</li>
        <li><code>delete-article.php</code> : Gère la suppression des articles.</li>
        <li><code>delete-comment.php</code> : Gère la suppression des commentaires.</li>
        <li><code>blogpoo.sql</code> : Fichier SQL pour configurer la base de données.</li>
    </ul>

    <h2>Contribuer</h2>
    <p>N'hésitez pas à forker ce dépôt et à soumettre des pull requests. Pour les changements majeurs, veuillez d'abord ouvrir une issue pour discuter de ce que vous souhaitez modifier.</p>

    <h2>Licence</h2>
    <p>Ce projet est sous licence MIT.</p>
</body>
</html>
