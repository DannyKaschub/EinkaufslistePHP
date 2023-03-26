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
                    <a href="?page=list">Akruelle Liste</a>
                </li>
            </ul>
        </nav>
    </header>


    <div>
        <?php
            $headline = 'Einkaufsliste';
            #anzeige der hinzufügen seite
            if($_GET['page'] == 'add'){
                $headline ='Hier kannst du neue Sachen einfügen';
            }
            #anzeige der liste
            if($_GET['page'] == 'list'){
                $headline ='hier ist die liste deiner sachen';
            }

            echo "<h1>$headline</h1>";
        ?>
    </div>

</body>

</html>