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

$mem = new Member($db);

$memArr = $mem->getInfo($ses_id);

$g_title = '게시판';

include 'inc_header.php'; 

?> 
<main>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    
    <div class="mt-4 mb-2">
      <h1>White Spider<h1>
    </div>
    <div class="mb-2">
      <label for="f_name" class="form-lable">작성자</label>
      <input type="text" name="name" class="form-control" id="id_name" value="<?= $memArr['name']; ?>"  readonly>
    </div>
    <div>
      <label class="form-lable">제목</label>
      <input typ="text" name="subject" class="form-control mb-2" placeholder="제목을 입력하시요." autocomplete="off" id="id_subject">
    </div>
  






    <div id="summernote"></div>

    <div class="mt-2 d-flex gap-2 justify-content-end">
      <button class="btn btn-primary" id="btn_submit">확인</button>
      <button class="btn btn-secondary">목록</button>
    </div>

    <script>
      const btn_submit = document.querySelector("#btn_submit")
      btn_submit.addEventListener("click", () => {
        
        const id_subject =document.querySelector("#id_subject")
        if(id_subject.value == '') {
            alert('제목을 입력해주세요.')
            id_subject.focus()
            return false
        }

        const markupStr = $('#summernote').summernote('code')
        if(markupStr == '<p><br></p>') {
          alert('내용을 입력해주세요.')
          return false
        }

        

        const f2 = new FormData()
        f2.append('name', id_name.value)
        f2.append('subject',id_subject.value)
        f2.append('content',markupStr)

        const xhr = new XMLHttpRequest()
        xhr.open("POST", "./pgboard1.php", "true")
        xhr.send(f2)
        btn_submit.disabled = true

        xhr.onload= () => { 
          if(xhr.status ==200) {
            
            const data = JSON.parse(xhr.responseText)
            if(data.result == 'success') {
              alert('글이 성공적으로 등록되었습니다.')
              self.location.href='board.php';
            }else{
              alert('글 등록이 실패했습니다.')
            }
            
          }else {
            alert('통신에 실패했습니다.')
          }
        }
      
      })
        
      $('#summernote').summernote({
        placeholder: '글 내용을 입력하시요.',
        tabsize: 2,
        height: 300,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });

    </script>
    </main>

    <?php include 'inc_footer.php'; ?>
