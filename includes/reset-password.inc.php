<?php

if(isset($_POST["reset-password-submit"])){
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];
    $email = $_POST["email"];//added test
    
    if(empty($password) || empty($passwordRepeat)){
        header("Location: ../create-new-password.php?newpwd=empty");
        exit();
    } else if($password != $passwordRepeat){
        header("Location: ../create-new-password.php?newpwd=pwddontmatch");
        exit();
    }
    
    $currentDate = date("U");
    
    require 'mysql-connect.php';
    
    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelect=? AND pwdResetExpires>=?";
    $stmt = mysqli_stmt_init($conn);  
    
    
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "There was an error!";
        exit();
    }else {
        mysqli_stmt_bind_param($stmt, "s", $selector);
        mysqli_stmt_execute($stmt);
        
        $result = mysqli_stmt_get_result($stmt);
        
        if(!$row = mysqli_fetch_assoc($result)){
            echo "You need to resubmit your resent request!";
            exit();
        }else{
            
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin,$row["pwdResetToken"]);
            
            if($tokenCheck === false){
                echo "You need to resubmit your resent request!";
                exit();
            } elseif($tokenCheck === true){
                
                $tokenEmail = $row['pwdResetEmail'];
                
                $sql = "SELECT * FROM users WHERE emailUsers= ?;";
                $stmt = mysqli_stmt_init($conn);
    
                if(!mysqli_stmt_prepare($stmt,$sql)){
                   echo "There was an error!";
                   exit();
                }else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if(!$row = mysqli_fetch_assoc($result)){
                        echo "There was an error!";
                        exit();
                    }else{
//Update the User Password
                        $sql = "UPDATE users SET password=? WHERE email=?";
                        $stmt = mysqli_stmt_init($conn);
    
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            echo "There was an error!";
                            exit();
                        }else {
                            $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newPwdHash,$tokenEmail);
                            mysqli_stmt_execute($stmt);
//Delete password reset Token                            
                            $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                            $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt,$sql)){
                            echo "There was an error!";
                            exit();
                            }else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: ../login.php?newpwd=passwordupdated");
                                 //added test
    if(InvalidUserid($email)!==false){ 
        header("location: ../signup.php?error=InvalidEmail");
        exit();
    }   
    //test end   
                            }
                        }
                    }
                }
            }
        }
    }
    
    
    
    
}else{
    header("Location: ../index.php");
}
