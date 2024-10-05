<?php
session_start();
// echo "<pre>";
// var_dump($_SESSION['user']);
// die;

include ("../../model/connect.php");
include ("../../model/binhLuan.php");

$idUser = !empty($_SESSION['user']['id']) ? $_SESSION['user']['id'] : null;

$idSp = $_REQUEST["idSp"];
// echo $idSp;
// echo "heello ";
// echo $idUser;
// die();
$dsbl = selectAll_binhluan($idSp);
// echo "<pre>";
// print_r($dsbl);
// die;
?>


<ol class="relative border-s border-gray-200">
    <?php
    if (is_array($dsbl) && !empty($dsbl)) {
        echo '<ul>';
        foreach ($dsbl as $key => $value) {
            echo '
            <li class="mb-10 ms-6">
                <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white">
                    ';
        
            if (!empty($value['avatar'])) {
                echo '<img class="rounded-full shadow-lg" src="./uploads/' . $value['avatar'] . '" alt="Thomas Lean image" />';
            } else {
                echo '<img class="rounded-full shadow-lg" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="Thomas Lean image" />';
            }
        
            echo '
                </span>
                <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm ">
                    <div class="items-center justify-between mb-3 sm:flex">
                        <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">' . $value["created_time_at"] . '</time>
                        <div class="text-sm font-normal text-gray-500 lex "><span class="font-medium">' . $value["name"] . '</span> đã
                            bình luận</div>
                    </div>
                    <div class="p-3 text-xs italic font-normal text-gray-500 border border-gray-200 rounded-lg bg-gray-50">' . $value["content"] . '</div>
                    <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">' . $value["created_day_at"] . '</time>
                </div>
            </li>
            ';
        }
        echo '</ul>';
    } else {
        echo '
    <div>
        <p class="py-4 px-5 text-[#85640] rounded-lg mb-4 bg-[#fff3cd] border border-[#ffeeba]">
            Hiện tại sản phẩm này chưa có bình luận.</p>
    </div>';
    }
    ?>
</ol>

<!-- form -->
<?php
if (isset($_SESSION['user']) && (count($_SESSION['user']) > 0)) { ?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="hidden" name="idSp" value="<?= $idSp ?>">
        <label for="chat" class="sr-only">Your message</label>
        <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50">
            <label for="file-upload" disabled
                class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 ">
                <i class="fa-regular fa-image"></i>
                <span class="sr-only">Upload image</span>
            </label>
            <input id="file-upload" type="file" style="display: none;" />
            <textarea id="chat" rows="2" name="noidung"
                class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                placeholder="Your message..."></textarea>
            <button type="submit" name="submit"
                class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100">
                <i class="fa-solid fa-paper-plane"></i>
                <span class="sr-only">Send message</span>
            </button>
        </div>
    </form>
<?php } ?>

<?php
if (isset($_POST['submit'])) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    // echo 'helo';
    $idSp = $_POST['idSp'];
    $noiDung = $_POST['noidung'];

    $ngayBinhLuan = date('d-m-Y');
    $thoiGianBinhLuan = date('H:i:s');
    // echo "<pre>";
    // print_r([$idSp, $noiDung, $ngayBinhLuan]);
    // die;
    insert_binhluan($idSp, $idUser, $noiDung, $ngayBinhLuan, $thoiGianBinhLuan);
    // header("Location: " . $_SERVER['HTTP_REFERER']);
    header("Location: " . $_SERVER['HTTP_REFERER']);
}
?>