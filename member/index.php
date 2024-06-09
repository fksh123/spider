<?php
session_start();

$ses_id=(isset($_SESSION['ses_id']) && $_SESSION['ses_id'] != '' ) ? $_SESSION['ses_id'] : '';

$g_title="white spider";
$js_array = [ 'js/member_success.js' ];

$menu_code = 'home';

include 'inc_header.php';

?>
<main class="w-75 mx-auto border rounded-5 p-5 d-flex gap-5" style="height: calc(100vh - 257px)">

<img src="imeges/icon.svg" class="w-50" alt="">
<div>
    <h3>Home</h3>
</div>

</main>



<?php
include 'inc_footer.php';

?>