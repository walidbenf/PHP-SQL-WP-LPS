<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="view/css/style.css">
</head>
<body>
    <div>
    <a href="index.php?op=new">Ajouter quelqu'un</a>
    </div>
    <table class="contacts">
        <thead>
            <tr>
                <th>id_conducteur</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact) : ?>
            <tr>
                <td>
                    <a href="index.php?op=show&id=<?php echo $contact->id_conducteur; ?>">
                        <?php echo htmlentities($contact->prenom);?>
                    </a>
                </td>
                <td><?php echo htmlentities($contact->prenom);?></td>
                <td><?php echo htmlentities($contact->nom);?></td>
                <td>
                    <a href="index.php?op=delete&id=<?php echo $contact->id_employes; ?>">
                        Delete
                    </a>
                </td>
                <td>
                    <a href="index.php?op=update&id=<?php echo $contact->id_employes; ?>">
                        Edite
                    </a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>
