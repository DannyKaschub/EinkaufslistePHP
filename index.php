<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Einkaufsliste</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div>Einkaufsliste</div>
        <nav>
            <ul>
                <li>
                    <a href="?page=add">Hinzufügen</a>
                    <a href="?page=list">Aktuelle Liste</a>
                </li>
            </ul>
        </nav>
    </header>


    <div>
        <?php
        $produkte = [];
        $counter = 0;


        #anzeige der hinzufügen seite
        if ($_GET['page'] == 'add') {
            echo "
                <form action='?page=list' method='POST'>
                    <div class='input_container'>
                        <input name='produkt' required type='text' placeholder='Was wird benötigt'>
                        <input name='menge' type='text' placeholder='Wie viel soll es sein.(optional)'>
                        <button type='submit'>Hinzufügen</button>
                    </div>
                </form>
                ";
        }

        
        #läd die produkte.txt wenn sie existiert und erstellt ein json
        if (file_exists('produkte.txt')) {
            $text = file_get_contents('produkte.txt', true);
            $products = json_decode($text, true);
        }


        #fügt ein neues produkt ins produkte array ein und speichert es wieder als txt.
        if (isset($_POST['produkt'])) {
            $newProduct = [
                'produkt' => $_POST['produkt'],
                'menge' => $_POST['menge']
            ];
            array_push($products, $newProduct);
            file_put_contents('produkte.txt', json_encode($products, JSON_PRETTY_PRINT));
        }


        #entfernt das objekt mit dem übergebenen index und speichert die datei neu ab.
        if (isset($_POST['index'])) {
            $index = $_POST['index'];
            unset($products[$index]);
            file_put_contents('produkte.txt', json_encode($products, JSON_PRETTY_PRINT));
        }


        #generiert die liste aller benötigten sachen aus dem json
        if ($_GET['page'] == 'list') {
            foreach ($products as $key => $data) {
                $produkt = $data['produkt'];
                $menge = $data['menge'];
                echo "
                    <div class='card'>
                        <span>$menge</span>
                        <span>$produkt</span>
                        <form method='post'>
                            <input type='hidden' name='index' value='$key'>
                            <button class='delButton' type='submit'>Löschen</button>
                        </form>
    
                    </div>
                ";
                $counter++;
            }
        }
        ?>
    </div>

</body>

</html>