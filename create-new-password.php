<?php
include 'header.php'
?>

<div class="body-image2">
    <section class="signup-form">
        
        <?php
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];
        
        if(empty($selector) || empty($validator)){
            echo "Could not validate your request!";
        }else{
            if(ctype_xdigit($selector)!== false && ctype_xdigit($validator) !== false){
        ?>
            
        <form action="includes/reset-password.inc.php" method="post">
            <input type="hidden" name="selector" value="<?php echo $selector ?>">"
            <input type="hidden" name="selector" value="<?php echo $validator ?>">"      
            <input type="password" name="pwd" placeholder="Enter a new Password">
            <input type="password" name="pwd-repeat" placeholder="Repeat new Password">
            <button type="submit" name="reset-password-submit"> Reset Password </button>
        </form>
        
        <?php        
            }
        }
        
        ?>
        
    </section>
</div>

<?php
include 'footer.php'
?>