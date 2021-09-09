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
        <table class="table mt-2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre del Menú</th>
                <th scope="col">Dependencia</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>        
        <tbody>
            <?php if($data): ?>
                <?php foreach($data as $key => $row): ?>
                <tr>
                    <th scope="row"><?php echo $row->id ?></th>
                    <td><?php echo $row->nombre_menu ?></td>
                    <td><?php echo $row->dependencia ?></td>
                    <td><?php echo $row->descripcion_menu ?></td>
                    <td>                        
                        <a href="menu/editar/<?php echo $row->id?>" class="btn btn-info btn-sm text-white"><i class="bi bi-pencil-square"></i></a>
                        <a href="menu/eliminar/<?php echo $row->id?>" class="btn btn-danger btn-sm text-white"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <th scope="row" colspan="4" class="text-center">
                        Sin información
                    </th>
                </tr>                
            <?php endif; ?>
        </tbody>
        
        </table>     
    </main>

    <?php Include_once './views/moduls/footer.php'?>

    <?php include_once './views/moduls/scripts.php' ?>
</body>
</html>