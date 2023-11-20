<?php 
$db_name='mysql:host=localhost;dbname=shopping_cart';
$db_user_name = 'root';
$db_user_pass ='';
$conn=new PDO($db_name,$db_user_name,$db_user_pass);
function create_unique_id() {
        $charcters='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charcters_length = strlen($charcters);
        $random= '';
        for($i=0;$i<20; $i++) {
                $random .= $charcters[mt_rand(0,$charcters_length-1)];  
        }
        return $random;
}
?>