<!DOCTYPE>
<html> 
    <head>
        <script type="text/javascript">
            function validate()
            {
                if (document.getElementById("user name").value == "Test"
                        && document.getElementById("password").value == "password")
                {
                    alert("validation succeeded");
                   return true;
                }
                else
                 {
                 alert( "validation failed" );
                 return false;
                 }
            }
        </script>
    </head>
    <body>
        <h2>Login Page</h2>
        <form method="post" action="New_Form.php">
            User Name: <input type="text" name="user name" id = "user name"> <br>
            <br>
            Pass word: <input type="password" name="password" id = "password">
            <input type="submit" value="Login" onclick="return validate()">   
        </form>

    </body>
</html>