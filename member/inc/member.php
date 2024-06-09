<?php
//member class file
//class?
class Member{
    //맴버 변수, 프로퍼티
    private $conn;//db연결 객체 받아오기 member table하고 관련
//생성자 class에서 인스턴스 
    public function __construct($db) {
    $this-> conn =$db;

    }

    //아이디 중복체크용 멤버 함수, 메소드
    public function id_exists($id) {
        $sql="SELECT * FROM member WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
//? 공부
        return $stmt->rowCount() ? true : false;//이게 있는 id 숫자를 나타냄 즉, 존재하면 중복데스
    }
    //회원 정보 입력, 로그인 시 여기 이용 가능하다
    public function input($marr) {
    

        //단반향 암호화$new_hash_password = password_hash($marr['password'], PASSWORD_DEFAULT)
        // $marr['password']을 지우고  $new_hash_password 삽입


        $sql ="INSERT INTO  member(name, id, password, create_at, ip) VALUES
                (:name, :id, :password, NOW(), :ip)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name'     , $marr['name']);
        $stmt->bindParam(':id'       , $marr['id']);
        $stmt->bindParam(':password' , $marr['password']);
        $stmt->bindParam(':ip'       , $_SERVER['REMOTE_ADDR']);//왜 여기는 다른가?
        $stmt->execute();


    }
    //로그인
    public function login($id, $pw) {
        //PASSWORD는 이미 암호화했다.
        // password_verify($password, $new_password) 해서 비교한다



        $sql = "SELECT * FROM member WHERE id=:id AND password=:password";// "SELECT password FROM member WHERE id=:id;(암호화)
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':password', $pw);//여긴 삭제(암호화)
        $stmt->execute();

        /*if( $stmt->rowCount()) {
            $row = $stmt->fetch();
        }
        
        if ( password_verify($pw, $row['password'])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }*/

        return $stmt->rowCount() ? true : false;//이게 있는 id 숫자를 나타냄 즉, 존재하면 중복데스 즉 만족시키는 로그가 하나라도 있으면 true고 (암호화시 삭제)
    }

    //로그 아웃 구현
    public function logout(){
    session_start();
    session_destroy();
    
    
    die('<script> self.location.href="../index.php";</script>');

   }

   public function getInfo($id) {
   $sql = "SELECT * FROM member WHERE id=:id";
   $stmt = $this->conn->prepare($sql);
   $stmt->bindParam(":id", $id);
   $stmt->setfetchMode(PDO::FETCH_ASSOC);//ASSOC대신 NUM으로 하면 숫자로 온다
   $stmt->execute();
   return $stmt->fetch();

   }

   public function edit($marr){
    $sql = " UPDATE member SET name=:name ";                        
    $params = [
    ':name' => $marr['name'],
    ':id' => $marr['id']
    ];

    if($marr['password'] != '') {
        $params[':password'] =  $marr['password'];
         
        $sql .=", password =:password";
    }

    $sql .=" WHERE id=:id";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute($params);
   }
}

