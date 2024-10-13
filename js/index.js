
$(document).ready(function() {
  $("#button").on("click", function() {
    var name = $("#name").val();
    var password = $("#password").val();
     
    $.ajax({
      type: "POST",
      url: "php/insert.php",
      data: {
        name: name,
        password:password

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

