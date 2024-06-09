/*document.addEventListener("DOMContentLoaded", () => {
   
    

    //가입버튼 클릭시
    const btn_submit = document.querySelector("#btn_submit")
    btn_submit.addEventListener("click", ()=>{
        const f =document.input_form     
     

        if(f.id.value == '') {
            alert('아이디를 입력해주세요')
            f.id.focus()
            return false;
        }
       
        
        //비밀번호 확인
        if(f.password.value !='' && f.password2.value == '') {
            alert('확인용 비밀번호를 입력해 주세요.')
            f.password2.focus()
            return false
        }
        //비밀번호 일치여부 확인
        if(f.password.value !='' && f.password2.value == '') {
            alert('비밀번호가 서로 일치 하지 않습니다.')
            f.password.value = ''
            f.password2.value = ''
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
    
})*/