
//오류가 발생한 이유는 js가 위 쪽에 있고 돔이 구성이 안된상태에서 먼저 로딩이 발생해서 자바를 안래에 놔야한다
document.addEventListener("DOMContentLoaded", () =>{
    const btn_login = document.querySelector("#btn_login")

    btn_login.addEventListener("click", () => {
    self.location.href='./login.php'
    })

})
//이러면 돔이 구성된 후에 로딩을 해라


