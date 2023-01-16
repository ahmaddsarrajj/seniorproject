<?php
include "../../connection.php";
$q=$_GET["q"];

$query = "SELECT * from Coins where NAME like'$q%'   ";
$result = mysqli_query($conn, $query);

$get_all_query = "SELECT * FROM Coins";
$get_all = mysqli_query($conn, $get_all_query);

//read data

if(empty($_GET)){
    while($coins=mysqli_fetch_assoc($get_all)){

        $type_id = $coins['TYPE_ID'];
        $get_type = "SELECT * FROM TYPE WHERE TYPE_ID = $type_id";
        $get_single_type = mysqli_query($conn, $get_type);
         $type = mysqli_fetch_assoc($get_single_type);

             echo "
             <tr>
                 <td>".$Coins['COINS_ID']."</td>
                 <td>".$Coins['NAME']."</td>
                 <td>" .$Coins['PAGECOUNT']. "</td>
                 <td>".$Coins['symbol']."</td>
                 <td>".$type['NAME']."</td>
                 <td>
                     <div class='dropdown'>
                         <button class='dropbtn' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                             <i class='material-icons'>menu</i>
                         </button>
                         <div class='dropdown-content' aria-labelledby='dropdownMenuButton'>
                             <a href='../actions/Coins/edit.php?id=".$Coins['COINS_ID']."'>Edit</a>
                             <a href='../actions/Coins/delete.php?id=".$Coins['COINS_ID']."'>Delete</a>
                         </div>
                     </div>
                 </td>
             </tr>
            ";
    }
}else{
    
    while($books=mysqli_fetch_assoc($result)){

        $type_id = $Coins['TYPE_ID'];
        $get_type = "SELECT * FROM TYPE WHERE TYPE_ID = $type_id";
        $get_single_type = mysqli_query($conn, $get_type);
         $type = mysqli_fetch_assoc($get_single_type);

             echo "
             <tr>
                 <td>".$Coins['COIN_ID']."</td>
                 <td>".$Coins['NAME']."</td>
                 <td>" .$Coins['PAGECOUNT']. "</td>
                 <td>".$Coins['symbol']."</td>
                 <td>".$type['NAME']."</td>

                 <td>
                     <div class='dropdown'>
                         <button class='dropbtn' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                             <i class='material-icons'>menu</i>
                         </button>
                         <div class='dropdown-content' aria-labelledby='dropdownMenuButton'>
                             <a href='../actions/book/edit.php?id=".$Coins['COINS_ID']."'>Edit</a>
                             <a href='../actions/book/delete.php?id=".$Coins['COINS_ID']."'>Delete</a>
                         </div>
                     </div>
                 </td>
             </tr>
            ";
    }
}
?>