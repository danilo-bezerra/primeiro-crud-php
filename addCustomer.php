<?php
include('db.php');

if (isset($_POST['name'])) {
    $sql = $db->prepare("INSERT INTO customers (name, email) VALUES (?, ?)");
    $sql->execute(array($_POST['name'], $_POST['email']));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-md bg-light mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestão de Clientes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="addCustomer.php">Adicionar Cliente</a>
                    <a class="nav-link" href="listCustomers.php">Listar Clientes</a>
                </div>
            </div>
        </div>
    </nav>
    <section class="container-md">



        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 d-flex justify-content-end gap-3">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </div>

        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>