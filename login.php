
<?php 
include_once 'header.php';
?>
<div class="body-image">
    <section class="signup-form">
        
        <form action ="includes/login.inc.php" method="post">
			<table>
				<tr><td><h1>Log In</h1></tr></td>
				<tr><td><input type="text" name="userid" placeholder="Username/E-mail"></td></tr>
				<tr><td><input type="password" name="password" placeholder="Password"></td></tr>
				<tr><td><button type="submit" name="submit">Log in</button></td></tr>
			</table>
        </form>
        
        
        
        <?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "EmptyInput") {
            echo "<p>Fill in all the fields!</p>";
        }
        else if($_GET["error"] == "WrongLogin") {
            echo "<p>Incorrect Login Credentials!</p>";
        } 
    }

        ?>
        
    </section>
</div>
<?php 
include_once 'footer.php';
?>