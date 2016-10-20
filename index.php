<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>free citizen événements</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
        <![endif]-->
    </head>
    <body>
        <header>
        </header>
<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=biere;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

   
        require 'objets/Biere.php';
        
        echo '<h1>Adopte une biere</h1>';
        echo '<h2>Blond, brune, rousse ou ambrée</h2>';

    echo '<section id="biere">';
        $request = $bdd->query('SELECT * FROM biere_table ORDER BY date DESC');
        while ($donnees = $request->fetch(PDO::FETCH_ASSOC)){
            
            //appel au constructeur
                $biere = new Biere($donnees);
                
                //appel a la bdd
                echo $biere->id();
                echo "  ";
                echo $biere->date();
                echo "  ";
                echo $biere->lieu();
                echo "  ";
                echo $biere->type();
                echo "  ";
                echo "</br>";
            }
            $request->closeCursor();
    echo '</section>';

    echo '<section id="ajout">';
    $lieu="lieu";
    $type="type";
        echo '<h3>A Boire</h3>';
           echo '<form action="index.php" method="post">';
                echo '<select name="type">';
                    echo '<option value="pinte">pinte</option>';
                    echo '<option value="demi">demi</option>';
                echo '</select>';
                echo '<br />';
                echo '<select name="lieu">';
                    echo '<option value="grande salle">grande salle</option>';
                    echo '<option value="petite salle">petite salle</option>';
                    echo '<option value="espace triangle">espace triangle</option>';
                    echo '<option value="barbeuc">barbeuc</option>';
                    echo '<option value="entree principale">entrée principale</option>';
                    echo '<option value="club jeu">club jeu</option>';
                    echo '<option value="entree asint">entrée asint</option>';
                    echo '<option value="entree intech">entrée intech</option>';
                echo '</select>';
                echo '<br />';
               echo '<input type="submit" value="A Boire" />';
            echo '</form>';
        $lieu = htmlspecialchars($_POST['lieu']);
        $type = htmlspecialchars($_POST['type']);
        if ($lieu!="lieu" && $type!="type"){
        $req = $bdd->prepare('INSERT INTO biere_table (date, lieu, type) VALUES(NOW(),?,?)');
        $req->execute(array($_POST['lieu'], $_POST['type']));
        }
    echo '</section>';

    echo '<section id="ajout">';
    $id=0;
        echo '<h3>Bu</h3>';
           echo '<form action="index.php" method="post">';
                echo '<label for="id">Numero De Ma Biere</label> :  <input type="integer" name="id" id="id" required/><br />';
                echo '<input type="submit" value="Bu" />';
            echo '</form>';
        $id = htmlspecialchars($_POST['id']);
        if ($id!=0){
        $requete = 'DELETE FROM biere_table WHERE id = "'.$id.'"';
        $bdd->query($requete) or die ('Erreur '.$requete.' '.$bdd->error());
        }
    echo '</section>';
?>
    </body>
</html>