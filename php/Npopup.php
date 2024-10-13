<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Move Modal In on Path</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <button class="toggle-button" id="centered-toggle-button">Toggle</button>

<div class="modal" id="modal">
  <h2>Modal Window</h2>
  <div class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis deserunt corrupti, ut fugit magni qui quasi nisi amet repellendus non fuga omnis a sed impedit explicabo accusantium nihil doloremque consequuntur.</div>
  <div class="actions">
    <button class="toggle-button">OK</button>
  </div>
</div>
  
    <script src="js/index.js"></script>

</body>
</html>



<style>

html, body {
  height: 100%;
}

body {
  background: #eee;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

.modal {
  width: 500px;
  background: white;
  border: 1px solid #ccc;
  -webkit-transition: 1.1s ease-out;
  transition: 1.1s ease-out;
  box-shadow: -2rem 2rem 2rem rgba(0, 0, 0, 0.2);
  -webkit-filter: blur(0);
          filter: blur(0);
  -webkit-transform: scale(1);
          transform: scale(1);
  opacity: 1;
  visibility: visible;
}
.modal.off {
  opacity: 0;
  visibility: hidden;
  -webkit-filter: blur(8px);
          filter: blur(8px);
  -webkit-transform: scale(0.33);
          transform: scale(0.33);
  box-shadow: 1rem 0 0 rgba(0, 0, 0, 0.2);
}
@supports (offset-rotation: 0deg) {
  .modal {
    offset-rotation: 0deg;
    offset-path: path("M 250,100 S -300,500 -700,-200");
  }
  .modal.off {
    offset-distance: 100%;
  }
}
@media (prefers-reduced-motion) {
  .modal {
    offset-path: none;
  }
}
.modal h2 {
  border-bottom: 1px solid #ccc;
  padding: 1rem;
  margin: 0;
}
.modal .content {
  padding: 1rem;
}
.modal .actions {
  border-top: 1px solid #ccc;
  background: #eee;
  padding: 0.5rem 1rem;
}
.modal .actions button {
  border: 0;
  background: #78f89f;
  border-radius: 5px;
  padding: 0.5rem 1rem;
  font-size: 0.8rem;
  line-height: 1;
}

#centered-toggle-button {
  position: absolute;
}
</style>


<script>

  var buttons = document.querySelectorAll(".toggle-button");
var modal = document.querySelector("#modal");

[].forEach.call(buttons, function(button) {
  button.addEventListener("click", function() {
    modal.classList.toggle("off");
  })
});</script>