<?php 


 class CrudApp{
      private $connection;

      public function __construct(){

         $dbhost = "localhost";
         $dbuser = "root";
         $dbpass = "root";
         $dbname = "php_crud";

         $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

         if(!$this->connection){
            die("Connection failed");
         }

      }
      public function insertData($data){

        $name = $data['name'];
        $roll = $data['roll'];
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
         move_uploaded_file($tmp_name, "uploads/".$image);

        $query = "INSERT INTO students (name, roll, image) VALUES ('$name', '$roll', '$image')";

        if(mysqli_query($this->connection, $query)){
            return "Data inserted successfully";
        }
      }

      public function getData(){
         
         $query = "SELECT * FROM students";
         $result = mysqli_query($this->connection, $query);
         return $result;
      }

       public function edit($id){
         
         $query = "SELECT * FROM students WHERE id = $id";
         $result = mysqli_query($this->connection, $query);
          return mysqli_fetch_assoc($result);
      }

      public function updateData($data, $id){

         $name = $data['u_name'];
         $roll = $data['u_roll'];
         $image = $_FILES['u_image']['name'];
         $tmp_name = $_FILES['u_image']['tmp_name'];

         if(!empty($image)){
            move_uploaded_file($tmp_name, "uploads/".$image);
            $query = "UPDATE students SET name='$name', roll='$roll', image='$image' WHERE id=$id";
         } else {
            $query = "UPDATE students SET name='$name', roll='$roll' WHERE id=$id";
         }

         if(mysqli_query($this->connection, $query)){
            return "Data updated successfully";
         }
      }

      public function delete($id){

         $catch_image_query = "SELECT image FROM students WHERE id = $id";
         $catch_image_result = mysqli_query($this->connection, $catch_image_query);
         $catch_image = mysqli_fetch_assoc($catch_image_result);
         if(!empty($catch_image['image'])){
            unlink("uploads/".$catch_image['image']);
         }
         
         $query = "DELETE FROM students WHERE id = $id";         
         if(mysqli_query($this->connection, $query)){
            return "Data deleted successfully";
         }
      }

       public function show($id){
         
         $query = "SELECT * FROM students WHERE id = $id";
         $result = mysqli_query($this->connection, $query);
          return mysqli_fetch_assoc($result);
      }
 }

?>