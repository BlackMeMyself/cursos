<?php
include("connectdb.php");
include("header.php");
session_start();





?>
<main>
    <?php if(isset($_SESSION["message"]) && isset($_SESSION["message_type"])){ ?>
            <h3><?php echo $_SESSION["message"]; ?></h3>
        <?php 
        unset($_SESSION["message"],$_SESSION["message_type"]);
    } ?>
    <form action="registerUser.php" id="signupForm" method="POST">
        <div class="form_input">
            <label for="name">INTRODUCE TU NOMBRE</label>
            <input type="name" id="name" name="name" required>
        </div>
        <div class="form_input">
            <label for="email">INTRODUCE TU EMAIL</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form_input">
            <label for="tel">INTRODUCE TU TELÉFONO</label>
            <input type="tel" id="tel" name="tel" max="9" required>
        </div>
        <div class="form_input">
            <label for="type">ELIGE TU OPCIÓN</label>
            <select name="type" id="type">
                <option value="0">ALUMNO</option>
                <option value="1">PROFESOR</option>
            </select>
        </div>
        <div class="form_input">
            <label for="password">INTRODUCE TU CONTRASEÑA</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form_input">
            <label for="rpassword">REPITE TU CONTRASEÑA</label>
            <input type="password" id="rpassword" required>
        </div>
        <button>REGISTRARSE</button>
    </form>
</main>
<?php include("footer.php") ?>
<script>
    window.onload = function() {
        toggle_selected_menu("signup_btn");
        const signupForm = document.getElementById("signupForm");

        signupForm.addEventListener("submit", function(ev) {
            ev.preventDefault();

            const password = document.getElementById("password");
            const rpassword = document.getElementById("rpassword");
            if (password.value != rpassword.value) {
                alert("las contraseñas no coinciden");
            } else {
                signupForm.submit();
            }

        })

    }
</script>