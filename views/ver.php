<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación Técnica - Inicio</title>
    <?php include_once './views/moduls/css.php' ?>
</head>
<body class="container-fluid m-0 p-0">        
    <?php Include_once './views/moduls/header.php'?>    

    <main class="container">
        <div class="card text-center mt-5">
            <div class="card-body">
                <h5 class="card-title"><?php echo $menu->id?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $menu->nombre_menu?></h6>
                <p class="card-text"><?php echo $menu->descripcion_menu?></p>
            </div>
        </div>
    </main>

    <?php Include_once './views/moduls/footer.php'?>

    <?php include_once './views/moduls/scripts.php' ?>
</body>
</html>