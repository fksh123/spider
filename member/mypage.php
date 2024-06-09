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

/*$js_array = ['js/mypage.js'];*/

$g_title = '내 정보';

include 'inc_header.php'; 
?> 
<main class="w-50 mx-auto border roinded-5 p-5">
    <h1 class="text-center">내 정보</h1> 
    <form name="input_form" method="post" enctype="multipart/form-data" action="pg/member_process.php">     
        <input type="hidden" name ="mode" value="edit">
    

    <div class="d-flex gap-2 align-items-end">
      <div>
      <label for="f_name" class="form-lable">이름</label>
      <input type="text" name="name" class="form-control" id="f_name" value="<?= $memArr['name']; ?>" placeholder="이름을 입력해 주세요" readonly>
      </div>
    </div>
  
    <div class="d-flex gap-2 align-items-end">
      <div>
      <label for="f_id" class="form-lable">아이디</label>
      <input type="text" name="id" class="form-control" id="f_id" value="<?= $memArr['id'];?>" placeholder="아이디를 입력해 주세요" readonly>
      </div>
    </div>

</form>
</main>

<?php
include 'inc_footer.php';
?> 