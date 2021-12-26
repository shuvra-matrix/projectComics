<?php include "templates/header.php" ?>
<body class="mw"  >
<h1 style="color: white">Welcome</h1>
    <p style="color: white">Enter you email address to get Comics every five minutes</p>
    <form  action="https://projectcomics.herokuapp.com/login.php" method="GET" >
        <label id="lable" for="user">Enter Your Email:</label>
        <input id="user" type="email" name="username" placeholder="yourmail@mail.com">
        <input class="button" type="submit" name="submit" value="Log In">
    </form>
</body>
</html>


