<?php
include "../../connection.php";
$q=$_GET["q"];

$query = "SELECT * from user where USERNAME like'$q%'   ";
$result = mysqli_query($conn, $query);

$get_all_query = "SELECT * FROM user";
$get_all = mysqli_query($conn, $get_all_query);

//read data

if(empty($_GET)){
    while ($row = mysqli_fetch_assoc($get_all)) {
        $role_id = $row['ROLE_ID'];
        $get_role = "SELECT * FROM ROLE WHERE ROLE_ID = $role_id";
        $get_all_role = mysqli_query($conn, $get_role);
    
        $role = mysqli_fetch_assoc($get_all_role);
    
        echo "
            <tr>
                <td>" . $row['SSN'] . "</td>
                <td>" . $row['USERNAME'] . "</td>
                <td>
                " . $role['NAME'] . "
                </td>
                <td>
                    <div class='dropdown'>
                            <button class='dropbtn' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='material-icons'>menu</i>
                            </button>
                        <div class='dropdown-content' aria-labelledby='dropdownMenuButton'>
                            <a class='dropdown-item' href='../../actions/user/edit.php?id=" . $row['SSN'] . "'>Edit</a>
                            
                        </div>
                    </div>
                </td>
                
                </tr>
            ";
    }
}else{
    
    while ($row = mysqli_fetch_assoc($result)) {
        $role_id = $row['ROLE_ID'];
        $get_role = "SELECT * FROM ROLE WHERE ROLE_ID = $role_id";
        $get_all_role = mysqli_query($conn, $get_role);
    
        $role = mysqli_fetch_assoc($get_all_role);
    
        echo "
            <tr>
                <td>" . $row['SSN'] . "</td>
                <td>" . $row['USERNAME'] . "</td>
                <td>
                " . $role['NAME'] . "
                </td>
                <td>
                    <div class='dropdown'>
                            <button class='dropbtn' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='material-icons'>menu</i>
                            </button>
                        <div class='dropdown-content' aria-labelledby='dropdownMenuButton'>
                            <a class='dropdown-item' href='../../actions/user/edit.php?id=" . $row['SSN'] . "'>Edit</a>
                            
                        </div>
                    </div>
                </td>
                
                </tr>
            ";
    }
}
?>