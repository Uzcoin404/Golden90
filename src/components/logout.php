<?php

unset($_COOKIE['email']);
setcookie('email', null, -1, '/');
header("Location: /admin");
exit();
