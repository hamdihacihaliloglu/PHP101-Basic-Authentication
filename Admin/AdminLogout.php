<?php

unset($_SESSION["Yonetici"]);

session_destroy();

header("Location:index.php?AR0=1");
exit();
?>