
<?php
include 'connect.php';
//$id=$_POST['s_id'];
//echo $id;
$disp= mysqli_query($conn, "select * from u_reg order by u_id;");
echo "<table>
    <tr >
    <th colspan='8' style='background-color:yellow'> View Details</th>
    </tr>
    <tr>
    <th>Id</th>    
    <th> First Name</th>
    <th> Last Name</th>
    <th> Date Of Birth</th>

    </tr>";
echo "<form>";

while($result = mysqli_fetch_array($disp, MYSQLI_ASSOC))
        {
    echo "<tr style='color:grey'>";
    echo "<td>".$result['u_id']."</td>"; 
    echo "<td>".$result['fname']."</td>";
    echo "<td>".$result['lname']."</td>";
    echo "<td>".$result['dob']."</td>";
    echo "</tr>";
}
echo "</form>";
echo "</table>";
?>

<html>
    <head>
        <style>
            table{
                border-collapse: collapse;
                background-color: lightgreen;
                width:500;
                border: 3;
            }
            table, th, td {
    border: 1px solid black;
}
th{
    background-color: lightgray;
    color:red;
    
}
td{
    color:black;
}
tr:nth-child(even) {background: #CCC}
tr:nth-child(odd) {background: #FFF}
        </style>
    </head>
    <body>
        
    </body>
</html>


