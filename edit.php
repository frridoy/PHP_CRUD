<?php

include('function.php');
$crud = new CrudApp();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $student = $crud->edit($id);
}

if (isset($_POST['update'])) {
    $message = $crud->updateData($_POST, $id);
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body>
    <div class="container my-4 p-4 shadow">
        <h1 class="text-center">Crud APP</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <?php if (isset($message)): ?>
                <div class="alert alert-success">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <input type="text" name="u_name" class="form-control my-2" value="<?php echo $student['name']; ?>" placeholder="Enter Name" required>
            <input type="number" name="u_roll" class="form-control my-2" value="<?php echo $student['roll']; ?>" placeholder="Enter roll" required>
            <input type="file" name="u_image" class="form-control my-2">
            <input type="submit" name="update" class="form-control bg-warning" value="Update">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>