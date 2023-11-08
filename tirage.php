<?php
    $selection=trim($_POST["selection"]);
    $numeros=explode(" ", $selection);
    $tirage=array();
    for($i=0; $i<6;$i++){
       // $tirage[]=mt_rand(1,6);
       do{
        $tr=mt_rand(1,49);
       }
       while(in_array($tr,$tirage));
       $tirage[]=$tr;
    }
    $bon=0;
    for($i=0;$i<6;$i++){
        if(in_array($tirage[$i], $numeros))
        $bon++;
    }



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?t=<?php echo time()?>"/>
    <title>jeu de loterie</title>
</head>
<body>
    <h1>tirage</h1>
    <h2>Numeros joues</h2>
    <?php for($i=0; $i<6; $i++) { ?>
        <div class="numeros" ><?php echo $numeros[ $i ] ?> </div>
    <?php } ?>
    <h2>Resultat du tirage</h2>
    <?php for($i=0; $i<6; $i++) { ?>
      <div class="numeros" id="<?= $i ?>" ><?php echo $tirage[ $i ] ?> </div>
    <?php } ?>
    <h2 id="resultat"> vous avez eu <span> <?=$bon ?></span> bon(s)  numero(s)</h2>
    <script>
        document.body.onload=function(){
            num="<?=$selection?>".split(" ");
            res="<?=implode(" ",$tirage) ?>".split(" ");
            i=0;
            j=0;
            tirer();
        }
        function tirer(){
            t=setTimeout("tirer()" ,40);
            if(j<res[i]){
                j++;
                document.getElementById(i).innerHTML=j
            }else{
                j=0;
                if(i<5)
                    i++;
                else{

                }
                }
            }
        }
    </script>
</body>
</html>