<?php
include '../inc/dbconfig.php';
include '../inc/member.php';

$mem = new Member($db);
$mem->logout();



/*session_start();
session_destroy();
?>
<script>
    self.location.href='../index.php';
</script>*/ //member.php로 옮겼다.  그럼 왜 옮겼을까?