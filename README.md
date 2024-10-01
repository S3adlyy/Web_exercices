# Gestion des Formulaires en PHP

## Observations et Solutions

### 5. Suppression de l'attribut `name` du champ "Nom"
- **Observation** : Si vous supprimez l'attribut `name` du champ "Nom", la valeur ne sera pas envoyée lors de la soumission du formulaire. Cela signifie que la variable `$_GET["name"]` dans le fichier `contact.php` ne sera pas définie, ce qui peut entraîner une erreur ou des données manquantes.

### 6. Ouverture directe de `contact.php`
- **Observation** : Lorsque vous ouvrez directement le fichier `contact.php` sans passer par `contact.html`, les données du formulaire ne seront pas disponibles. Aucune valeur n'est envoyée, et les variables de `$_GET` ne seront pas définies, ce qui peut entraîner des erreurs.

### 7. Ajout du code pour éviter les erreurs
- **Solution** : Pour éviter les erreurs lorsque les variables `$_GET` ne sont pas définies (par exemple, si le fichier est ouvert directement), vous devez utiliser `isset()` pour vérifier si les champs existent avant de les utiliser. Voici un exemple de code modifié :

```php
<?php
if (isset($_GET["send"])) {
    $errors = []; // Tableau pour stocker les erreurs

    if (!isset($_GET["name"]) || empty($_GET["name"])) {
        $errors[] = "Ajouter un nom";
    } else {
        $name = $_GET["name"];
    }

    if (!isset($_GET["pre"]) || empty($_GET["pre"])) {
        $errors[] = "Ajouter un prénom";
    } else {
        $pre = $_GET["pre"];
    }

    if (!isset($_GET["email"]) || empty($_GET["email"])) {
        $errors[] = "Ajouter un email";
    } else {
        $email = $_GET["email"];
    }

    if (!isset($_GET["tel"]) || empty($_GET["tel"])) {
        $errors[] = "Ajouter un numéro de téléphone";
    } else {
        $tel = $_GET["tel"];
    }

    if (!isset($_GET["adr"]) || empty($_GET["adr"])) {
        $errors[] = "Ajouter une adresse";
    } else {
        $adr = $_GET["adr"];
    }

    if (!isset($_GET["code"]) || empty($_GET["code"])) {
        $errors[] = "Ajouter un code postal";
    } else {
        $code = $_GET["code"];
    }

    if (empty($errors)) {
        // Si pas d'erreurs, afficher le tableau
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>Nom</th><th>Prénom</th><th>Email</th><th>Tel</th><th>Adresse</th><th>Code Postal</th></tr>";
        echo "<tr>
                <td>$name</td>
                <td>$pre</td>
                <td>$email</td>
                <td>$tel</td>
                <td>$adr</td>
                <td>$code</td>
              </tr>";
        echo "</table>";
    } else {
        // Si des erreurs existent, les afficher
        echo "Champs manquants :<br>";
        foreach ($errors as $error) {
            echo "$error<br>";
        }
    }
}
?>
### 8. Ajouter la condition pour ne pas afficher le tableau en cas de champs manquants
- **Solution** : Si au moins un champ du formulaire n'est pas rempli, le tableau ne doit pas être affiché et un message "Champs manquants" doit être affiché. Cette condition est gérée par le tableau `$errors` dans le code PHP, qui collecte toutes les erreurs de validation. Si le tableau d'erreurs est vide, le tableau est affiché, sinon, un message d'erreur est affiché.

### 9. Suppression de la méthode `GET` dans le fichier `exercice3.html`
- **Observation** : Si vous supprimez la méthode `GET`, le formulaire utilisera par défaut la méthode `POST` pour envoyer les données. Cela signifie que le fichier `contact.php` ne pourra pas accéder aux données du formulaire via `$_GET`, et les champs seront vides ou non définis, ce qui entraînera des erreurs. Vous devrez donc modifier le code PHP pour utiliser `$_POST` à la place.

- **Solution** : Modifiez `contact.php` pour récupérer les valeurs du formulaire en utilisant `$_POST` au lieu de `$_GET`. Voici un exemple de modification :
