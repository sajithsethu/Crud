
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php


if (!empty($_REQUEST['Submit'])) {
    $name = $_REQUEST['name'];
    $npass = $_REQUEST['npassword'];
    $cpass = $_REQUEST['cpassword'];
    if ($npass != $cpass){



      echo "<script> alert(' Please enter same password')</script>";
    } 

    else {echo "<script> alert(' Success ')</script>"; }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src = "https://ajax.aspnetCDN.com/ajax/jQuery/jQuery-1.9.0.min.js"></script>
   </head>
<body>

  <div class="wrapper">
    <h2>Login</h2>
    <form action="" method="POST">
      <div class="input-box">
        <input type="text" placeholder="Enter your name"  name="name" id="name"required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Enter your  new password" name="npassword" id="npassword"required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Enter your confirm password" name="cpassword" id="cpassword"required>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Login Now" id="button" name="Submit">
      </div>
      <div class="text">
        <h3><a href="Login.php"> Login now</a></h3>
      </div>
    </form>
  </div>

</body>
</html>



<!-- JQUERY -->
<script>

  
    
$(document).ready(function() {
  $("#button").on("click", function() {
    var name = $("#name").val();
    var npassword = $("#npassword").val();
    var cpassword = $("#cpassword").val();
  
     

   


     
    $.ajax({
      type: "POST",
      url: "",
      data: {
        name: name,
        npassword:npassword,
        cpassword:cpassword

      },

      success: function(result) {
        // alert("Data");
      },
      error: function(xhr, status, error) {
        console.log("Error: " + error);
      }

    });
  });
});

</script>





<!-- PHP -->




<?php

session_start();
 
$db=mysqli_connect("localhost","root","","registration");

if(isset($_POST['name']))


{

 $name=$_POST['name'];
 $password=$_POST['npassword'];
 $pass=md5($password);
 $id=$_SESSION['id'];
 $old=$_SESSION['password'];


$query=mysqli_query($db,"UPDATE `registration` SET `password`='$pass' WHERE `id`='$id'AND`name`='$name' AND `password`='$old';
");

if($query=!""){

  header("Location:Login.php");

 
}

else{echo "not sucessfull";}
}

else{echo "db error";}

?>