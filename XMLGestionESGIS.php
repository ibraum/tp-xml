<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="box-sizing: border-box; padding:  0px 50px;  width: 100%; height: 100vh; display: flex; align-items: center;  justify-content: space-around;  position: relative;  font-family: 'verdana'; ">
<style>
    body::after{
        content: "@Projet XML (affichage par PHP)";
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        font-weight: bolder;
        z-index: -1;
        background-color: rgb(237, 121, 79);
    }
    #div1{
        box-shadow: 0px 0px 5px 2px hsla(0, 0%, 0%, 0.05); border-radius: 5px; padding: 20px 20px; margin: 20px 40px; background-color: white; display: flex; align-items: center; justify-content: center; width: 320px; height: 320px; transition: all 0.2s 0.1s ease-in-out; cursor: pointer;
    }
    #div2{
        background-color: rgb(237, 121, 79); box-shadow: 0px 0px 5px 2px hsla(0, 0%, 0%, 0.2);  border-radius: 5px; padding: 10px 20px; margin: 5px; display: flex; flex-direction: column; align-items: start; justify-content: space-evenly; width: 300px; height: 300px; transition: all 0.2s 0.1s ease-in-out; cursor: pointer;
    }
    #div1:hover{
        background-color: rgb(237, 121, 79);
        transform: scale(1.1);
    }
    #div1:hover #div2{
        background-color: white;
        transform: scale(0.9);
    }
</style>

<?php
echo "<center style=\" border: 5px solid rgba(237, 121, 79, 0.5); position: fixed; top: 10px; left: 10px; right: 10px; padding: 10px 20px;  border-radius: 10px; box-shadow: 0px 0px 10px 1px rgba(0, 0, 0, 0.15); font-size: 0.8rem;\"> <h1>Etudiants ayant une moyenne supérieure ou égale à 10</h1></center>";
// Chemin vers le fichier XML
$chemin_fichier_xml = "XMLGestionESGIS.xml";

// Chargement du fichier XML
$xml = simplexml_load_file($chemin_fichier_xml);

// Vérifier si le chargement du fichier s'est bien déroulé
if ($xml === false) {
    die("Error");
}

foreach ($xml->etudiants->etudiant as $etudiant) {
    $moyenne = (($etudiant->UE->Notes->Devoir) + ($etudiant->UE->Notes->Examen)) / 2;
    if ($moyenne >= 10) {
        $code = $etudiant->Code;
        $nom = $etudiant->Nom;
        $prenom = $etudiant->Prenom;
        $filiere = $etudiant->Filiere;
        $libelleus = $etudiant->UE->LibelleUS;
        $devoir = $etudiant->UE->Notes->Devoir;
        $examen = $etudiant->UE->Notes->Examen;


        //AFFICHAGE DES ELEMENTS RECEUILLIS 
        echo "<div id=\"div1\">
            <div id=\"div2\">
            <h3>$code</h3>
            <span><b>Nom : </b>$nom</span>
            <span><b>Prenom : </b>$prenom</span>
            <span><b>Moyenne : </b>$moyenne</span>
            </div>
         </div>";
    }
}
?>

</body>
</html>