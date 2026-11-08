<?php
    $nomeFile="log - log.csv";
    $file=fopen($nomeFile, "r");
    if(!$nomeFile){
        die("Errore nell'apertura del file csv!")
    }

    $righeTabella=[];  //memorizzare righe dal csv
    $primaRiga=true;

    while(!feof($file)){
        $row=fgets($file); //con row si indica la memorizzazione per una singola riga
        if($row===false){
            break;
        }
        $row=trim($row);
        if(empty($row)){
            continue;
        }
        $campi=explode(",",$row); //la riga viene separa con explode e trasformandola in un array
        $righeTabella[]=[
            'dati'=>$campi, //contiene la lista di tutte le colonne di tutta quella riga specifica, in html sarà <td>
            'isHeader'=>$primaRiga  //è una booleana per verificare se si tratta dell'intestazione del file, e sarà nel file html <th>
        ];
        $primaRiga=false;

    }
    fclose($file) //chiusura dello stream del file
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Esercizio-tabella</title>
    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 30px auto;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #bbb;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background-color: #2c3e50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>