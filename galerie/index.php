<?php
$dbrequest = new PDO('mysql:host=localhost;dbname=la galerie', 'root', '');
 if(isset($_POST['addimage']) && $_POST['addimage']){

    $dataImage=[
        'img_lien' =>'../images/'. $_FILES['image']['name'],
        'img_file' => $_FILES['image']['tmp_name']
    ];

    $data = [
        'titre' => htmlspecialchars($_post['titre']),
        
        'img_lien' => $dataImage['img_lien'],
    ];
     move_uploaded_file($data['img_file'], $dataImage['img_lien']);
 
  $addimage=$dbrequest->prepare("INSERT INTO images (titre,lien) VALUES(titre, img_lien)");
  $addimage->execute($data);
}
$getdataImage=$dbrequest->prepare('SELECT * FROM images');
$getdataImage->execute();
$images= $getdataImage->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>galerie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="addimage">
            <h1> Ajouter une image</h1>
            <div class="addimage_form">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div>
                    <label for="title"> Nom de la photo</label>
                    <input type="text" name="titre" id="titre">
                    </div>
                    <div>
                        <label for="photo">Choisir une photo
                        </label>
                        <input type="file" accept="image/png, image/jpg" name="image">
                    </div>
                    <button type="submit" name="addimage">Envoyer la photo</button>
                </form>
            </div>
        </div>
        <div class="showImage">
            <?php foreach($images as $image){ ?>

                    <div class="polaroid">
                        <div class="polaroid_image">
                            <img src="<?=$image['lien'];?>" alt="<?=$image['titre'];?>">
                        </div>
                    </div>
                <?php } ?>
        </div>
    </div>
</body>
</html>