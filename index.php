<?php
$bdd = new PDO('mysql:host=localhost;dbname = messagerie;charset=utf8;', 'root', ''); 

 if(isset($_POST['valider'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['message'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $message = nl2br(htmlspecialchars($_POST['message']));

        $insererMessage = $bdd->prepare('INSERT INTO message(pseudo,message) VALUES(?, ?)');
        $insererMessage->execute(array($pseudo, $message));

    }else{
        echo"veuillez completer tous champs...";
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>messagerie instatanee</title>
</head>
<body>
    <form method="POST" action="" align="center" >
        <input type="text" name="pseudo">
        <br><br>
        <textarea name="message" ></textarea>
        <br>
        <input type="submit" name="valider">
    </form>
    <section id="message"></section>
</body>
</html>