<?php
session_start();

include("../../model/connect.php");
include_once("../../model/binhLuan.php");

$idUser = !empty($_SESSION['user']['id']) ? $_SESSION['user']['id'] : null;
$idSp = $_REQUEST["idSp"];
$dsbl = selectAll_binhluan($idSp);

function remove_binhluan($idBinhLuan)
{
    global $conn; // Đảm bảo kết nối cơ sở dữ liệu
    $sql = "DELETE FROM binhluan WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "Lỗi chuẩn bị câu lệnh: " . $conn->error;
        return false;
    }
    $stmt->bind_param("i", $idBinhLuan);
    if (!$stmt->execute()) {
        echo "Lỗi thực thi câu lệnh: " . $stmt->error;
        return false;
    }
    return true;
}

if (isset($_POST['delete'])) {
    $idBinhLuan = $_POST['idBinhLuan'];

    // Kiểm tra nếu ID bình luận hợp lệ
    if (!empty($idBinhLuan) && is_numeric($idBinhLuan)) {
        if (remove_binhluan($idBinhLuan)) {
            $_SESSION['message'] = "Bình luận đã được xóa thành công.";
        } else {
            $_SESSION['error'] = "Có lỗi xảy ra khi xóa bình luận.";
        }
    } else {
        $_SESSION['error'] = "ID bình luận không hợp lệ.";
    }

    // Chuyển hướng về trang trước đó
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}
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
                echo '<img class="rounded-full shadow-lg" src="./uploads/' . $value['avatar'] . '" alt="User image" />';
            } else {
                echo '<img class="rounded-full shadow-lg" src="https://flowbite.com/docs/images/people/profile-picture-1.jpg" alt="Default image" />';
            }

            echo '
                </span>
                <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm ">
                    <div class="items-center justify-between mb-3 sm:flex">
                        <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">' . $value["created_time_at"] . '</time>
                        <div class="text-sm font-normal text-gray-500"><span class="font-medium">' . $value["name"] . '</span> đã bình luận</div>
                        <form action="" method="post" class="ml-3 inline">
                            <input type="hidden" name="idBinhLuan" value="' . $value['id'] . '">
                            <button type="submit" name="delete" class="text-red-600 hover:text-red-500">Xóa</button>
                        </form>
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

<!-- form để thêm bình luận -->
<?php
if (isset($_SESSION['user']) && (count($_SESSION['user']) > 0)) { ?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="hidden" name="idSp" value="<?= $idSp ?>">
        <label for="chat" class="sr-only">Your message</label>
        <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50">
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
    $idSp = $_POST['idSp'];
    $noiDung = $_POST['noidung'];

    $ngayBinhLuan = date('d-m-Y');
    $thoiGianBinhLuan = date('H:i:s');
    insert_binhluan($idSp, $idUser, $noiDung, $ngayBinhLuan, $thoiGianBinhLuan);
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

if (isset($_POST['delete'])) {
    $idBinhLuan = $_POST['idBinhLuan'];

    // Kiểm tra nếu ID bình luận hợp lệ
    if (!empty($idBinhLuan) && is_numeric($idBinhLuan)) {
        if (remove_binhluan($idBinhLuan)) {
            $_SESSION['message'] = "Bình luận đã được xóa thành công.";
        } else {
            $_SESSION['error'] = "Có lỗi xảy ra khi xóa bình luận.";
        }
    } else {
        $_SESSION['error'] = "ID bình luận không hợp lệ.";
    }

    // Chuyển hướng về trang trước đó
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
}

if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']);
}
?>