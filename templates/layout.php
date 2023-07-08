<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?php
        if (empty($_SESSION['user']))
            { 
                echo '<a class="login" href="?action=login"></a>';
            } else
            {
                echo '<a class="logout" href="?action=logout"></a>';
            }
    ?>
    <div class="container">
        <?php
        $page = $render['page'];
            require_once("templates/$page.php");
        ?>
    </div>
</body>
</html>