<?php

session_start();

$ses_id = (isset($_SESSION['ses_id']) && $_SESSION['ses_id'] != '') ? $_SESSION['ses_id'] : '';

if($ses_id == '') {

    echo "
    <script 접근>
       alert('로그인 후이 가능한 메뉴입니다.')
       self.location.href='./index.php';
    </script>
    ";
    exit;
}
include 'inc/dbconfig.php';
include 'inc/member.php';

$idx = (isset($_GET['idx']) && $_GET['idx'] != '' && is_numeric($_GET['idx'])) ? $_GET['idx'] : '';

if ($idx == '') {
    exit('접근을 허용하지 않습니다');
}

$sql = "SELECT * FROM board WHERE idx=:idx";
$stmt = $db->prepare($sql);
$stmt->bindParam(':idx', $idx);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute(); 

$row = $stmt->fetch();


$mem = new Member($db);

$memArr = $mem->getInfo($ses_id);

$g_title = '게시글';

include 'inc_header.php'; 

?> 
<main>

<div class="container mt-3 w-50">
    <h1 class="h1">게시글</h1>
</div>

<div class="cotainer my-3 border border-1 w-50 vstack">

  <div class="p-3">
    <span class="h3 fw-bolder"><?= $row['subject']; ?></span>
  </div>

  <div class="d-flex px-3 border border-top-0 border-start-0 border-end-0 border-bottom-1">
    <span class="me-auto"><?=$row['name'   ]; ?></span>
    <span><?=$row['rdate'  ]; ?></span>
  </div>

  <div class="p-3">
    <?=$row['content']; ?> <br>
  </div>
  <div class="d-flex gap-2 p-3">
    <button class="btn btn-secondary me-auto" id="btn_list">목록</button>
    <button class="btn btn-danger" id="btn_del">삭제</button>
  </div>
</div>

<script>
    const btn_list = document.querySelector("#btn_list")
    btn_list.addEventListener("click", () => {
        self.location.href='board.php'
    })
</script>

<script>
    const btn_del = document.querySelector("#btn_del")
    btn_del.addEventListener("click", () => {
        self.location.href='del.php'
    })
</script>
</main>

<?php include 'inc_footer.php'; ?>