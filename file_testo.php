<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Visualizzazione CSV in Tabella</title>
    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #333;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Tabella CSV</h2>
<?php
    <?php
    $nomeFile = "log - log.csv";
    $file = fopen($nomeFile, "r");
    if (!$file) {
        die("<p style='color: red; text-align: center;'>Errore nell'apertura del file $nomeFile</p>");
    } //controllo apertura del file csv

    echo "<table>\n"; // Apertura del tag della tabella 
    $primaRiga = true; // variabile booleana per l'intestazione

    while (!feof($file)) {
        $row = fgets($file);  // lettura delle singole righe con tutti i contenuti
        if ($row === false) { // se restituisce false, saltiamo la riga
            break;
        }
        $row = trim($row);
        if (empty($row)) {
            continue;
        }
        $campi = explode(",", $row); // Spezza la stringa in un array
    
        echo "    <tr>\n"; // Apertura della riga della tabella HTML
        
        foreach ($campi as $cella) {
            if ($primaRiga) {
                echo "        <th>" . htmlspecialchars($cella) . "</th>\n"; 
            } else {
                echo "        <td>" . htmlspecialchars($cella) . "</td>\n";
            }
        }
        
        echo "    </tr>\n"; // Chiusura della riga
        $primaRiga = false; // Dopo la prima riga, diventa false per tutte le successive
    } // Chiusura del ciclo while

    echo "</table>\n"; // Chiusura della tabella
    fclose($file);     // Chiusura del file
?>
</body>
</html>