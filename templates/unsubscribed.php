<?php include "database.php"; ?>
<?php
ini_set('display_errors', 0);
$token = $_GET["vf1"];
$otp = $_GET['vf2'];
$query = "SELECT * FROM users";
$result = mysqli_query($connection,$query);
$ciphering = "AES-256-CBC";
$options = 0;
$encryption_iv = '5489894647979744';
$encryption_key = "therewillbevkcpridemcbcfktu";
$decryption_iv = '5489894647979744';
$decryption_key = "therewillbevkcpridemcbcfktu";

while($row = mysqli_fetch_assoc($result))
{
    $database_token = $row["token"];
    $database_otp = $row["otp"];
    $database_username = $row["username"];
    if ($database_otp==$otp && $database_token==$token)
    {
        $query = "DELETE FROM users WHERE username = '$database_username'";
        $result = mysqli_query($connection,$query);
        if(!$result)
        {
            die("Queary Failed");
        }
        else
            { ?>
            <?php include "header.php"; ?>
            <body>
            <h4 style="color: #2EC486">Successfully Unsubscribed</h4>
            </div>
            </div>
            </body>
            </html>
    <?php  }
                 }

}
if ($database_token !=$token || $database_otp != $otp)
{?>


    <?php include "header.php"; ?>
    <body>
            <h4 style="color: red">Invalid Email!</h4>
        </div>
    </div>
    </body>
    </html>
    <?php }
?>
