<?php

include 'inc/dbconfig.php';//DB연결
include 'inc/member.php';


// 아이디 중복 테스트


$id ='spider2';//원래 db에 있는 아이디 입력

$mem = new Member($db);

if ( $mem -> id_exists($id)) {
    echo "아이디가 중복됩니다.";
} else {
    echo "사용할 수 있는 아이디 입니다.";
}