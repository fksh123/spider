<?php
session_start();

$ses_id = (isset($_SESSION['ses_id']) && $_SESSION['ses_id'] != '') ? $_SESSION['ses_id'] : '';

if($ses_id == '') {

    echo "
    <script>
       alert('로그인 후 접근이 가능한 메뉴입니다.')
       self.location.href='./index.php';
    </script>
    ";
    exit;
}
include 'inc/dbconfig.php';
include 'inc/member.php';

$mem = new Member($db);

$memArr = $mem->getInfo($ses_id);

$g_title = '팀 소개';

include 'inc_header.php'; 
?> 
<main class="w-50 mx-auto border roinded-5 p-5">
    white spider<br>
    <img src="imeges/icon.svg" style="width:2rem" class="me-2">
    <a href="http://localhost/member/imeges/icon.svg" download >아이콘 다운로드</a>
</main>

<?php
include 'inc_footer.php';
?> 