<?php
session_start();
session_destroy();
echo "<script>location.reload();</script>";
exit;
?>