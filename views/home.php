<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>CRUD CON PDO</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="?ref=inicio">INICIO <span class="sr-only">(current)</span></a>
            </li>
            </ul>
        </div>
        </div>
    </nav>
    <section class="container">
    <div class="row">
        <div class="col-12 col-md-4">
        <div class="modal-header">
            <h5 class="modal-title">CRUD</h5>
        </div>
        <form action="" method="POST">
        <div class="modal-body">
                <input name="id" type="hidden" value="<?php echo $id ?>">
                <div class="form-group">
                    <input name="name" type="text" autocomplete="off" class="form-control" placeholder="Nombre" value="<?php echo $name ?>">
                </div>
                <div class="form-group">
                    <input name="email" type="email" autocomplete="off" class="form-control" placeholder="Email" value="<?php echo $email ?>">
                </div>
                <div class="form-group">
                    <input name="pass" type="password" class="form-control" placeholder="Clave" value="<?php echo $pass ?>">
                </div>
                <?php if($btnOpcion == 'Modificar'){
                    echo "<input type='submit' class='btn btn-success btn-block' name='btnOpcion' value='Actualizar'>";
                }else{
                    echo "<input type='submit' class='btn btn-success btn-block' name='btnOpcion' value='Guardar'>";
                }
                ?>
        </div>
        </form>
        </div>
        <div class="col-12 col-md-8">
        <table class="table table-responsive table-striped table-md">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Clave</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($data as $usuario):?>
                <tr>
                    <td><?php echo $usuario['id'] ?></td>
                    <td><?php echo $usuario['name'] ?></td>
                    <td><?php echo $usuario['email'] ?></td>
                    <td><?php echo $usuario['clave'] ?></td>
                    <td>
                        <form action="" method="POST">
                        <input name="id" type="hidden" value="<?php echo $usuario['id'] ?>">
                        <input name="name" type="hidden" value="<?php echo $usuario['name'] ?>">
                        <input name="email" type="hidden" value="<?php echo $usuario['email'] ?>">
                        <input name="pass" type="hidden" value="<?php echo $usuario['clave'] ?>">
                            <input class="btn btn-danger" name="btnOpcion" type="submit" value="Eliminar">
                            <input name="btnOpcion" class="btn btn-secondary" type="submit" value="Modificar">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        </div>
    </div>
    </section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>