<?php
include('function.php');
$crud = new CrudApp();

if (isset($_GET['status']) && $_GET['status'] == 'show') {
    $id = $_GET['id'];
    $student = $crud->show($id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 40px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            padding: 24px;
        }
        .profile-img {
            display: block;
            margin: 0 auto 20px auto;
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #3498db;
        }
        .info {
            text-align: center;
        }
        .info h2 {
            margin: 10px 0 5px 0;
            color: #333;
        }
        .info p {
            margin: 0;
            color: #555;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="uploads/<?php echo $student['image']; ?>" alt="Student Image" class="profile-img">
        <div class="info">
            <h2> ID:  <?php echo $student['id']; ?></h2>
            <h2> Name: <?php echo $student['name']; ?></h2>
            <h2> Roll No: <?php echo $student['roll']; ?></h2>
        </div>
    </div>
</body>
</html>