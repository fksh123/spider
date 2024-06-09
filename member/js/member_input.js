document.addEventListener("DOMContentLoaded", () => {
   
    //아이디 중복체크
    const btn_id_check = document.querySelector("#btn_id_check")
    btn_id_check.addEventListener("click", ()=> {
        const f_id= document.querySelector("#f_id")

        if(f_id.value == ''){
        alert('아이디를 입력해 주세요.')
        return false
        }
//여기서부터는 아이디가 입력 되었다는 전제
//AJAX?를 통해서 DB쿼리를 진행해야한다.
        const f1 = new FormData()
        f1.append('id', f_id.value)
        f1.append('mode','id_chk')


         
        const xhr = new XMLHttpRequest()
        xhr.open("POST", "./pg/member_process.php", "true")
        xhr.send(f1)//여기에 왜 f1을 넣어야하는지? form데이터 객체를 넣어야해서?

        xhr.onload= () => { 
          if(xhr.status ==200) { //200?뭘 가르키는 걸까
            const data =JSON.parse(xhr.responseText)//JSON타입으로 바꿔준다 
            if(data.result == 'success') {
                alert('사용이 가능한 아이디 입니다.')
                document.input_form.id_chk.value = "1"
            }else if(data.result == 'fail'){
                document.input_form.id_chk.value = "0"
                alert('이미 사용중인 아이디 입니다. 다른 아이디를 입력해주세요.')
                f_id.value =''//지워준다
                f_id.focus()//다시 그 칸으로 이동 시켜준다.
            } else if (data.result == 'empty_id') {
                alert('아이디가 비어 있습니다.')
                f_id.focus()
            }
          }
        }

    }) 

    //가입버튼 클릭시
    const btn_submit = document.querySelector("#btn_submit")
    btn_submit.addEventListener("click", ()=>{
        const f =document.input_form
    //이름 입력 확인       
        if(f.name.value == '') {
            alert('이름을 입력해주세요')
            f.name.focus()
            return false;
        }

        if(f.id.value == '') {
            alert('아이디를 입력해주세요')
            f.id.focus()
            return false;
        }
        //아이디 중복 확인 여부 체크
        if (f.id_chk.value == 0) {
        alert('아이디 중복 확인을 해주시기 바랍니다.')
        return false
        }
        
        //비밀번호 확인
        if(f.password.value == '') {
            alert('비밀번호를 입력해 주세요.')
            f.password.focus()
            return false
        }

        if(f.password2.value == '') {
            alert('확인용 비밀번호를 입력해 주세요.')
            f.password.focus()
            return false
        }

        //비밀번호 일치 여부 확인
        if(f.password.value != f.password2.value) {
            alert('비밀번호가 서로 일치하지 않습니다.')
            f.password.value = ''
            f.password2.value = ''
            f.password.focus()
            return false
        }

        f.submit()
    })
})