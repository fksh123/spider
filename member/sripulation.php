<?php 

$js_array = ['js/member.js' ];

$g_title = '약관';

include 'inc_header.php'; 

?>
          <main>
            <h1 class="text-center mt-5">회원 약관 및 개인 정보 취급방침 동의</h1>
            <h4>회원 약관</h4>
            <textarea name="" id="" cols="30" rows="10" class="form-control">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam magni et in iste perferendis aut 
                eos numquam accusamus. Quae architecto, dicta nobis tempore molestiae, 
                fugiat voluptatem repellendus recusandae amet suscipit dolor illum! Vero modi sapiente vitae eius. 
                Dolorum assumenda magnam eum nam excepturi ad dignissimos odit itaque totam. Enim id at qui minima. 
                In quod aliquam cupiditate ducimus totam impedit odio ea. Quia animi repudiandae nesciunt id at? Quisquam 
                blanditiis esse, dolorum nobis incidunt dicta perspiciatis, doloremque aliquam labore dolor veniam facilis ab, 
                vel odit voluptatibus minus molestias non placeat tenetur ipsa delectus culpa. Unde, qui possimus veritatis expedita 
                voluptate voluptatem ratione corporis labore rerum dolorem ipsam a asperiores corrupti incidunt perferendis error dicta
                 quis neque architecto! Dicta doloremque quas sit voluptatem facilis, magnam libero odit, quod perspiciatis repudiandae
                  non provident beatae deleniti quos eos! Obcaecati eaque vero debitis molestiae. Rerum aliquam fuga sint enim fugit
                   blanditiis cumque, odit inventore? Alias hic, architecto maxime quas quidem voluptates fuga modi eos nemo eaque
                    nostrum, porro earum accusantium nihil deleniti omnis quos mollitia neque, quibusdam ullam a? Quidem ipsa soluta 
                    laudantium vitae natus odit, magnam nam quibusdam blanditiis culpa alias ducimus modi repudiandae debitis optio, 
                    deleniti, vel atque et vero unde ullam beatae ad. Amet iure, excepturi explicabo quasi recusandae, eius magnam dicta eveniet
                     quia debitis sit nemo necessitatibus laboriosam at laborum, tempore ratione harum numquam ad quas magni ipsum vitae. A dicta 
                     perspiciatis perferendis, temporibus nemo aut dignissimos, unde corrupti odio facere dolorum amet ullam error sapiente 
                     consequuntur. Harum assumenda alias ipsam tempora! Vitae dignissimos, reprehenderit quos tenetur incidunt, ut assumenda nam, itaque illo hic fuga facere. 
                     Tempora magni eaque officia similique perspiciatis praesentium dolore iste veniam illum quae porro aliquid magnam voluptate fugit officiis velit delectus molestias, nisi suscipit? 
                     Tempore, iure autem consequuntur nihil voluptates consectetur 
                    assumenda a veritatis accusantium?
            </textarea>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" id="chk_member1">
                <label class="form-check-label" for="chk_member1">
                  위 약관에 동의하기겠습니까?
                </label>
              </div>

            <h4>개인정보 취급 방침</h4>
            <textarea name="" id="" cols="30" rows="10" class="form-control">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam magni et in iste perferendis aut 
                eos numquam accusamus. Quae architecto, dicta nobis tempore molestiae, 
                fugiat voluptatem repellendus recusandae amet suscipit dolor illum! Vero modi sapiente vitae eius. 
                Dolorum assumenda magnam eum nam excepturi ad dignissimos odit itaque totam. Enim id at qui minima. 
                In quod aliquam cupiditate ducimus totam impedit odio ea. Quia animi repudiandae nesciunt id at? Quisquam 
                blanditiis esse, dolorum nobis incidunt dicta perspiciatis, doloremque aliquam labore dolor veniam facilis ab, 
                vel odit voluptatibus minus molestias non placeat tenetur ipsa delectus culpa. Unde, qui possimus veritatis expedita 
                voluptate voluptatem ratione corporis labore rerum dolorem ipsam a asperiores corrupti incidunt perferendis error dicta
                 quis neque architecto! Dicta doloremque quas sit voluptatem facilis, magnam libero odit, quod perspiciatis repudiandae
                  non provident beatae deleniti quos eos! Obcaecati eaque vero debitis molestiae. Rerum aliquam fuga sint enim fugit
                   blanditiis cumque, odit inventore? Alias hic, architecto maxime quas quidem voluptates fuga modi eos nemo eaque
                    nostrum, porro earum accusantium nihil deleniti omnis quos mollitia neque, quibusdam ullam a? Quidem ipsa soluta 
                    laudantium vitae natus odit, magnam nam quibusdam blanditiis culpa alias ducimus modi repudiandae debitis optio, 
                    deleniti, vel atque et vero unde ullam beatae ad. Amet iure, excepturi explicabo quasi recusandae, eius magnam dicta eveniet
                     quia debitis sit nemo necessitatibus laboriosam at laborum, tempore ratione harum numquam ad quas magni ipsum vitae. A dicta 
                     perspiciatis perferendis, temporibus nemo aut dignissimos, unde corrupti odio facere dolorum amet ullam error sapiente 
                     consequuntur. Harum assumenda alias ipsam tempora! Vitae dignissimos, reprehenderit quos tenetur incidunt, ut assumenda nam, itaque illo hic fuga facere. 
                     Tempora magni eaque officia similique perspiciatis praesentium dolore iste veniam illum quae porro aliquid magnam voluptate fugit officiis velit delectus molestias, nisi suscipit? 
                     Tempore, iure autem consequuntur nihil voluptates consectetur 
                    assumenda a veritatis accusantium?
            </textarea>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" id="chk_member2">
                <label class="form-check-label" for="chk_member2">
                  위 약관에 동의하기겠습니까?
                </label>
              </div>

              <div class="mt-4 d-flex justify-contents-center gap-2">
                <button class="btn btn-primary w-50" id="btn_member">회원가입</button>
                <button class="btn btn-secondary w-50">가입취소</button>
              </div>

              <form method="post" name="sripulation_form" action="member_input.php" style="display:none">
                <input type="hidden" name="chk" value="0">
              </form>

          </main>

<?php include 'inc_footer.php'; ?>
