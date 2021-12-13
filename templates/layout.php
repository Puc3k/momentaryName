<html lang="pl">

<head>
    <title>Str główna</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link href="/public/style.css" rel="stylesheet">
</head>

<body class="body">
<div class="wrapper">
    <div class="header">
        <h1><i class="far fa-clipboard"></i> Produkty</h1>
    </div>

    <div class="container">
        <div class="menu">
            <ul>
                <li><a href="?action=create">Create</a></li>
                <li><a href="?action=list">Lista</a></li>
            </ul>
        </div>

        <div class="page">
            <?php require_once("templates/pages/$page.php"); ?>
        </div>
    </div>

    <div class="footer">
        <p>Projekt XXX</p>
    </div>
</div>
</body>

</html>