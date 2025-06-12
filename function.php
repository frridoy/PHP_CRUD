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
 }

?>