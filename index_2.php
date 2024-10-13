<!-- PHP -->
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="/sweetalert.min.js"></script>

<?php
session_start();

$db = mysqli_connect("localhost", "root", "", "registration");
if (isset($_POST['Submit'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $date = $_POST['dob'];

  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
  $password = substr(str_shuffle($chars), 2, 8);

  $sql = mysqli_query($db, "INSERT INTO `registration`(`name`, `email`, `mobile`, `dob`,`password`) VALUES ('$name','$email','$mobile','$date','$password')");
  if ($sql !== "") {

    ?>
    <script type='text/javascript'>

      swal({
        title: 'User created!',
        text: '<?php echo $password; ?>',
        closeOnClickOutside: false,
        icon: 'success',
        button: 'Ok',

      }).then((result) => {
        if (result.isConfirmed) {
          location = "Login.php"
        }
      })

    </script>
    <?php
    echo "New User";


  }

} else {
  echo "db connection error";
}
?>