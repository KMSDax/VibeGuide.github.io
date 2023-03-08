<?php 
include_once 'header.php';
include 'includes/functions.inc.php';
include 'includes/mysql-connect.php';


	$s = "luis2";
    $query = "SELECT usersID, firstName, lastName, email, userid
                FROM users
                WHERE userid='$s'";
	$con = mysqli_connect("localhost", "root", "", "vibeguide");
    $result = mysqli_query($con, $query);

?>

    <div class="body-image2">
        <div class="flexArea">
            <main>
                <!-- User Info Panel (Let-side flex) -->
                <div class="flexBox">
                <?php 
                while(list($usersID, $firstName, $lastName, $email, $userid) = mysqli_fetch_row($result)) {
                    echo"<table>
                            <tr><td><h1>Profile Page</h1></td></tr>
                            <tr><td><label class='form-label' > pfp </label></td></tr>
                            <tr><td><input type='file' name='pass'></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            
                            <tr><td>First Name: </td><td>$firstName</td></tr>
                            <tr><td>Last Name: </td><td>$lastName</td></tr>
                            <tr><td>email: </td><td>$email</td></tr>
                            <tr><td>Username: </td><td>$userid</td></tr>
                            
                        </table>";
                    }
                ?>
                </div>
                
                <!-- Settings Panel (Right-side flex) -->
                <div class="flexBox">
                    <table>
                        <tr><td><h1>Settings Panel</h1></td></tr>
                        <tr><td><button type="submit" name="submit">Edit Profile</button></td></tr>
                    </table>
                </div>
            </main>
        </div>
            

<?php 
include_once 'footer.php';
?> 
