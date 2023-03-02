<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
</head>
<body>
<h1> Message</h1>
    <table>
        <thead>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Message</th>
        </thead>
        <tbody>
        <tr>
            <td><?= $data[0]['prenom']?></td>
            <td><?= $data[0]['nom']?></td>
            <td><?= $data[0]['email']?></td>
            <td><?= $data[0]['message']?></td>
        </tr>
    </tbody>
    </table>
</body>
</html>