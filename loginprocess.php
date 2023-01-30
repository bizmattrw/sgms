<?php
session_unset();
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Authentification - CDMS</title>
    <style type="text/css">
        body {
            margin: auto;
            margin-top: 0px;
            margin-bottom: 20px;
            background-image: url("images/fond.png");
            background-color: #303030;
        }

        #window {
            background-color: #0F0923;
            height: 200px;
            width: 50%;
            color: #FFFFFF;
            margin-top: 0px;
            margin-left: 25%;
            -moz-border-radius: 0.5em 0.5em 0.5em 0.5em;
            border-radius: 0.5em 0.5em 0.5em 0.5em;
            box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 1px 1px;
        }
    </style>
</head>

<body bgcolor="#D9D6DA">
    <br />
    <br />
    <br />

    <body id="window">
        <br />
        <br />
        <br />
        <?php
        if ($username && $password) {
            include "includes/dbcon.php";
            include "includes/functions.php";

            $query = "SELECT * FROM `users` WHERE username = '$username'";
            // echo $query;
            $result = $con->query($query);
            

            if ($result->num_rows > 0) 
                while ($row = $result->fetch_assoc()) {
                    // print_r($row);

                    $dbusername = $row['username'];
                    $dbpassword = $row['password'];
                    $dbNames = $row['names'];

                  


                    if (($username == $dbusername) && ($password == $dbpassword)) {
                        $_SESSION["user_id"] = $row["id"];
                        $_SESSION['username'] = $username;
                        $_SESSION["names"] = $dbNames;

                        echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_dashboard.php\">";
                    } else {
                        echo "<center>";
                        echo "<font color=red size=+2>Incorrect password ! </font><br> wait 2 secondes to try again";
        ?>
                        <form name="redirect">
                            <input type="text" size="1" name="redirect2" align="middle" border="0">
                        </form>
                        <script>
                            //change below target URL to your own
                            var targetURL = "index.php"
                            //change the second to start counting down from
                            var countdownfrom = 2

                            var currentsecond = document.redirect.redirect2.value = countdownfrom + 1

                            function countredirect() {
                                if (currentsecond != 0) {
                                    currentsecond -= 1
                                    document.redirect.redirect2.value = currentsecond
                                } else {
                                    window.location = targetURL
                                    return
                                }
                                setTimeout("countredirect()", 1000)
                            }

                            countredirect()
                        </script>
                        <br />
                        <hr />
        <?php
                        echo "</center>";
                    }
                }
            }
        
        ?>
    </body>

</html>