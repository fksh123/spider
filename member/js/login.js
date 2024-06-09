document.addEventListener("DOMContentLoaded", () =>{
    const btn_login = document.querySelector("#btn_login")//값이 채웠는지 확인하기
    btn_login.addEventListener("click", () => {
        const f_id =document.querySelector("#f_id")
        if(f_id.value == '') {
            alert('아이디를 입력해주세요')
            f_id.focus()
            return false
        }
        const f_pw = document.querySelector("#f_pw")
        if(f_pw.value == '') {
            alert('비밀번호를 입력해주세요')
            f_pw.focus()
            return false
        }
    //ajax 방식 사용 404가 뜨면 성공이다. login_process.php전이여서 뜨는 거다.
    const xhr = new XMLHttpRequest()
    xhr.open("POST", "./pg/login_process.php", "true")

    const f1 =new FormData()
    f1.append("id", f_id.value)
    f1.append("pw", f_pw.value)

    xhr.send(f1)

    xhr.onload = () =>{
        if(xhr.status ==200 ) {

            const data =JSON.parse(xhr.responseText);
            if(data.result == 'login_fail') {
                alert('해당 정보는 존재하지 않습니다.')
                f_id.value = ''
                f_pw.value = ''
                f_id.focus()
                return false
            } else if( data.result == 'login_success') {
                alert('로그인에 성공했습니다.')
                self.location.href='./index.php' //로그인 성공했을때 이동하는 url
            }

        } else {
            alert('통신에 실패했습니다. 다음에 다시 시도해 주시기 바랍니다.');
        }
    }

    })

})//로그인은 두 가지 방식이 존재한다. 1. ajax방식, form 액션 이용해서 이동 가능 하다. 