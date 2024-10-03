-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 18, 2024 lúc 05:54 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookda1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bien_the`
--

CREATE TABLE `bien_the` (
  `id` int(11) NOT NULL,
  `loai_bia` varchar(50) NOT NULL,
  `muc_tang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bien_the`
--

INSERT INTO `bien_the` (`id`, `loai_bia`, `muc_tang`) VALUES
(1, 'Bìa Cứng', 10),
(2, 'Bìa Mềm', 0),
(8, 'Bìa Cứng', 20),
(9, 'Bìa Mềm', 50),
(10, 'Bìa Mềm', 0),
(11, 'A', 0),
(12, 'B', 5),
(13, 'C', 0),
(14, 'B', 5),
(16, 'D', 0),
(17, 'D', 0),
(18, 'D', 0),
(19, 'B', 1),
(20, 'D', 22),
(21, 'Bìa Mềm', 0),
(22, 'Bìa Cứng', 20000),
(23, 'Bìa Cứng', 20000),
(24, '', 0),
(25, '', 0),
(26, '', 0),
(27, '', 0),
(28, '', 0),
(29, '', 0),
(30, '', 0),
(31, 'Bìa Mềm', 0),
(32, 'Bìa Cứng', 20000),
(33, 'Bìa Mềm', 0),
(34, 'Bìa Cứng', 30000),
(35, 'Bìa Mềm', 0),
(36, 'Bìa Cứng', 25000),
(37, 'Bìa Mềm', 0),
(38, 'Bìa Cứng', 30000),
(39, 'Bia Xanh', 10000),
(40, 'bia do', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `created_time_at` varchar(255) NOT NULL,
  `created_day_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id`, `customer_id`, `product_id`, `content`, `created_time_at`, `created_day_at`) VALUES
(20, 33, 4, 'bình luận mới nhất', '00:48:30', '26-03-2024'),
(24, 33, 4, 'Sản phẩm cùng loại', '00:51:26', '26-03-2024'),
(25, 33, 4, 'Mô tả:\r\nChính Sách Tiền Tệ Thế Kỷ 21 Cuốn sách đầu tiên bàn về lịch sử chống lạm phát & khủng hoảng của Cục Dự trữ Liên bang Hoa Kỳ', '00:51:38', '26-03-2024'),
(26, 22, 4, 'Có lẽ không quyển sách nào trong thế kỷ này có tác động sâu sắc đến đời sống trí tuệ và tinh thần của chúng ta hơn Con Đường Chẳng Mấy Ai Đi. Với doanh số trên 10 triệu bản in trên toàn thế giới và được dịch sang hơn 25 ngôn ngữ, đây là một hiện tượng tro', '00:51:51', '26-03-2024'),
(27, 22, 4, 'Tô Bình Yên Vẽ Hạnh Phúc (Tái Bản 2022)\r\n\r\nSau thành công của cuốn sách đầu tay “Phải lòng với cô đơn” chàng họa sĩ nổi tiếng và tài năng Kulzsc đã trở lại với một cuốn sách vô cùng đặc biệt mang tên: \"Tô bình yên - vẽ hạnh phúc” – sắc nét phong cách cá n', '00:52:23', '26-03-2024'),
(28, 22, 4, 'Tô Bình Yên Vẽ Hạnh Phúc (Tái Bản 2022)\r\n\r\nSau thành công của cuốn sách đầu tay “Phải lòng với cô đơn” chàng họa sĩ nổi tiếng và tài năng Kulzsc đã trở lại với một cuốn sách vô cùng đặc biệt mang tên: \"Tô bình yên - vẽ hạnh phúc” – sắc nét phong cách cá nhân với một chút “thơ thẩn, rất hiền”.\r\n\r\nKhông giống với những cuốn sách chỉ để đọc, “Tô bình yên – vẽ hạnh phúc” là một cuốn sách mà độc giả vừa tìm được “Hạnh phúc to to từ những điều nho nhỏ” vừa được thực hành ngay lập tức. Một sự kết hợp m', '00:52:45', '26-03-2024'),
(29, 29, 4, '123', '00:07:33', '28-03-2024'),
(31, 32, 3, 'Sách thật tốt\r\n', '14:11:59', '15-04-2024'),
(33, 63, 3, 'sách rất hay', '16:25:47', '15-04-2024'),
(34, 71, 3, 'sách rất hay và ý nghĩa', '00:54:19', '16-04-2024'),
(36, 72, 3, 'Đứa trẻ hiểu chuyện thường không có kẹo ăn” – Cuốn sách dành cho những thời thơ ấu đầy vết thương.', '00:57:05', '16-04-2024'),
(37, 72, 3, 'Đứa Trẻ Hiểu Chuyện Thường Không Có Kẹo Ăn', '00:57:17', '16-04-2024'),
(38, 70, 3, 'Khi Cú Con Sợ Hãi - When Owl Feels Scared (Song Ngữ Anh-Việt)', '00:57:26', '16-04-2024'),
(39, 70, 3, 'Tức giận, lo lắng, sợ hãi, nhút nhát là những cảm xúc phổ biến và là một phần không thể thiếu trong quá trình trưởng thành của mỗi đứa trẻ. Vì vậy, bố mẹ đừng quá lo lắng hay khắt khe với những cảm xúc tiêu cực của con, mà hãy mở lòng và cùng con vượt qua chúng nhé!', '00:57:35', '16-04-2024'),
(40, 62, 3, 'Người giàu không làm việc vì tiền. Họ bắt tiền làm việc cho họ. Chấp nhận thất bại là bước đầu của thành công? Quyền lực của sự lựa chọn! Những bài học không có trong nhà trường. Hãy đọc bộ sách Dạy con làm giàu và bắt đầu từ hôm nay “để không có tiền vẫn tạo ra tiền”…', '00:57:50', '16-04-2024'),
(41, 66, 3, 'Sau nhiều năm sống yên ổn sau những bức tường thành cao lừng lững, loài người đã bắt đầu cảm nhận được nguy cơ diệt vong đến từ một giống loài khổng lồ mang tên Titan. Dù muốn dù không, họ buộc phải đứng lên, và đã đứng lên một cách đầy quyết tâm, mạnh mẽ để chống lại những kẻ thù hùng mạnh nhất.', '00:58:03', '16-04-2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `name`) VALUES
(1, 'SÁCH KHOA HỌC'),
(7, 'VĂN HỌC'),
(8, ' KINH TẾ'),
(112, 'THIẾU NHI ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `payment_status` varchar(2) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `ghi_chu` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`id`, `customer_id`, `so_luong`, `status`, `tong_tien`, `payment_status`, `payment`, `ghi_chu`, `name`, `phone`, `email`, `adress`, `created_at`) VALUES
(29, 3, 0, 3, 259200, '', 'COD', '', 'bacle', '43534', 'bacle@gmail.com', 'dff', '2024-04-13 20:05:14'),
(33, 3, 0, 3, 764800, '', 'COD', '', 'bacle', '555', 'bacle@gmail.com', '5555', '2024-04-15 12:20:10'),
(34, 3, 0, 5, 1161200, '', 'COD', '', 'bacle', '777', 'bacle@gmail.com', '77777', '2024-04-15 12:28:05'),
(35, 3, 0, 1, 113240, '', 'VNPay', '', 'bacle', '098765321', 'bacle@gmail.com', 'Ha noi', '2024-04-16 04:37:25'),
(36, 3, 0, 3, 384480, '', 'COD', '', 'bacle', '012345678', 'bacle@gmail.com', 'ha noi 2', '2024-04-16 04:42:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang_items`
--

CREATE TABLE `gio_hang_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gio_hang_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `loai_bia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hang_items`
--

INSERT INTO `gio_hang_items` (`id`, `user_id`, `gio_hang_id`, `product_id`, `so_luong`, `gia`, `loai_bia`) VALUES
(27, 5, 0, 49, 1, 89, NULL),
(36, 2, 0, 50, 2, 25, NULL),
(37, 2, 0, 28, 28, 83, NULL),
(107, 3, 0, 0, 0, 75, ''),
(108, 3, 0, 0, 0, 75, ''),
(129, 3, 0, 64, 1, 40850, ''),
(130, 3, 0, 67, 2, 62400, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang_item_thanhtoan`
--

CREATE TABLE `gio_hang_item_thanhtoan` (
  `id` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `Gia_tien_Pro_id` int(11) NOT NULL,
  `loai_bia` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `gio_hang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hang_item_thanhtoan`
--

INSERT INTO `gio_hang_item_thanhtoan` (`id`, `so_luong`, `product_id`, `Gia_tien_Pro_id`, `loai_bia`, `user_id`, `gio_hang_id`) VALUES
(30, 1, 60, 0, '', 3, 29),
(31, 2, 63, 0, '', 3, 29),
(34, 8, 63, 764800, 'Bìa Cứng', 3, 33),
(35, 1, 63, 95600, 'Bìa Cứng', 3, 34),
(36, 1, 62, 1065600, '', 3, 34),
(37, 1, 26, 178000, 'Bìa Mềm', 3, 36),
(38, 1, 72, 93240, 'Bìa Mềm', 3, 36),
(39, 1, 72, 113240, 'Bìa Cứng', 3, 36);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_san_xua`
--

CREATE TABLE `nha_san_xua` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_san_xua`
--

INSERT INTO `nha_san_xua` (`id`, `name`) VALUES
(1, 'Nhà xuất bản giáo dục Việt Nam.'),
(2, 'Nhà xuất bản Kim Đồng'),
(7, 'Dân Trí'),
(8, 'NXB Trẻ'),
(9, 'NXB Hồng Đức'),
(10, 'Thế Giới');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `danh_muc_id` int(11) NOT NULL,
  `nha_san_xuat_id` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `img_id` int(11) DEFAULT NULL,
  `the_loai_id` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `gia_sale` int(11) DEFAULT NULL,
  `mo_ta` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `luot_ban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `ten`, `danh_muc_id`, `nha_san_xuat_id`, `img`, `img_id`, `the_loai_id`, `gia`, `gia_sale`, `mo_ta`, `created_at`, `luot_ban`) VALUES
(26, 'Combo Sách Ghi Chép Pháp Y + Người Dọn Dẹp Hiện Trường Án Mạng (Bộ 2 Cuốn)', 7, 10, 'vanhoc1.jpg', NULL, 0, 178000, 244000, 'Combo Sách Ghi Chép Pháp Y + Người Dọn Dẹp Hiện Trường Án Mạng (Bộ 2 Cuốn)\r\n\r\n1. Người Dọn Dẹp Hiện Trường Án Mạng\r\n\r\n“Người dọn dẹp hiện trường án mạng” - Góc khuất đằng sau nghề dọn dẹp hiện trường vụ án: đầy tính nhân văn nhưng cũng hết sức thảm khốc.\r\n\r\nNhiệm vụ của những nhân viên dọn dẹp hiện trường là làm sạch và khôi phục trạng thái của nơi xảy ra vụ án lại như ban đầu. Để hoàn thành việc dọn dẹp hiện trường, người trong nghề phải trải qua một khóa huấn luyện. Họ được cung cấp những kiến', '2024-03-25 15:07:03', 1),
(27, 'Combo Sách Ghi Chép Pháp Y - Những Cái Chết Bí Ẩn + Những Con Quái Vật Đội Lốt Người Trong Thị Trấn (Bộ 2 Cuốn)', 7, 10, 'văn học 2.jpg', NULL, 0, 193000, 265000, 'Combo Sách Ghi Chép Pháp Y - Những Cái Chết Bí Ẩn + Những Con Quái Vật Đội Lốt Người Trong Thị Trấn (Bộ 2 Cuốn)\r\n\r\n1. Những Con Quái Vật Đội Lốt Người Trong Thị Trấn\r\n\r\nSẽ thế nào nếu một ngày bạn chuyển đến một thị trấn tưởng chừng như không một hiểm nguy nào từ phố thị có thể đe dọa tới nơi đây nhưng thực chất hàng xóm của bạn là kẻ sát nhân hàng loạt?', '2023-04-25 15:08:15', 9),
(28, ' Những Con Quái Vật Đội Lốt Người Trong Thị Trấn - Tặng Kèm 1 Bookmark', 7, 10, 'văn học 3.png', NULL, 0, 83000, 115000, '“Những con quái vật đội lốt người trong thị trấn” gồm các tình tiết hoàn toàn mới về TỘI ÁC CÓ THẬT từ khắp nơi trên thế giới và xảy ra ở các khoảng thời gian khác nhau. Trong tuyển tập này, tác giả đã vén bức màn bí mật để phơi bày sự thật trần trụi đằng sau những thị trấn nhỏ hoàn hảo này. Nó không chỉ giúp độc giả nhìn thấy những tội ác và những cá nhân phạm tội, mà còn cho thấy những ảnh hưởng t.iêu cực của chúng đối với cộng đồng. Ngay cả khi thời gian trôi qua thì dư âm của những hệ lụy đó', '2023-04-26 15:11:17', 14),
(29, 'Sĩ Số Lớp Vắng 0', 7, 10, 'văn học 4.jpg', NULL, 0, 74000, 112000, 'Sĩ Số Lớp Vắng 0\r\n\r\n“Tiếng gọi bí ẩn trong căn phòng đó dường như chỉ có mình tôi nghe thấy.”\r\n\r\n“Lớp học này từng có người c.h.ế.t.”\r\n\r\n“Người ta đồn rằng, vào buổi tối, trường này có ma.”', '2023-02-14 15:12:34', 155),
(30, '48 Nguyên Tắc Chủ Chốt Của Quyền Lực (Tái Bản 2020)', 8, 10, 'kinh tế 1.jpg', NULL, 0, 150000, 0, 'Quyền lực có sức hấp dẫn vô cùng mạnh mẽ đối với con người trong mọi thời, ở mọi nơi, với mọi giai tầng. Lịch sử xét cho cùng là cuộc đấu tranh triền miên để giành cho bằng được quyền lực cai trị của các tập đoàn thống trị, từ cổ chí kim, từ đông sang tây.\r\n\r\nQuyền lực là thứ mà rất nhiều người mong muốn nhưng không phải ai cũng dễ dàng đạt được. Vươn lên những vị trí cao hơn trong thang bậc xã hội thường được xem là một khát khao rất con người. Nhưng, liệu có phải chỉ những tài năng xuất chúng ', '2024-03-25 15:15:24', 2),
(31, 'MBA Bằng Hình - The Usual MBA', 8, 10, 'kinh tế 2.jpg', NULL, 0, 147000, 0, 'MBA Bằng Hình - The Usual MBA\r\n\r\nJason Barron, MBA, là một nhà lãnh đạo đầy sáng tạo tập trung vào chiến lược sản phẩm số và trải nghiệm người dùng. Ông cũng là đồng sự sáng lập nên công ty khởi nghiệp LowestMed, vốn được RetailMeNot thâu tóm vào năm 2018, và hiện nay đang làm quản lý cấp cao cho một tổ chức phi lợi nhuận lớn chuyên về các sản phẩm số cung cấp cho hàng triệu người dùng trên khắp thế giới.', '2023-05-05 15:19:30', 23),
(32, 'Làm Giàu Qua Chứng Khoán', 8, 10, 'kinh tế 3.jpg', NULL, 0, 115000, 150000, 'Làm giàu qua chứng khoán cung cấp cho bạn một hệ thống đơn giản, dựa trên thực tế, đã được chứng minh đầy đủ trong thị trường chứng khoán, tên là CAN SLIM (mô hình đầu tư được đăng ký độc quyền của William J. O’Neil).\r\n\r\nHệ thống này bao gồm những quy luật mua và bán cổ phiếu được rút ra từ cuộc phân tích tổng quát tất cả các loại cổ phiếu thành công nhất nửa thế kỷ qua. Tuân theo những quy luật này, sách giúp bạn sẽ đưa ra được các quyết định đầu tư khôn ngoan hơn, mua bán cổ phiếu thành công h', '2023-06-25 15:20:55', 14),
(59, 'Pháp Sư Và Nhà Tiên Tri', 8, 10, '1712312634Hiểu Về Trái Tim (Tái Bản 2023).jpg', NULL, 0, 105750, 235000, 'Sản phẩm có tình trạng chất lượng tương đương 80% so với hàng mới. Lưu ý: Các sản phẩm thuộc Phiên chợ sách cu sẽ không được áp dụng chính sách đổi trả của Fahasa.com Đất chật người đông - Đó là bài toán của kỷ Nhân Sinh, kỷ nguyên con người thống trị Trái Đất. Khi dân số thế giới đang ào ạt tiến lên con số 10 tỉ vào năm 2050, làm thế nào để chu cấp đầy đủ nhu cầu của con người mà không vắt kiệt và phá hủy mảnh đất nuôi sống họ?', '2024-04-05 12:20:42', 1),
(60, 'Khoa Học Khám Phá - Stephen Hawking - Một Hồi Ức Về Tình Bạn & Vật Lý Học', 8, 10, 'Khoa Học Khám Phá - Stephen Hawking.jpg', NULL, 0, 108000, 0, 'Stephen Hawking là một trong những nhà vật lý vĩ đại nhất trong thời đại của chúng ta, đồng thời cũng là người có sức ảnh hưởng rất lớn đến hàng triệu người trên khắp thế giới, không chỉ bởi trí tuệ vượt trội, mà còn bởi cuộc đời kỳ lạ cùng nghị lực phi thường của ông. Cuốn sách này thuật lại gần hai thập kỷ làm bạn, làm cộng sự viết sách cùng Stephen của tác giả, từ ban đầu lóng ngóng trong văn phòng của Stephen cho đến tình bạn kéo dài và sự ra đời của Bản thiết kế vĩ đại và Lược sử ngắn hơn, ', '2024-04-05 12:24:50', 1),
(62, 'Box Set Dạy Con Làm Giàu ', 8, 8, 'Box Set Dạy Con Làm Giàu.jpg', NULL, 0, 1065600, 1480000, 'Người giàu không làm việc vì tiền. Họ bắt tiền làm việc cho họ. Chấp nhận thất bại là bước đầu của thành công? Quyền lực của sự lựa chọn! Những bài học không có trong nhà trường. Hãy đọc bộ sách Dạy con làm giàu và bắt đầu từ hôm nay “để không có tiền vẫn tạo ra tiền”…', '2024-04-13 19:39:22', 10),
(64, 'Fire Force', 112, 10, 'nxbtre_full_03182024_091850_1.jpg', NULL, 0, 40850, 43000, 'Truyện lấy bối cảnh thế giới khi con người đối mặt với hiện tượng “nhân thể bộc hỏa”, tức con người tự bốc cháy. Câu chuyện nói về những con người có năng lực và quyết tâm kết hợp với nhau lập thành các Biệt đội cứu hỏa để bảo vệ con người trước “Diệm nhân”. ', '2023-07-15 19:20:48', 23),
(65, 'Attack On Titan ', 112, 8, 'nxbtre_full_25222024_022225.jpg', NULL, 0, 45600, 0, 'Sau nhiều năm sống yên ổn sau những bức tường thành cao lừng lững, loài người đã bắt đầu cảm nhận được nguy cơ diệt vong đến từ một giống loài khổng lồ mang tên Titan. Dù muốn dù không, họ buộc phải đứng lên, và đã đứng lên một cách đầy quyết tâm, mạnh mẽ để chống lại những kẻ thù hùng mạnh nhất.', '2023-09-15 19:24:16', 55),
(67, 'Điềm Tĩnh Và Nóng Giận', 1, 1, '-tin-xu_t-b_n-_i_m-t_nh-n_ng-gi_nb_a-1.jpg', NULL, 0, 62400, 96000, 'rong cuộc sống thường ngày, chúng ta thường nổi giận vì nhiều nguyên do: công việc không suôn sẻ, chúng ta tức giận; bị người khác hiểu nhầm, chúng ta tức giận; thấy việc chướng tai gai mắt, chúng ta tức giận; không thể chấp nhận được dư luận xã hội, chúng ta tức giận.', '2023-02-23 19:29:09', 45),
(68, '\"Cậu\" Ma Nhà Xí Hanako - Sau Giờ Học - Tặng Kèm Bảng Sticker', 112, 9, 'cau-ma-nha-xi-hanako_sau-gio-hoc_bia-1.jpg', NULL, 0, 25200, 30000, 'Thước phim chân thực bật mí cuộc sống của 7 bí ẩn sau giờ học!\r\n\r\nBí ẩn thứ 7 của học viện Kamome - “Cậu” ma nhà xí Hanako - cùng cô gái theo hệ tâm linh Yashiro Nene sẽ làm gì vào những ngày không xảy ra rắc rối?', '2023-03-11 19:34:53', 90),
(69, 'KINGDOM', 112, 2, 'nxbtre_full_26332024_033331_1.jpg', NULL, 0, 36450, 45000, 'Thời kỳ Xuân Thu chiến quốc kéo dài suốt 500 năm do toàn cõi Trung Hoa vẫn chưa quy về một mối. Sinh ra trong thời loạn lạc, cậu thiếu niên mồ côi tên Tín cùng người bằng hữu của mình là Phiêu quyết tâm rèn luyện võ nghệ ngày đêm nhằm thay đổi vận mệnh của mình, phấn đấu trở thành thiên hạ đệ nhất tướng quân ghi danh vào sử sách. ', '2024-04-15 19:36:28', 20),
(70, 'Khi Cú Con Sợ Hãi - When Owl Feels Scared (Song Ngữ Anh-Việt)', 1, 1, '9786044808970.jpg', NULL, 0, 66490, 109000, 'Tức giận, lo lắng, sợ hãi, nhút nhát là những cảm xúc phổ biến và là một phần không thể thiếu trong quá trình trưởng thành của mỗi đứa trẻ. Vì vậy, bố mẹ đừng quá lo lắng hay khắt khe với những cảm xúc tiêu cực của con, mà hãy mở lòng và cùng con vượt qua chúng nhé!', '2024-03-15 19:37:18', 5),
(71, 'Khi Sư Tử Nhút Nhát - When Lion Feels Shy (Song Ngữ Anh-Việt)', 7, 9, '9786044808949.jpg', NULL, 0, 68670, 109000, 'Tức giận, lo lắng, sợ hãi, nhút nhát là những cảm xúc phổ biến và là một phần không thể thiếu trong quá trình trưởng thành của mỗi đứa trẻ. Vì vậy, bố mẹ đừng quá lo lắng hay khắt khe với những cảm xúc tiêu cực của con, mà hãy mở lòng và cùng con vượt qua chúng nhé!', '2024-04-15 19:38:09', 34),
(72, 'Đứa Trẻ Hiểu Chuyện Thường Không Có Kẹo Ăn', 1, 7, '8935325011818.jpg', NULL, 0, 93240, 148000, '“Đứa trẻ hiểu chuyện thường không có kẹo ăn” – Cuốn sách dành cho những thời thơ ấu đầy vết thương.', '2023-08-15 19:45:55', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `produt_tac_gia`
--

CREATE TABLE `produt_tac_gia` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `tac_gia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `produt_tac_gia`
--

INSERT INTO `produt_tac_gia` (`id`, `product_id`, `tac_gia_id`) VALUES
(4, 42, 6),
(5, 42, 5),
(6, 43, 8),
(18, 48, 7),
(19, 48, 6),
(20, 49, 4),
(33, 50, 7),
(34, 50, 6),
(35, 50, 5),
(36, 54, 5),
(37, 54, 4),
(38, 56, 4),
(39, 56, 3),
(68, 46, 5),
(69, 46, 4),
(70, 22, 3),
(75, 31, 6),
(76, 32, 3),
(77, 47, 7),
(78, 47, 6),
(79, 61, 6),
(80, 61, 5),
(81, 27, 8),
(82, 60, 7),
(83, 59, 5),
(84, 30, 8),
(85, 30, 7),
(86, 29, 5),
(87, 29, 4),
(88, 28, 4),
(89, 26, 5),
(90, 26, 3),
(91, 62, 5),
(94, 63, 7),
(96, 64, 8),
(97, 65, 7),
(98, 66, 7),
(99, 67, 3),
(100, 68, 5),
(101, 69, 8),
(102, 69, 7),
(103, 70, 6),
(104, 71, 4),
(105, 72, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tac_gia`
--

CREATE TABLE `tac_gia` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tac_gia`
--

INSERT INTO `tac_gia` (`id`, `name`) VALUES
(3, 'Hồng phong'),
(4, 'Tố hữu'),
(5, 'Kim lân·'),
(6, 'Mitzi Szereto'),
(7, 'Robert Greene'),
(8, 'William J O’Neil');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trung_gian_bia_product`
--

CREATE TABLE `trung_gian_bia_product` (
  `product_id` int(11) NOT NULL,
  `bia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `trung_gian_bia_product`
--

INSERT INTO `trung_gian_bia_product` (`product_id`, `bia_id`) VALUES
(26, 1),
(26, 2),
(72, 31),
(72, 32),
(71, 33),
(71, 34),
(70, 35),
(70, 36),
(69, 37),
(69, 38),
(71, 39),
(71, 40);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` int(11) NOT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `phone`, `email`, `password`, `dia_chi`, `is_admin`) VALUES
(1, 'user', NULL, '0123456789', 'quynhquw@gmail.com', 123456, '', 1),
(2, 'baclv', NULL, NULL, 'client@gmail.com', 12345678, '', 0),
(3, 'bacle', '1713233818huong-dan-tao-facebook-avatar.jpg', '', 'bacle@gmail.com', 123456, '', 1),
(5, 'baclv1', '1711648838b1-g_i---c_u.jpg', '', 'bac@1234', 111, 'ha noi 2', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bien_the`
--
ALTER TABLE `bien_the`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gio_hang_items`
--
ALTER TABLE `gio_hang_items`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gio_hang_item_thanhtoan`
--
ALTER TABLE `gio_hang_item_thanhtoan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gio_hang_item_thanhtoan_ibfk_1` (`gio_hang_id`);

--
-- Chỉ mục cho bảng `nha_san_xua`
--
ALTER TABLE `nha_san_xua`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danh_muc_id` (`danh_muc_id`),
  ADD KEY `nha_san_xuat_id` (`nha_san_xuat_id`),
  ADD KEY `img_id` (`img_id`);

--
-- Chỉ mục cho bảng `produt_tac_gia`
--
ALTER TABLE `produt_tac_gia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `tac_gia_id` (`tac_gia_id`);

--
-- Chỉ mục cho bảng `tac_gia`
--
ALTER TABLE `tac_gia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trung_gian_bia_product`
--
ALTER TABLE `trung_gian_bia_product`
  ADD KEY `bacdeptrai2` (`bia_id`),
  ADD KEY `FK_tt_product` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bien_the`
--
ALTER TABLE `bien_the`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `gio_hang_items`
--
ALTER TABLE `gio_hang_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT cho bảng `gio_hang_item_thanhtoan`
--
ALTER TABLE `gio_hang_item_thanhtoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `nha_san_xua`
--
ALTER TABLE `nha_san_xua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `produt_tac_gia`
--
ALTER TABLE `produt_tac_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT cho bảng `tac_gia`
--
ALTER TABLE `tac_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `gio_hang_item_thanhtoan`
--
ALTER TABLE `gio_hang_item_thanhtoan`
  ADD CONSTRAINT `gio_hang_item_thanhtoan_ibfk_1` FOREIGN KEY (`gio_hang_id`) REFERENCES `gio_hang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_muc` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`nha_san_xuat_id`) REFERENCES `nha_san_xua` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `trung_gian_bia_product`
--
ALTER TABLE `trung_gian_bia_product`
  ADD CONSTRAINT `FK_tt_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
