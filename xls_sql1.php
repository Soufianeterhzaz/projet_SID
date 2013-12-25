<?php

$nom_fichier="inventeur.txt";      // nom du fichier a convertir
$separateur="|";                 // sigle de séparateur

// ouverture connection base SQL
require("conf.php");
$db_link = mysql_connect($serveur,$user,$passwd);
if (!$db_link) echo "Connexion impossible\n";
 mysql_select_db($bdd,$db_link ); 

$requete=mysql_query("select * from Inventeurs ");
if (!$requete) echo "Selection impossible\n";



// creation tableau d'affichage
// juste pour montrer que ca marche :-)

echo "<table border=1>";

if (file_exists($nom_fichier))         // Si le fichier existe, on l'ouvre
    $fp = fopen($nom_fichier,  "r");
else                                   // sinon error
{
    echo  "Fichier introuvable <br>";
    exit();
}

while (!feof($fp))  // On parcours le fichier
{
    $ligne = fgets($fp,4096);  // On se déplace d'une ligne
    $liste = explode($separateur,$ligne);  // Champs séparés par |

// ici important
    $Nominventeur= $liste[0];
    
    

    if (trim($Nominventeur)!= '')                     // si fin fichier
      echo  "<tr>";

    echo  "<td>$Nominventeur</td>";
   
    echo  "</tr>";


// important dans la base SQL
$query="insert into Inventeurs (Nominventeur) ";
$query.="values ('$Nominventeur') ";

echo $query;
$resul=mysql_query($query) or die("Erreur SQL !".$sql."<br>".mysql_error());  
if (!$resul)  echo "Impossible d'ajouter\n";

}

mysql_close($db_link);           // ferme SQL
fclose($fp);                     // ferme fichier TXT
echo "</table>";                 // fin du tableau

echo "Merci... Importation terminé<br>";
?>