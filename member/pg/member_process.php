<?php
include '../inc/dbconfig.php';
include '../inc/member.php'; //member class정의된 파일

$mem = new Member($db);
//post로 mode값이 없을 수 도 있기에 설정해주기
$id        = (isset ($_POST['id'      ]) && $_POST['id'      ] != '') ? $_POST['id'      ] : '';
$name      = (isset ($_POST['name'    ]) && $_POST['name'    ] != '') ? $_POST['name'    ] : '';
$password  = (isset ($_POST['password']) && $_POST['password'] != '') ? $_POST['password'] : '';

$mode      = (isset ($_POST['mode'    ]) && $_POST['mode'    ] != '') ? $_POST['mode'    ] : '';

// 아이디 중복 체크
if($mode == 'id_chk') {

    if($id =='') {
        die(json_encode(['result'=>'empty_id']));
    }

if($mem->id_exists($id)){

    die(json_encode(['result'=> 'fail']));
    /*echo 'no!!unalbe id.';
    $arr = ['result'=> 'fail'];// 배열
    $json = json_encode($arr);// json? 타입 {"result" : "fail"} 로 변경 해준다는 뜻이다

    die($json);*/
} else {

    die(json_encode(['result'=> 'success']));
}
}
//넘어온 값 확인
else if ($mode == 'input') {
    
    $arr = [
        'id' => $id,
        'name' => $name,
        'password' => $password
        
    ];

    $mem->input($arr);

    echo"
    <script>
       self.location.href='../member_success.php'
    </script>
    ";
} else if($mode == 'edit') {

    session_start();

    $arr = [
        'id' => $_SESSION['ses_id'],
        'name' => $name,
        'password' => $password
        
    ];

    
    $mem->edit($arr);

    echo"
    <script>
       alert('수정 성공')
       self.location.href='../index.php'
    </script>
    ";
 }
