<script type= "text/javascript" src="./jquery.js"></script>
<script type="text/javascript">


const passwordField = document.getElementById("password");
const passwordField2 = document.getElementById("password1");
const togglePassword = document.querySelector(".password-toggle-icon i");
const togglePassword2 = document.querySelector(".password-toggle-icon2 i");

togglePassword.addEventListener("click", function () {
  if (passwordField.type === "password" ) {
    passwordField.type = "text";
    togglePassword.classList.remove("fa-eye");
    togglePassword.classList.add("fa-eye-slash");

  } else {
    passwordField.type = "password";
    togglePassword.classList.remove("fa-eye-slash");
    togglePassword.classList.add("fa-eye");
  }
});

togglePassword2.addEventListener("click", function () {
  if (passwordField2.type === "password" ) {

    passwordField2.type = "text";
    togglePassword2.classList.remove("fa-eye");
    togglePassword2.classList.add("fa-eye-slash");
  } else {
 
    passwordField2.type = "password";
    togglePassword2.classList.remove("fa-eye-slash");
    togglePassword2.classList.add("fa-eye");
  }
});
</script>