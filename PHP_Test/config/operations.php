<?php
require_once('../config/dbconfig.php');
$db = new dbconfig();
class operations extends dbconfig {
    public function Store_Record() {
        global $db;
        if(isset($_POST['btn_save']))
        {
         $First_Name = $db->check($_POST['First_Name']);
         $Middle_name = $db->check($_POST['Middle_name']);
         $Last_Name = $db->check($_POST['Last_Name']);
         $Email_Address = $db->check($_POST['Email_Address']);
         $Username = $db->check($_POST['Username']);

         if($this->insert_record($First_Name,$Middle_name,$Last_Name,$Email_Address,$Username))
         {
             echo '<div class="alert alert-success">Record Successfully Saved</div>';
         }
         else
         {
          echo '<div class="alert alert-danger"> Failed </div>';
         }
        }
    }

    //Insert Record in the Database Using Querry
    function insert_record($a,$b,$c,$d,$e)
    {
        global $db;
        $query = "insert into the_integer_limits (First_Name,Middle_name,Last_Name,Email_Address,Username) values('$a','$b','$c','$d','$e')";
        $result = mysqli_query($db->connection,$query);
    
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

     //Display Session Message
     public function display_message()
     {
         if(isset($_SESSION['Message']))
         {
             echo $_SESSION['Message'];
             unset($_SESSION['Message']);
         }
     }
}

?>