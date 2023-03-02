<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Messages du formulaire</h1>
    <table>
        <thead>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Message</th>
        </thead>
        <tbody>
    <?php foreach($data as $d):?>
        <tr>
            <td><?= $d['prenom']?></td>
            <td><?= $d['nom']?></td>
            <td><?= $d['email']?></td>
            <td><?= $d['message']?></td>
            <td><a href="../one-ptfolio/<?= $d['id_register']; ?>">Ouvrir</a></td>
            <td><a href="../delete-ptfolio/<?= $d['id_register']; ?>">Supprimer</a></td>
        </tr>
    <?php endforeach;?>
    </tbody>
    </table>
</body>
</html>