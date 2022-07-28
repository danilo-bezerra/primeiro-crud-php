<?php
include('db.php');

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $sql = $db->exec("DELETE FROM customers WHERE id = $id");
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
                    <a class="nav-link " aria-current="page" href="index.php">Home</a>
                    <a class="nav-link " href="addCustomer.php">Adicionar Cliente</a>
                    <a class="nav-link active" href="listCustomers.php">Listar Clientes</a>
                </div>
            </div>
        </div>
    </nav>
    <section class="container">


        <table class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = $db->prepare("SELECT * FROM customers ORDER BY id DESC");
                $sql->execute();

                $fetchCustomers = $sql->fetchAll();

                foreach ($fetchCustomers as $key => $customer) {
                    echo "<tr>";
                    echo '<th scope="row">' . $customer['id'] . '</th>';
                    echo
                    "<td>" . $customer['name'] . "</td>";
                    echo
                    "<td>" . $customer['email'] . "</td>";
                    echo "<td>" . $customer['created_at'] . "</td>";
                    echo '<td><button type="button" class="btn btn-warning">Editar</button></td>';
                    echo '<td><a class="btn btn-danger" href="?delete=' . $customer['id'] . '">Deletar</a></td>';
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>