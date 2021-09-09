<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación Técnica - Nuevo</title>
    <?php include_once './views/moduls/css.php' ?>
</head>
<body class="container-fluid m-0 p-0">        
    <?php Include_once './views/moduls/header.php'?>    

    <main class="container row">
        <form action="menu/guardar" method="post" class="col-md-6 col-sm-12 offset-md-4 mt-3">
            <div class="mb-3 row">
                <label for="dependencia" class="col-sm-3 col-form-label">Menu Padre</label>
                <div class="col-sm-9 dropdown">
                   <select class="form-control" name="dependencia" id="dependencia">
                        <option value="">Selecciona un menu de dependencia</option>
                        <?php foreach ($data as $key => $row): ?>
                            <option value="<?php echo $row->id ?>"><?php echo $row->nombre_menu ?></option>
                        <?php endforeach; ?>
                   </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="descripcion" class="col-sm-3 col-form-label">Descripción</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Describe el menu" style="height: 100px" required></textarea>                    
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a href="/">Cancelar</a>
                <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
            </div>
        </form>
    </main>

    <?php Include_once './views/moduls/footer.php'?>

    <?php include_once './views/moduls/scripts.php' ?>
</body>
</html>