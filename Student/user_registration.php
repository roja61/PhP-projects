<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title> Student Registration Form</title>  
    <style>
        table, td,th{
        border: 1px solid black;
        }
        
        table{
        border-collapse:collapse;
        width:25%;
        }
        
        th{
        color:lightyellow;
        background: lightslategray;
        height: 50px;
        }
    </style>    
    </head>
    <body>
        <h3> Student Registration Form</h3>
        <Form method="post" action="login.php">          
            <table>
                <tr>
                    <th colspan='2'>Student Registration</th>
                </tr>
                <tr>
                    <td align='center'> Student ID:</td>
                    <td><input type="number" name="Id" placeholder="Student ID" >
                        <font color='red' ><?php echo @$_GET['Id']; ?></font>
                    </td>
                </tr>
                <tr>
                    <td align='center'> First name:</td>
                    <td><input type="text" name="First_name" placeholder="First Name" >
                    </td>
                </tr>
                <tr>
                    <td align='center'> Last name:</td>
                    <td><input type="text" name="Last_name" placeholder="Last Name">
                    </td>
                </tr>
                <tr>
                    <td align='center'> Date of Birth:</td>
                    <td><input type="date" name="bday" placeholder="Date of Birth">
                    </td>
                </tr>
                <tr>   
                <td align="center"><input type="submit" value="submit" > 
                
                </tr>
            </table>
        </Form>         
    </body>
</html>
