<?php

include("header.php");
include("connectdb.php");
session_start();

?>
<main>
    <?php
        if(isset($_SESSION["message"]) && isset($_SESSION["message_type"])){?>
            <h3><?php echo $_SESSION["message"];?></h3>
        <?php unset($_SESSION["message"], $_SESSION["message_type"]); } ?>
    
<form action="validateUser.php" method="POST">
    <div class="form_input">
        <label for="email">INTRODUCE TU EMAIL</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div class="form_input">
        <label for="password">INTRODUCE TU CONTRASEÑA</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button>ENTRAR</button>
</form>
</main>
<?php include("footer.php") ?>
<script>
    window.onload = function() {
        toggle_selected_menu("login_btn");

    }
</script>