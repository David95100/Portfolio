
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="../add-ptfolio<?=$data['id_register']?>" method="post">

        <label for="prenom">Prénom</label>
        <input type="text" id="name" name="name">

        <label for="nom">Nom</label>
        <input type="text" id="description" name="description">

        <label for="email">Email</label>
        <input type="text" id="date" name="date">

        <label for="msg">Message</label>
        <input type="text" id="place" name="place">

        <button>Envoyer</button>
    </form>
</body>
</html>









