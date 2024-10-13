<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src = "https://ajax.aspnetCDN.com/ajax/jQuery/jQuery-1.9.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


   </head>
<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form  method="POST">
      <div class="input-box">
        <input type="text" placeholder="Enter your name"  name="name" id="name" required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your email" name="email" id="email"  required>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your Mobile No" name="mobile"id="mobile" maxlength = "10"
required>
      </div>
      <div class="input-box">
        <input type="date" placeholder="Enter your DOB" name="dob" id="dob" required>
      </div>
      <div class="input-box button">
        <input type="submit" value="Register Now" id="button" name="Submit">
      </div>
      <div class="text">
        <h3> <a href="Login.php">Login now</a></h3>
      </div>
    </form>
  </div>

</body>
</html>


<script>

  
$(document).ready(function() {
  $("#button").on("click", function() {
    var name = $("#name").val();
    var email = $("#email").val();
    var mobile = $("#mobile").val();
    var dob = $("#dob").val();
  
     

     // alert(name);
     // alert(email);
     // alert(mobile);
     // alert(dob);
    


     
    $.ajax({
      type: "POST",
      cache: false ,
      url: "",
      data: {
        name: name,
        email: email,
        mobile: mobile,
        dob: dob,
      

      },

      success: function(result) {
        alert("Data");
      },
      error: function(xhr, status, error) {
        console.log("Error: " + error);
      }

    });
  });
});

</script>


<!-- PHP -->




 <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
      <script src="/sweetalert.min.js"></script> 

<?php
session_start();

$db=mysqli_connect("localhost","root","","registration");
if(isset($_POST['Submit']))
{

    $name=$_POST['name'];
  $email=$_POST['email'];
  $mobile =$_POST['mobile'];
  $date=$_POST['dob']; 

  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
  $password=substr(md5(str_shuffle($chars)),2,8);
 
  $sql=mysqli_query($db,"INSERT INTO `registration`(`name`, `email`, `mobile`, `dob`,`password`) VALUES ('$name','$email','$mobile','$date','$password')");
if($sql!==""){

  ?>
  <script type='text/javascript'>
  
        swal({
            title: 'User created!',
            text: '<?php echo $password; ?>',
            closeOnClickOutside: false,
            icon: 'success',
            button: 'Ok',
           
        })  .then((result) => {
  if (result.isConfirmed) {
    location = "Login.php"
  }
})

</script>
<?php
    echo"New User";
  

  }

    }
             
  
else
{
  echo "db connection error";
}
?>


