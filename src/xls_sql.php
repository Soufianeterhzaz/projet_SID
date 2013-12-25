<?php

$nom_fichier="espacenett.txt";      // nom du fichier a convertir
$separateur="|";                 // sigle de séparateur

// ouverture connection base SQL
require("conf.php");
$db_link = mysql_connect($serveur,$user,$passwd);
if (!$db_link) echo "Connexion impossible\n";
 mysql_select_db($bdd,$db_link ); 

$requete=mysql_query("select * from fichier ");
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
    $col1 = $liste[0];
    $col2 = $liste[1];
    $col3 = $liste[2];
    $col4 = $liste[3];
    $col5 = $liste[4];
    $col6 = $liste[5];
    $col7 = $liste[6];
    $col8 = $liste[7];
    $col9 = $liste[8];
    $col10 = $liste[9];
    $col11 = $liste[10];
    $col12 = $liste[11];
    $col13 = $liste[12];
    $col14 = $liste[13];
    $col15 = $liste[14];
    $col16 = $liste[15];
    $col17 = $liste[16];
    $col18= $liste[17];
    $col19 = $liste[18];
    $col20= $liste[19];
    $col21 = $liste[20];
    $col22= $liste[21];
    $col23= $liste[22];
    $col24= $liste[23];
    

    if (trim($col1)!= '')                     // si fin fichier
      echo  "<tr>";

    echo  "<td>$col1</td>";
    echo  "<td>$col2</td>";
    echo  "<td>$col3</td>";
    echo  "<td>$col4</td>";
    echo  "<td>$col5</td>";
    echo  "<td>$col6</td>";
    echo  "<td>$col7</td>";
    echo  "<td>$col8</td>";
    echo  "<td>$col9</td>";
    echo  "<td>$col10</td>";
    echo  "<td>$col11</td>";
    echo  "<td>$col12</td>";
    echo  "<td>$col13</td>";
    echo  "<td>$col14</td>";
    echo  "<td>$col15</td>";
    echo  "<td>$col16</td>";
    echo  "<td>$col17</td>";
    echo  "<td>$col18</td>";
    echo  "<td>$col19</td>";
    echo  "<td>$col20</td>";
    echo  "<td>$col21</td>";
    echo  "<td>$col22</td>";
    echo  "<td>$col23</td>";
    echo  "<td>$col24</td>";
    echo  "</tr>";


// important dans la base SQL
$query="insert into fichier (col1,col2,col3,col4,col5,col6,col7,col8,col9,col10,col11,col12,col13,col14,col15,col16,col17,col18,col19,col20,col21,col22,col23,col24) ";
$query.="values ('$col1','$col2','$col3','$col4','$col5','$col6','$col7','$col8','$col9','$col10','$col11','$col12','$col13','$col14','$col15','$col16','$col17','$col18','$col19','$col20','$col21','$col22','$col23','$col24') ";

echo $query;
$resul=mysql_query($query) or die("Erreur SQL !".$sql."<br>".mysql_error());  
if (!$resul)  echo "Impossible d'ajouter\n";

}

mysql_close($db_link);           // ferme SQL
fclose($fp);                     // ferme fichier TXT
echo "</table>";                 // fin du tableau

echo "Merci... Importation terminé<br>";
?>