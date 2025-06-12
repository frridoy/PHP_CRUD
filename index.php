<?php

include('function.php');
$crud = new CrudApp();

if (isset($_POST['student_submit'])) {
    $message = $crud->insertData($_POST);
}

$students = $crud->getData();

if (isset($_GET['status']) && $_GET['status'] == 'delete') {
    $id = $_GET['id'];
    $delete_message = $crud->delete($id);
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
            <?php if (isset($delete_message)): ?>
                <div class="alert alert-success">
                    <?php echo $delete_message; ?>
                </div>
            <?php endif; ?>
            <input type="text" name="name" class="form-control my-2" placeholder="Enter Name" required>
            <input type="number" name="roll" class="form-control my-2" placeholder="Enter roll" required>
            <input type="file" name="image" class="form-control my-2">
            <input type="submit" name="student_submit" class="form-control bg-warning" value="Submit">
        </form>
    </div>

    <div class="container py-4 p-4 shadow">
        <h3>Student Infomration</h3>
        <table class="table table-responsive table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php while ($student = mysqli_fetch_assoc($students)): ?>
                    <tr>
                        <td><?php echo $student['id']; ?></td>
                        <td><?php echo $student['name']; ?></td>
                        <td><?php echo $student['roll']; ?></td>
                        <td class="text-center">
                            <?php if (!empty($student['image'])): ?>
                                <img src="uploads/<?php echo $student['image']; ?>" alt="Student Image" width="50">
                            <?php else: ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $student['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="?status=delete&id=<?php echo $student['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                            <a href="show.php?status=show&id=<?php echo $student['id']; ?>" class="btn btn-sm btn-info">Show</a>
                        </td>
                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>