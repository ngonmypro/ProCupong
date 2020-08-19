<?php include "Connections/connect_mysql.php";

    //echo $_POST['id'],' ',$_POST['iddelete'];
    $sqlDEL = 'DELETE FROM tbluser WHERE use_id = "'.$_POST["id"].'" ';
    $resultDEL = mysql_query($sqlDEL) or die(mysql_error());

    mysql_close($c);
    echo "Y";
?>
