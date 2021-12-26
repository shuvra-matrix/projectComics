<?php include "database.php";  ?>
<?php
ini_set('display_errors', 0);
$username = $_GET["username"];
$ciphering = "AES-256-CBC";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '5489894647979744';
$encryption_key = "therewillbevkcpridemcbcfktu";
$encript_username = openssl_encrypt($username, $ciphering, $encryption_key, $options, $encryption_iv);
$token = $_GET['token'];
$querys = "SELECT * FROM users";
$result = mysqli_query($connection,$querys);
while ($row = mysqli_fetch_assoc($result))
{
    $data_token = $row['token'];
    if ($data_token == $token)
    {
        $query = "UPDATE users SET sub='yes' WHERE username = '$encript_username'";
        $updates = mysqli_query($connection,$query);
        if(isset($updates))
        {?>
            <?php include "header.php"; ?>
                <body>
                    <h4 style="color: #2EC486">You are verified</h4>
                </body>
            </html>
        <?php }
    }
    
}
?>

