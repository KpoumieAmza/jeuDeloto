<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jeu de loterie </title>
    <link rel="stylesheet" href="style.css?t=<?php echo time()?>"/>
</head>
<body>
    <h1>veuillez selectionner 6 cases pour jouer</h1>
    <div id="grille">
        <?php
        for($i=1;$i<=49;$i++) {
        ?>
        <input type="button" value="<?=$i?>" id="<?=$i?>" onclick="jouer(this.value)"/>
        <?php
         if($i%7==0)
         echo "<br />";
        }
        ?>
    </div>
    <div id="selection"></div>
    <form name="fo" method="post" action="tirage.php">
        <input type="hidden" name="selection">
        <input type="submit" value="jouer" name="jouer">
    </form>
    <script>
        i=0;
        function jouer(val){
            if(i<6){
            document.getElementById(val).style.visibility="hidden";
            document.getElementById("selection").innerHTML+='<input type="button" value="'+val+'"/>';
            document.fo.selection.value+=val+" ";
             i+=1;
             if(i==6){
                document.fo.jouer.style.visibility="visible";
             }
            }
        }
    </script>
</body>
</html>