<?php

/**
 * 1. Commencez par importer le script SQL disponible dans le dossier SQL.
 * 2. Connectez vous à la base de données blog.
 */

require "DbCo.php";

$pdo = new DbCo();
$db = $pdo->connect();

/**
 * 3. Sans utiliser les alias, effectuez une jointure de type INNER JOIN de manière à récupérer :
 *   - Les articles :
 *     * id
 *     * titre
 *     * contenu
 *     * le nom de la catégorie ( pas l'id, le nom en provenance de la table Categorie ).
 *
 * A l'aide d'une boucle, affichez chaque ligne du tableau de résultat.
 */

// TODO Votre code ici.

$request = $db->prepare("
    SELECT article.id, article.title, article.content, categorie.name
    FROM article
    INNER JOIN categorie ON article.author_fk = categorie.id
");

$request->execute();

foreach ($request as $item){
    echo "<div>Article ".$item['id']." : ".$item['title']." : ".$item['content']." Catégorie : ".$item['name']."</div>";
}

echo "<br>";

/**
 * 4. Réalisez la même chose que le point 3 en utilisant un maximum d'alias.
 */

// TODO Votre code ici.
$request = $db->prepare("
    SELECT ar.id, ar.title, ar.content, ca.name
    FROM article as ar
    INNER JOIN categorie as ca ON ar.author_fk = ca.id
");

$request->execute();

foreach ($request as $item){
    echo "<div>Article ".$item['id']." : ".$item['title']." : ".$item['content']." Catégorie : ".$item['name']."</div>";
}

/**
 * 5. Ajoutez un utilisateur dans la table utilisateur.
 *    Ajoutez des commentaires et liez un utilisateur au commentaire.
 *    Avec un LEFT JOIN, affichez tous les commentaires et liez le nom et le prénom de l'utilisateur ayant écris le comentaire.
 */

// TODO Votre code ici.

try {
    $sqlUt = "
        INSERT INTO utilisateur (lastName, firstName, mail, password)
        VALUES ('Doe', 'John', 'unknown@)nowhere.fr', 'motDePasse')
    ";

    $addUt = $db->exec($sqlUt);

    $sqlCo = "
        INSERT INTO commentaire (content, user_fk, article_fk)
        VALUES ('Mon super commentaire', 3, 2)
    ";

    $addCo = $db->exec($sqlCo);

}
catch (PDOException $exception){
    echo "add user failed : ".$exception->getMessage();
}
