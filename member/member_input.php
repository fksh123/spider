<?php
//바로 접속하는 걸 막기위해서 Array ( [chk] => 1 ) 사용
//바로 접속하면 Array()라고 뜸
if(!isset($_POST['chk']) or $_POST['chk'] != 1) {
    // die ("<script>
    // alert('약관 등을 동의하시고 접근하시기 바랍니다');
    // self.location.href='./sripulation.php'
    // </script>" );
}

$js_array = ['js/member_input.js'];

$g_title = '회원가입';

include 'inc_header.php'; 
?> 
<main class="w-50 mx-auto border roinded-5 p-5">
    <h1 class="text-center">회원가입</h1> 
    <form name="input_form" method="post" enctype="multipart/form-data" action="pg/member_process.php"> 
        <input type="hidden" name ="mode" value="input">
        <input type="hidden" name="id_chk" value="0">

    <div class="d-flex gap-2 align-items-end">
      <div>
      <label for="f_name" class="form-lable">이름</label>
      <input type="text" name="name" class="form-control" id="f_name" placeholder="이름을 입력해 주세요">
      </div>
    </div>
  
    <div class="d-flex gap-2 align-items-end">
      <div>
      <label for="f_id" class="form-lable">아이디</label>
      <input type="text" name="id" class="form-control" id="f_id" placeholder="아이디를 입력해 주세요">
      </div>
      <button type="button" class="btn btn-secondary" id="btn_id_check">아이디 중복확인</button>  
    </div>

  <div class="d-flex gap-2 justify-content-between">
  <div class="flex-grow-2">
         <label for="f_pw" class="form-lable">비밀번호</label>
        <input type="password" name="password"  class="form-control" id="f_pw" placeholder="비밀번호를 입력해 주세요">
  </div>
  <div class="flex-grow-1">
         <label for="f_pw2" class="form-lable">비밀번호 확인</label>
        <input type="password" name="password2"class="form-control" id="f_pw2" placeholder="비밀번호를 입력해 주세요">
  </div>
</div>
<div class="mt-3 d-flex gap-2">
    <button type="button" class="btn btn-primary w-50" id="btn_submit">가입확인</button>
    <button class="btn btn-secondary w-50">가입취소</button>
</div>
</form>
</main>

<?php
include 'inc_footer.php';
?> 

