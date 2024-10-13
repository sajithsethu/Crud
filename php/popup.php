<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="/sweetalert.min.js"></script> 
<?php
  
 $name="sajith";

 
?>

 <script type='text/javascript'>
  
        swal({
            title: 'User created!',
            text: '<?php echo $name; ?>',
            closeOnClickOutside: false,
            icon: 'success',
            button: 'Ok',
           
        });

</script>
