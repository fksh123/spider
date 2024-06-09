<?php
include './inc/dbconfig.php';
include './inc/member.php';
   
$name     = (isset ($_POST['name'       ]) && $_POST['name'       ] != '') ? $_POST['name'       ] : '';
$subject  = (isset ($_POST['subject'    ]) && $_POST['subject'    ] != '') ? $_POST['subject'    ] : '';
$content  = (isset ($_POST['content'    ]) && $_POST['content'    ] != '') ? $_POST['content'    ] : '';


// 정규식, 정규 표현식 EXP (php에는 인코딩, 디코딩 포함) 공부할 것..몰라
// 이 부분은 인코딩 된 주소 변경

//$matches는 그릇
preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $content, $matches);

$img_array =[];
foreach($matches[1] AS $key => $val) {

    //치면 data:image/png;base64,AAAFB...
    //$배열로 담을 수 있는데 변수로 담겠다.
    list($type, $data) = explode(';', $val);
    // $type : data:image/png
    // $data : base64,asdad
    list(, $ext) = explode('/', $type);
    $ext = ($ext == 'jpeg') ? 'jpg' : $ext;
    $filename = date('Ymdhis').'_'.$key .'.'. $ext; //202303030123213_0.png 사진 이름 겹치지 않기 위해서 키값 설정
    
    list(,$base64_decode_data) = explode(',', $data);

    $rs_code = base64_decode($base64_decode_data);
    file_put_contents("upload/". $filename, $rs_code);

    //$content =str_replace(바꿀 대상, 변경할 이름, $content) 본문에는 인코딩 되어 있어서 바꾸는 과정

    $img_array[] = "upload/". $filename;
    $content =str_replace($val, "upload/". $filename, $content);

}

$imglist = implode('|', $img_array);
//|기준 이미자가 차곡차곡 쌓인다.

//db에 insert
$sql = "INSERT INTO board (name, subject, content, imglist, ip, rdate)
VALUES(:name, :subject, :content, :imglist, :ip, NOW())";

$ip =$_SERVER['REMOTE_ADDR'];

$stmt = $db->prepare($sql);
$stmt->bindParam(':name'   , $name   );
$stmt->bindParam(':subject', $subject);
$stmt->bindParam(':content', $content);
$stmt->bindParam(':imglist', $imglist);
$stmt->bindParam(':ip'     , $ip     );
$stmt->execute();

$arr = ['result' => 'success'];

$j = json_encode($arr); //{"result" : "success"}

die($j);