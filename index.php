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

        #anzeige der hinzufügen seite
        if ($_GET['page'] == 'add') {
            echo "
                <form action='?page=list' method='POST'>
                    <div class='input_container'>
                        <input required type='text' placeholder='Was wird benötigt'>
                        <input type='text' placeholder='Wie viel soll es sein.(optional)'>
                        <input type='text' placeholder='kategorie'>
                        <button type='submit'>Hinzufügen</button>
                    </div>
                </form>
                ";
        }
        #anzeige der liste
        if ($_GET['page'] == 'list') {
        }

        ?>
    </div>

</body>

</html>