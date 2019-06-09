<?php

    class Employe
    {
        private  $conn;
        function  __construct()
        {
            session_start();
            $localhost = "localhost";
            $dbname = "crud";
            $username = "root";
            $password = "";

            //Creation de connection
            $conn = new mysqli($localhost,$username,$password,$dbname);
            // vérifier connection
            if($conn->connect_error){
                die("Connection failed: " .$conn->connect_error);
            }else{
                $this->conn=$conn;
            }
        }
        public function employe_list(){
                    $sql = "SELECT * FROM employe ORDER BY id asc ";
                    $result=  $this->conn->query($sql);
                    return $result;
                 }

        public function create_employe($post_data=array()){

            if(isset($post_data['create_employe'])){
                $name= mysqli_real_escape_string($this->conn,trim($post_data['name']));
                $address= mysqli_real_escape_string($this->conn,trim($post_data['address']));
                $phone= mysqli_real_escape_string($this->conn,trim($post_data['phone']));
                $status= mysqli_real_escape_string($this->conn,trim($post_data['status']));

                $sql="INSERT INTO employe (name,address, phone,status, VALUES ('$name','$address','$phone' '$status')";

                $result=  $this->conn->query($sql);

                if($result){

                    $_SESSION['message']=" Les données ont ete enregistrée avec succes";

                    header('Location: index.php');
                }

                unset($post_data['create_employe']);
            }


        }


        public function view_employe_id($id){
            if(isset($id)){
                $id= mysqli_real_escape_string($this->conn,trim($id));

                $sql="Select * from employe where id='$id'";

                $result=  $this->conn->query($sql);

                return $result->fetch_assoc();

            }
        }


        public function update_employe($post_data=array()){
            if(isset($post_data['update_employe'])&& isset($post_data['id'])){
                $name= mysqli_real_escape_string($this->conn,trim($post_data['name']));
                $address= mysqli_real_escape_string($this->conn,trim($post_data['address']));
                $phone= mysqli_real_escape_string($this->conn,trim($post_data['phone']));
                $status= mysqli_real_escape_string($this->conn,trim($post_data['status']));
                $id= mysqli_real_escape_string($this->conn,trim($post_data['id']));


                $sql="UPDATE employe SET name='$name',address='$address',phone='$phone',status='$status' WHERE id = $id";

                $result=  $this->conn->query($sql);

                if($result){
                    $_SESSION['message']="mise a jour a été faite avec succès ";
                }
                unset($post_data['update_employe']);
            }
        }

        public function delete_employe_info_by_id($id){

            if(isset($id)){
                $id= mysqli_real_escape_string($this->conn,trim($id));

                $sql="DELETE FROM  employe  WHERE id =$id";
                $result=  $this->conn->query($sql);

                if($result){
                    $_SESSION['message']="employé a été supprimé avec succès ";

                }
            }
            header('Location: index.php');
        }
        function __destruct() {
            mysqli_close($this->conn);
        }


    }