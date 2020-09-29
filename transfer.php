<?php

include("connection.php");

if (isset($_POST['submit']))
{
    
    $to=$_POST['to'];
    
            $from=$_POST['from'];
    
            $amount=$_POST['amount'];
            $newmoney1=0;
            $newmoney2=0;
            $sql="SELECT * FROM user WHERE name = '$from' ";
            $data=mysqli_query($connect,$sql);
            $res1=mysqli_fetch_assoc($data);
            $sql="SELECT * FROM user WHERE name = '$to' ";
            $data=mysqli_query($connect,$sql);
            $res2=mysqli_fetch_assoc($data);
            $newmoney1  = ($res1['curr_credit'] - (int)$amount);
            $newmoney2  = ($res2['curr_credit'] + (int)$amount);
            if($res2['curr_credit']<$amount)
            {
                
              echo "ERROR!!!";
            
            }
            else if((!(is_numeric($_POST['amount'])) || $_POST['amount'] == 0 || $_POST['amount'] == " "))
            {
               echo "ERROR!!!";
            }
            else if($_POST['to'] === 'null' ||$_POST['from'] === 'null' ) {
            
            echo 'ERROR: No username selected!';
             }  
            else if($_POST['to']== $_POST['from']){
                echo"ERROR: Cannot transfer money to yourself!";
            }
            else
            {
            $sql="UPDATE user SET curr_credit='$newmoney1' WHERE name='$from';";
            mysqli_query($connect,$sql);
            $sql="UPDATE user set curr_credit='$newmoney2' WHERE name='$to';";
            mysqli_query($connect,$sql);
            $sql = "INSERT INTO `transfer_credit` VALUES ('$from','$to',$amount)" ;
                mysqli_query($connect,$sql);
              header('location:successful.php');
             }
    
    
}




?>