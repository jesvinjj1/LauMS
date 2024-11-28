<?php

$conn = mysqli_connect('localhost' ,'root','','user_db');
if($conn){
    echo "connection successfull";
}
else{
echo "failed";
};
?>
