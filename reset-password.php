<?php
include 'header.php'
?>

<div class="body-image2">
    <section class="signup-form">
        <form action ="includes/reset-request.inc.php" method="post">
		
		<table>
                    <tr><td><h1>Reset your Password</h1></td></tr>
                    <tr><td><p>An email will be sent to you with a link to reset your password.</p></td></tr>
                    <tr><td><input type="text" name="email" placeholder="Enter your E-mail..."></td></tr>
                    <?php
                if(isset($_GET["reset"])){
                    if($_GET["reset"] == "success"){
                    echo '<tr><td><p class ="signupsuccess">Check your email!</p></td></tr>';
                    }
                }

                ?>
                    <tr><td><button type="submit" name="reset-request-submit">Send Reset Link</button></td></tr>
                </table>		
        </form>
    </section>
</div>

<?php
include 'footer.php'
?>