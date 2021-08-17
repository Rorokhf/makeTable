<?php
class model
{
   private $server = "localhost";
   private $username = "root";
   private $password;
   private $dataBase = "crud";
   private $connection;




   public function __construct()
   {
      try {

         $this->connection = new mysqli($this->server, $this->username, $this->password, $this->dataBase);
      } catch (Exception $e) {
         echo "connictionection failed" . $e->getMessage();
      }
   }

   public function insert()
   {
      if (isset($_POST['submit'])) {
         if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile'])) {
            if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile'])) {
               $name = $_POST['name'];
               $email = $_POST['email'];
               $mobile = $_POST['mobile'];
               $address = $_POST['address'];

               $query = "INSERT INTO `records` ( `name`, `email`, `mobile`, `address`) VALUES('$name' ',' '$email' ',' '$mobile' ',' '$address') ";
//print_r($query);die;
               if($sql=$this->connection->query($query)){
                  echo "<script>alert('records added successfully');</script>";
                  echo "<script>window.location.href = 'records.php';</script>";
                  header("Location: records.php?id");
               }
            } else {
               echo "<script>alert('failed');</script>";
					echo "<script>window.location.href = 'index.php';</script>";
            }
         }else{
            echo "<script>alert('empty');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
         }
      }
   }

   public function fetch(){
      $data = null;

      $query = "SELECT * FROM `records`";
      if ($sql = $this->connection->query($query)) {
         while ($row = mysqli_fetch_assoc($sql)) {
            $data[] = $row;
         }
      }
      return $data;
   }

   public function delete($id){

      $query = "DELETE FROM records where id = '$id'";
      if ($sql = $this->connection->query($query)) {
         return true;
      }else{
         return false;
      }
   }

   public function fetch_single($id){

      $data = null;

      $query = "SELECT * FROM records WHERE id = '$id'";
      if ($sql = $this->connection->query($query)) {
         while ($row = $sql->fetch_assoc()) {
            $data = $row;
         }
      }
      return $data;
   }

   public function edit($id){

      $data = null;

      $query = "SELECT * FROM records WHERE id = '$id'";
      if ($sql = $this->connection->query($query)) {
         while($row = $sql->fetch_assoc()){
            $data = $row;
         }
      }
      return $data;
   }

   public function update($data){

      $query = "UPDATE records SET name='$data[name]', email='$data[email]', mobile='$data[mobile]', address='$data[address]' WHERE id='$data[id] '";

      if ($sql = $this->connection->query($query)) {
         return true;
      }else{
         return false;
      }
   }

}
