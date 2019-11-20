<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- CSS BOOTSTRAP -->
        <link rel="stylesheet" href="Contenu/Css/bootstrap.css">
        <!-- CSS FONT AWESOME -->
        <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <!-- CSS ANIMATED -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <title><?= $titre ?></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php" style="color: #343a40;"><b>SITE MARCHAND</b></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor02">
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <form class="form-inline my-2 my-lg-2">
                        <a href="index.php?action=aide" style="color: #343a40;"><b><i class="far fa-life-ring"></i> AIDE</b></a>&nbsp;&nbsp;&nbsp;
                        <a href="index.php?action=connexion" style="color: #343a40;"><b><i class="fas fa-user-circle"></i> MON COMPTE</b></a>&nbsp;&nbsp;&nbsp;
                        <?php 
                        if(!isset($_SESSION['id']))
                        {
                        }
                        else
                        {
                        echo '<a href="index.php?action=deconnexion" style="color: #343a40;"><b><i class="fas fa-user-slash"></i> DECONNEXION</b></a>';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </nav>

        <br>
        <div class="container">
            <?= $contenu ?>
        </div>
        <br>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>