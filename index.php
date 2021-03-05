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

//$request = $db->prepare("
//    SELECT article.id, article.title, article.content, categorie.name
//    FROM article
//    INNER JOIN categorie ON article.author_fk = categorie.id
//");

//$request->execute();

//foreach ($request as $item){
//    echo "<div>Article ".$item['id']." : ".$item['title']." : ".$item['content']." Catégorie : ".$item['name']."</div>";
//}
//
//echo "<br>";

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
//    $sqlUt = "
//        INSERT INTO utilisateur (lastName, firstName, mail, password)
//        VALUES ('Doe', 'John', 'unknown@)nowhere.fr', 'motDePasse')
//    ";
//
//    $addUt = $db->exec($sqlUt);

//    $sqlCom = "
//        INSERT INTO commentaire (content, user_fk, article_fk)
//        VALUES ('Les jointures c\'est pas si dur', 2, 1),
//               ('le SQL, il est pas cool !', 3, 2),
//               ('C\'est loin le CSS', 1, 3)
//    ";

//    $addCom = $db->exec($sqlCom);

}
catch (PDOException $exception){
    echo "add user failed : ".$exception->getMessage();
}

echo "<br>";

$request2 = $db->prepare("
    SELECT commentaire.id,commentaire.content, utilisateur.lastName, utilisateur.firstName
    FROM commentaire
        LEFT JOIN utilisateur ON commentaire.user_fk = utilisateur.id
    ORDER BY commentaire.id
");

$request2->execute();

foreach ($request2 as $com){
    echo "<div>".$com['id']." ".$com['content']." ".$com['firstName']." ".$com['lastName']."</div>";
}

