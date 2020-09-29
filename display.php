<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="displaystyle.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel = "icon" type = "image/png" href = "images/transfer.png"/>
    <title>display</title>
      <?php
        include("connection.php");      
      
      ?>
  </head>
  <body>
 <div id="mobile">
  <div id="display">
  <p id="text"><marquee direction="right">TRANSFER CREDITS</marquee></p>
</div>
    
      <?php
        $query="SELECT * FROM user";
        $data=mysqli_query($connect,$query);
        $total=mysqli_num_rows($data);
      
    if($total !=0)
  { 
?>
      <div class="container">
          
        <div class="list-group">
          <h3 class="list_title">All User List</h3>
            <?php
    while($result =mysqli_fetch_assoc($data))
    {
     ?>
            <a class="list-group-item list-group-item-action flex-column align-items-start" href='display.php?id=<?php echo $result['id']; ?>'>
                
               <?php echo $result['name'];}
    }
     else
    {
    echo"No Record Found";
    }
    ?>
    
            </a>
        </div>
      <?php
   if (isset($_GET["id"]))
   { $id  = $_GET["id"]; } 
        else { $id=0; };
   $data=mysqli_query($connect,"SELECT * FROM user WHERE id=$id ");
   $total=mysqli_num_rows($data);
   $result =mysqli_fetch_array($data);
?>

          
                  <div class="mesgs">
            <div class="content_heading">
                <h3 class="content_title">User Information</h3>
            </div>
            <div class="content_body">
                <table class="table table-responsive table-user-info">
                    <tbody>
                        <tr>
                            <td>Name:</td>
                            <td>
                                <?php echo $result['name'] ?>
                            </td>
                        </tr>
                       
                        <tr>
                            <td>Email:</td>
                            <td>
                                <?php echo $result['email'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Credits</td>
                            <td>
                                <?php echo $result['curr_credit'] ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
                      <div class="content_heading myclass">
                <h3 class="content_title">Transfer Credits</h3>
            </div>
            <br>
            <form class="form-group" action="transfer.php" method="post">
                <?php
   $query="SELECT name FROM user";
   $data=mysqli_query($connect,$query);
                                
    ?>
                <div class="col-sm-6 ">
                    <label for="from">Select User From:</label>
                    <select class="form-control" name="from">
                        <option value="null">Not Selected</option>
                        <?php 
          while($result= mysqli_fetch_array($data))
          {
           echo "<option value='" . $result['name'] . "'>" . $result['name'] . "</option>";
            
          }
          ?>
                        </select>
                </div>
                <?php
   $query="SELECT name FROM user";
   $data=mysqli_query($connect,$query);
    ?>
                
                <div class="col-sm-6">
                    <label for="to">Select User To:</label>
                    <select class="form-control" name="to">
                        <option value="null">Not Selected</option>
                        
                        <?php 
          while($result= mysqli_fetch_array($data))
          {
           echo "<option value='" . $result['name'] . "'>" . $result['name'] . "</option>";
            
          }
          ?>
                        </select>
                </div>
                <div class="col-sm-6">
                    <label for="amount">Credits:</label>
                        <input class="form-control" type="number" name="amount" min=1 autocomplete="off">
                </div>
                <br>
                <div class="col-sm-6 ">
                    <br>
                    <div class="buttons">
                        <button type="submit" class="btn" name="submit" value="submit">Transfer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>     
    
      <div class="fixed-footer">
        <div class="container" style="text-align:center;">Copyright &copy; 2020 Credit Management by Manvitha Reddy  
		<a href="#" class="fa fa-facebook"></a>
		<a href="#" class="fa fa-twitter"></a>
		<a href="#" class="fa fa-google"></a>
		<a href="#" class="fa fa-linkedin"></a>
		</div>
    </div>
        
      
      
     
      
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</div>
  </body>
</html>