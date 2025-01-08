<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGMS</title>

    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        fieldset {
            width: 400px;
            border: none;
            border-radius: 4px;
            margin-left: 40%;
            margin-top: 120px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            background-color: white;
        }

        input {
            border: none;
            border-bottom: 2px solid teal;
            width: 100%;
            padding: 12px 0px;
            outline: none;
            font-size: 18px;
        }

        input:focus {
            border-color: teal;
            outline: none;
        }

        button {
            border: none;
            padding: 6px 60px;
            background-color: teal;
            color: white;
            font-weight: 500;
            font-size: 18px;
            border-radius: 14px;
            cursor: pointer;
        }

        #container {
            margin-left: 30%;
        }

        a {
            text-decoration: none;
            color: teal;
            font-size: 20px;
        }

        legend {
            margin-left: 36%;
            font-size: 24px;
            background-color: teal;
            color: white;
            padding: 38px 20px;
            border-radius: 60px;
        }

        h3 {
            color: teal;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: teal;
            color: white;
            text-align: center;
            padding: 20px;
        }

        body {
            background-image: url('svg.svg');
            background-repeat: no-repeat;
            background-size: 500px;
            background-position: 120px;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend><b>SGMS</b></legend>
        <form role="form" method="POST" action="loginprocess.php">
            <p>
                <label for="username"><h3>Username</h3></label>
                <input type="text" id="username" placeholder="Username" autofocus required title="Username" name="username" minlength="4" maxlength="20">
            </p>
            <p>
                <label for="password"><h3>Password</h3></label>
                <input type="password" id="password" placeholder="Password" required title="Password" name="password">
                <input type="checkbox" onclick="togglePassword()"> Show Password
            </p>
            <p id="container">
                <button type="submit">Login</button>
            </p>
        </form>
    </fieldset>

    <footer>
        <h3>Powered By Mathias</h3>
    </footer>
    <script>
        function togglePassword() {
            var password = document.getElementById("password");
            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
        }
    </script>
    <script src="//code.tidio.co/sn8lx7modbgnihs5wxsbdmkhktqgshmz.js" async></script>
</body>

</html>
