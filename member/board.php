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
include 'page.php';

$limit = 5;
$page_limit =5;

$page = (isset($_GET['page']) && $_GET['page'] != '' && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$sql = "SELECT COUNT(*) cnt FROM board";
$stmt = $db->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$row = $stmt->fetch();
$total = $row['cnt'];


$sql = "SELECT * FROM board ORDER BY idx DESC LIMIT $start, $limit";
$stmt = $db->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$rs = $stmt->fetchAll();


$mem = new Member($db);

$memArr = $mem->getInfo($ses_id);

$g_title = '게시판';

include 'inc_header.php'; 
?> 
<main>
<div class="container mt-3">
    <h1 class="h1">게시판</h1>
</div>
<div class = "container mt-3">
    <table class="table table-bordered table-hover">
        <colgroup>
            <col width="7%"/>
            <col width="63%"/>
            <col width="10%"/>
            <col width="10%"/>
        </colgroup>
        
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>글쓴이</th>
            <th>등록일</th>
        </tr>
        </thead>
        <?php
        foreach($rs AS $row) {
        ?>
        <tr class="view_detail" data-idx="<?= $row['idx']; ?>">
            <td class="text-center"><?=$row['idx']; ?></td>
            <td class="text-center"><?=$row['subject']; ?></td>
            <td class="text-center"><?=$row['name']; ?></td>
            <td class="text-center"><?=substr($row['rdate'],0,10); ?></td>
        </tr>
        <?php } ?>
    </table>
    
    <div class="mt-3 d-flex justify-content-between align-items-start">
    <?php

            $rs_str = my_pagination($total, $limit, $page_limit, $page);
            echo $rs_str;
            ?>
        
        <button class="btn btn-primary" id="btn_write">글쓰기</button>

    </div>
</div>

<script>
    const btn_write = document.querySelector("#btn_write")
    btn_write.addEventListener("click", ()=> {
        self.location.href='write.php';
    })

    const view_detail = document.querySelectorAll(".view_detail")
    view_detail.forEach( (box)=>{
        box.addEventListener("click", () => {
        self.location.href='./view.php?idx='+ box.dataset.idx
        })
    })
</script>
            
</main>

<?php
include 'inc_footer.php';
?> 