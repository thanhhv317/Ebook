-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 23, 2019 lúc 11:31 AM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ebook`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `banner` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `story` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `slogant` text COLLATE utf8_unicode_ci NOT NULL,
  `author` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `abouts`
--

INSERT INTO `abouts` (`id`, `banner`, `image`, `story`, `description`, `slogant`, `author`, `updated_at`) VALUES
(1, 'Packaging-future-header-1920x240.jpg', 'box-cover-720x866.jpg', 'Về chúng tôi', 'Phasellus egestas nisi nisi, lobortis ultricies risus semper nec. Vestibulum pharetra ac ante ut pellentesque. Curabitur fringilla dolor quis lorem accumsan, vitae molestie urna dapibus. Pellentesque porta est ac neque bibendum viverra. Vivamus lobortis magna ut interdum laoreet. Donec gravida lorem elit, quis condimentum ex semper sit amet. Fusce eget ligula magna. Aliquam aliquam imperdiet sodales. Ut fringilla turpis in vehicula vehicula. Pellentesque congue ac orci ut gravida. Aliquam erat volutpat. Donec iaculis lectus a arcu facilisis, eu sodales lectus sagittis. Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, vel tincidunt erat arcu ut sem. Sed rutrum, turpis ut commodo efficitur, quam velit convallis ipsum, et maximus enim ligula ac ligula. Vivamus tristique vulputate ultricies. Sed vitae ultrices orci.', 'Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn\'t really do it, they just saw something. It seemed obvious to them after a while.', 'Steve Job’s', '2019-05-12 20:41:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` datetime NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `authors`
--

INSERT INTO `authors` (`id`, `name`, `alias`, `birthday`, `info`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Nhật Ánh', 'nguyen-nhat-anh', '1955-05-07 00:00:00', 'Nguyễn Nhật Ánh là nhà văn Việt Nam chuyên viết cho tuổi mới lớn. Ông sinh ngày 7 tháng 5 năm 1955 tại làng Đo Đo, xã Bình Quế, huyện Thăng Bình, tỉnh Quảng Nam.', 'nna.jpg', NULL, '2019-05-22 23:30:03'),
(2, 'Shinkai Makoto', 'shinkai-makoto', '1973-02-09 00:00:00', 'Shinkai Makoto tốt nghiệp đại học Chūō ngành văn học Nhật Bản. Tại đó, ông là thành viên câu lạc bộ văn học trẻ với nhiệm vụ chính là vẽ sách. Ông nói cảm hứng sáng tạo của mình bắt nguồn từ manga, anime và tiểu thuyết được đọc thời cấp 2. Anime yêu thích của ông là Laputa của đạo diễn Miyazaki Hayao. Sau khi tốt nghiệp Chūō năm 1994, Shinkai Makoto thiết kế đồ hoạ và làm clip game tại công ty trò chơi Falcom trong 5 năm. Thời gian này, ông đã gặp nhạc sĩ Tenmon và cộng tác với Tenmon trong tất cả các phim của mình. Năm 1999, Shinkai Makoto phát hành một phim hoạt hình ngắn trắng đen dài khoảng 5 phút là Nàng và Con mèo của Nàng. Bộ phim dành nhiều giải thưởng, trong đó có giải thưởng lớn tại \"CG Animation Contest\" của PROJECT TEAM DOGA. Sau khi chiến thắng giải thưởng ấy, ông bắt đầu tìm ý tưởng cho dự án tiếp theo khi làm việc tại Falcom. Vào tháng 6 năm 2000, ông bắt đầu có ý tưởng về phim Tiếng gọi từ vì sao xa sau khi vẽ bức tranh một cô gái trong buồng lái đang cầm điện thoại di động. Mangazoo sau đó đã đến gặp và đề nghị làm việc với ông trên một dự án anime có thể thu lợi nhuận. Tháng 5 năm 2001, ông nghỉ việc tại Falcom và bắt đầu bắt tay làm Tiếng gọi từ vì sao xa. Tiếng gọi từ vì sao xa mở đầu cho hàng loạt anime thành công tiếp theo của Shinkai Makoto bao gồm Bên kia đám mây, nơi ta hẹn ước (phát hành ngày 20 tháng 11 năm 2004), 5 Centimet trên giây (phát hành ngày 3 tháng 3 năm 2007) và Những đứa trẻ đuổi theo tinh tú (phát hành ngày 7 tháng 5 năm 2011). Ngoài ra, ông còn viết tiểu thuyết đầu tay là 5 centimet trên giây. Tác phẩm mới nhất của ông chính là Your Name – Tên cậu là gì? đã gây nên cơn sốt tại các phòng vé của Nhật Bản nói riêng cũng như thế giới nói chung, và đã trở thành phim anime có doanh thu toàn cầu cao nhất trong lịch sử.', 'C5JowCDUMAEiGMo.jpg', NULL, '2019-05-22 23:32:03'),
(7, 'Trác Nhã', 'trac-nha', '1987-02-05 00:00:00', 'không có thông tin', 'trac-nha.jpg', '2019-04-08 08:40:40', '2019-04-08 08:40:40'),
(8, 'Du phong', 'du-phong', '1989-12-08 00:00:00', 'không có thông tin gì', 'Tac_gia_Du_Phong_1.png', '2019-04-08 08:48:28', '2019-04-08 08:48:28'),
(9, 'Dương Thụy', 'duong-thuy', '1975-02-04 00:00:00', 'Dương Thụy sinh năm 1975 tại TP.HCM. Cô là nhà văn nữ có nhiều tác phẩm bán chạy, được đông đảo độc giả mến mộ như Oxford thương yêu, Nhắm mắt thấy Paris, Bồ câu chung mái vòm,…\r\n\r\nSinh trưởng trong một gia đình hiếu học và khó năng khiếu văn chương, ngay từ năm lớp 10, Dương Thụy đã có truyện ngắn đầu tay Búp bê băng giá.  Cô tốt nghiệp Cử Nhân văn chương Pháp tại Đại Học Khoa Học Xã Hội và Nhân Văn TP.HCM và thạc sĩ Quản trị kinh doanh tại Trung Tâm Pháp - Việt Đào Tạo về Quản Lý. Dương Thụy cũng từng nhận được học bổng của chính phủ Bỉ và tốt nghiệp Thạc sĩ Quản Trị Kinh Doanh của trường Đại Học Liege năm 2002.\r\n\r\nCô từng có thời gian làm phóng viên của báo Sinh Viên Việt Nam - Hoa Học Trò nhưng đã dừng việc viết báo mà chuyển sang môi trường doanh nghiệp với nhiều thử thách hơn.\r\n\r\nDương Thụy là nhà văn của những thành phố lãng mạn nhất trên thế giới. Đi nhiều và cảm nhận cũng nhiều, cây bút trẻ này đã đưa tất cả vào những cuốn sách của mình: từ khung cảnh tuyệt vời của những đất nước tận trời Âu xa xôi đến rung động tinh tế trong tâm hồn những cô gái Á Đông gần gũi.\r\n\r\nVăn chương của Dương Thụy nổi tiếng bởi sự lãng mạn, nhẹ nhàng, đậm chất nữ tính. Người đọc dễ dàng bị cuốn hút bởi những chuyện tình đẹp như thơ, những vùng đất lãng đãng mơ màng, những câu chuyện rung động trong từng chi tiết nhỏ. Các tác phẩm của cô luôn nhận được sự ủng hộ nhiệt tình từ độc giả.', 'duong-thuy.png', '2019-04-08 08:54:16', '2019-04-08 08:54:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `sum_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_details`
--

CREATE TABLE `bill_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `bill_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `sum_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher_id` int(10) UNSIGNED NOT NULL,
  `kind_id` int(10) UNSIGNED NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`id`, `name`, `alias`, `publisher_id`, `kind_id`, `author_id`, `price`, `quantity`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Tôi thấy hoa vàng Trên cỏ xanh', 'toi-thay-hoa-vang-tren-co-xanh', 2, 2, 1, '125000', '500', 'Tôi thấy hoa vàng trên cỏ xanh là một tiểu thuyết dành cho thanh thiếu niên của nhà văn Nguyễn Nhật Ánh, xuất bản lần đầu tại Việt Nam vào ngày 9 tháng 12 năm 2010 bởi Nhà xuất bản Trẻ, với phần tranh minh họa do Đỗ Hoàng Tường thực hiện. Đây là một trong các truyện dài của Nguyễn Nhật Ánh, ra đời sau Đảo mộng mơ và trước Lá nằm trong lá. Tác phẩm như một tập nhật ký xoay quanh cuộc sống của những đứa trẻ ở một vùng quê Việt Nam nghèo khó, nổi bật lên là thông điệp về tình anh em, tình làng nghĩa xóm và những tâm tư của tuổi mới lớn. Theo Nguyễn Nhật Ánh, đây là lần đầu tiên ông đưa vào truyện của mình những nhân vật phản diện, đặt ra vấn đề đạo đức như sự vô tâm hay cái ác.\r\n\r\nLà một trong những quyển sách Việt Nam bán chạy nhất năm 2010, Tôi thấy hoa vàng trên cỏ xanh đã được tái bản ngay trong ngày phát hành đầu tiên, với tổng số bản in lên đến hơn 20.000 bản. Đây cũng là cuốn sách mở đầu cho phương thức in nhiều dạng ấn bản trên một tác phẩm ở Việt Nam, với ấn bản bìa mềm và bìa cứng được bán ra song song. Tôi thấy hoa vàng trên cỏ xanh được chuyển thể thành một bộ phim điện ảnh cùng tên bởi đạo diễn Victor Vũ, công chiếu vào tháng 10 năm 2015 với doanh thu phòng vé rất cao và gây được nhiều sự chú ý trong công chúng. Như một ảnh hưởng từ sức ảnh hưởng tích cực của bộ phim, tiểu thuyết đã trở thành quyển sách bán chạy nhất trong Hội sách Hà Nội năm 2015. Tính đến tháng 10 năm 2015, Tôi thấy hoa vàng trên cỏ xanh đã trải qua 28 lần tái phát hành với tổng số bản in lên đến hơn 130.000 bản.', 'toi_thay_hoa_vang.jpg', '2019-03-26 10:38:42', '2019-04-08 08:23:43'),
(2, 'Bảy bước tới mùa hè', 'bay-buoc-toi-mua-he', 2, 1, 1, '64500', '300', 'Bảy bước tới mùa hè là tác phẩm mới nhất của Nguyễn Nhật Ánh, được nhà văn đề tặng \"Những năm ấu thơ\", như một món quà dành tặng các bạn đọc thân thiết của mình nhân dịp đầu năm mới. Câu chuyện về một mùa hè ngọt ngào, những trò chơi nghịch ngợm và bâng khuâng tình cảm tuổi mới lớn. Chỉ vậy thôi nhưng chứng tỏ tác giả đúng là nhà kể chuyện hóm hỉnh, khiến độc giả cuốn hút từ trang đầu đến trang cuối cùng. Chúng ta sẽ bắt gặp giọng văn giản dị, trong trẻo của nhà văn Nguyễn Nhật Ánh và một kết thúc có hậu đầy thuyết phục ở cuối truyện. Câu chuyện về tuổi học trò đầy ắp những kỷ niệm thơ bé ngọt ngào với tình thầy trò, bè bạn, tình xóm giềng, họ hàng qua cách nhìn đời nhẹ nhàng, rộng lượng. Nhà văn chia sẻ: \"Tôi thích sự vui tươi của câu chuyện và sự hồn nhiên của nhân vật. Có thể nói đây là tác phẩm đầy ắp tiếng cười. Tạm thời xa rời những trang văn chứa nhiều chiêm nghiệm của người lớn, qua tác phẩm này tôi muốn quay trở lại lối viết mà tác giả không cố ý để lại quá nhiều dấu tay trên bản thảo. Tác giả trong tác phẩm này cũng đang ở… tuổi mười lăm!\"', 'bay-buoc-toi-mua-he_2.jpg', '2019-03-27 02:26:40', '2019-03-27 02:26:40'),
(3, '5 centimet trên giây', '5-centimet-tren-giay', 2, 2, 2, '33500', '500', '5cm/s không chỉ là vận tốc của những cánh anh đào rơi, mà còn là vận tốc khi chúng ta lặng lẽ bước qua đời nhau, đánh mất bao cảm xúc thiết tha nhất của tình yêu. Bằng giọng văn tinh tế, truyền cảm, 5 centimet trên giây mang đến những khắc họa mới về tâm hồn và khả năng tồn tại của cảm xúc, bắt đầu từ tình yêu trong sáng, ngọt ngào của một cô bé và cậu bé. Ba giai đoạn, ba mảnh ghép, ba ngôi kể chuyện khác nhau nhưng đều xoay quanh nhân vật nam chính, người luôn bị ám ảnh bởi kí ức và những điều đã qua… Khác với những câu chuyện cuốn bạn chạy một mạch, truyện này khó mà đọc nhanh. Ngón tay bạn hẳn sẽ ngừng lại cả trăm lần trên mỗi trang sách. Chỉ vì một cử động rất khẽ, một câu thoại, hay một xúc cảm bất chợt có thể sẽ đánh thức những điều tưởng chừng đã ngủ quên trong tiềm thức, như ngọn đèn vừa được bật sáng trong tâm trí bạn. Và rồi có lúc nó vượt quá giới hạn chịu đựng, bạn quyết định gấp cuốn sách lại chỉ để tận hưởng chút ánh sáng từ ngọn đèn, hay đơn giản là để vết thương trong lòng mình có thời gian tự tìm xoa dịu.', '5-centimet-tren-giay.jpg', '2019-03-27 02:28:51', '2019-04-09 10:46:20'),
(4, 'Duyên Phận Ý Trời Hay Tại Lòng Người', 'duyen-phan-y-troi-hay-tai-long-nguoi', 1, 2, 1, '60200', '250', 'Duyên Phận Ý Trời Hay Tại Lòng Người là những cung bậc cảm xúc ai rồi cũng một lần trải qua như thế, là những dòng nhớ thương da diết của mối tình dang dở, là những đắn đo, nghĩ suy về tình yêu và tuổi trẻ của mỗi người. Là khi đã yêu phải dám đương đầu và chấp nhận, ngay cả khi đối phương đã đổi dạ thay lòng. Nên là, đừng trách người, trách mình hay trách duyên phận. Bởi trên thế gian này, bạn gặp gỡ ai, quen biết ai, bỏ lỡ ai. Tất cả đều đã được sắp đặt. Và tình yêu hiển nhiên là sai khi chúng ta không có vỏ bọc bảo vệ cho thứ tình cảm mong manh dễ vỡ ấy mà thôi. Duyên Phận Ý Trời Hay Tại Lòng Người nếu lơ đãng lật sẽ bỏ qua, đọc thật kĩ sẽ khiến bạn rơi lệ. Bạn sẽ không thể rời mắt và ngừng nghĩ suy về câu chuyện chiếc bánh mì và tình yêu của cô gái khi đứng trước lựa chọn quan trọng của cuộc đời mình. Bạn cũng không thể cầm lòng trước nỗi đau về cả thể xác lẫn tinh thần của cô gái trẻ trước sự thay lòng của bạn trai khi vừa hay tin mình bị tai nạn. Hoặc câu chuyện về ra mắt nhà người yêu đầy thú vị và hài hước từ việc bổ dứa của nàng dâu tương lai. Suy cho cùng, chuyện tình cảm không phải là chuyện có thể điều khiển theo ý mình. Và trong mỗi giai đoạn của cuộc đời, chúng ta rồi sẽ gặp nhiều người, đối mặt với nhiều thứ. Có thể sẽ cùng nhau sánh bước nhưng có ai chắc rằng sẽ là mãi mãi? Chỉ là khi tìm được người đúng nhất, cùng nhau trải qua muôn bậc cảm xúc, đủ loại gian khổ trên đời ta mới biết quý trọng mà cố gắng, mới biết đâu là một nửa đích thực của đời mình. Tháng 9 này, Duyên Phận Ý Trời Hay Tại Lòng Người chắc hẳn sẽ là món quà vừa vặn nhất để bạn dành tặng bản thân khi mùa thu đang về. Tin tôi đi, rồi bạn sẽ tìm thấy tuổi trẻ và tình yêu của mình nơi đó…', 'duyen-phan-y-troi.jpg', '2019-03-27 02:35:54', '2019-04-08 08:27:14'),
(128, 'khéo ăn khéo nói sẽ có được thiên hạ', 'kheo-an-kheo-noi-se-co-duoc-thien-ha', 2, 2, 7, '66000', '500', 'Trong xã hội thông tin hiện đại, sự im lặng không còn là vàng nữa, nếu không biết cách giao tiếp thì dù là vàng cũng sẽ bị chôn vùi. Trong cuộc đời một con người, từ xin việc đến thăng tiến, từ tình yêu đến hôn nhân, từ tiếp thị cho đến đàm phán, từ xã giao đến làm việc... không thể không cần đến kĩ năng và khả năng giao tiếp. Khéo ăn khéo nói thì đi đâu, làm gì cũng gặp thuận lợi. Không khéo ăn nói, bốn bề đều là trở ngại, khó khăn. Trong thời đại thông tin và liên lạc phát triển nhanh chóng, tin tức được cập nhật liên tục, các công cụ thông tin và kĩ thuật truyền thông được ứng dụng rộng rãi như ngày nay thì việc khéo ăn nói đã trở thành “cái tài số một thiên hạ”. Trong khoảng thời gian ngắn nhất, nếu ai có thể nêu bật được khả năng, thực lực của mình cho đối phương biết thì đó sẽ là người chiến thắng. Chính vì vậy mà câu nói “Khéo ăn nói sẽ có được thiên hạ” rất có ý nghĩa. Vậy, như thế nào mới gọi là biết cách ăn nói? Nói năng lưu loát, không ấp úng có được gọi là biết cách nói chuyện không? Nói ngắn gọn, nói ít nhưng ý nghĩa thâm sâu có được gọi là biết cách nói chuyện không? Hay nhất định phải nói nhiều mới là biết nói chuyện?', 'kheo-an-kheo-noi-se-co-duoc-thien-ha.jpg', '2019-04-08 08:41:36', '2019-04-08 08:41:36'),
(129, 'Bồ câu không đưa thư', 'bo-cau-khong-dua-thu', 2, 2, 2, '58000', '500', 'Câu chuyện bắt đầu từ lá thư làm quen để trong học bàn của Thục, trong bộ ba Xuyến, Thục, Cúc Hương. Lá thư chân tình đã thu hút sự tò mò của bộ ba, và họ bị cuốn hút vào trò chơi với người giấu mặt, dần hồi kéo theo Phán củi, anh chàng xấu xí vụng về của lớp làm quân sư và giúp xướng họa thơ. Cuộc truy tìm dẫn mọi người đến nhiều hiểu lầm tai hại và cả những bất ngờ thú vị. Và điều bất ngờ cuối cùng đã được phát hiện quá muộn. Vì sao? Xin để cho bạn đọc tự khám phá.', '786f115ceeec107161b6d3a5e01a0afe.jpg', '2019-04-08 08:45:03', '2019-05-05 20:56:19'),
(130, 'Còn chút gì để nhớ', 'con-chut-gi-de-nho', 2, 2, 2, '65000', '500', 'Đó là những kỷ niệm thời đi học của Chương, lúc mới bước chân vào Sài Gòn và làm quen với cuộc sống đô thị. Là những mối quan hệ bạn bè tưởng chừng hời hợt thoảng qua nhưng gắn bó suốt cuộc đời. Cuộc sống đầy biến động đã xô dạt mỗi người mỗi nơi, nhưng trải qua hàng mấy chục năm, những kỷ niệm ấy vẫn luôn níu kéo Chương về với một thời để nhớ.', '888d58e13c2b3e60327ad6bd577f8a3b.jpg', '2019-04-08 08:46:14', '2019-05-05 20:55:56'),
(131, 'Thanh xuân không hối tiếc', 'thanh-xuan-khong-hoi-tiec', 2, 2, 2, '60000', '500', 'Thanh Xuân Không Hối Tiếc\r\n\r\nMỗi người có một cách khác nhau để sống những ngày tuổi trẻ, có người dành trọn nó cho những cuộc tình, có người dành trọn nó cho công việc, có người dành trọn nó để tự yêu thương mình, và cũng có những người chia tuổi trẻ của mình ra, để yêu một vài người, sau đó yêu mình, yêu người xung quanh mình, rồi đến một lúc nào đó thích hợp mới tiếp tục muốn yêu thêm một người cho đến hết cuộc đời.\r\n\r\nDù người ta có dành tuổi trẻ của mình cho ai hay để làm gì, thì cũng mong sau này khi đã đủ chín chắn để ngoái đầu nhìn lại, họ cũng sẽ mỉm cười, một nụ cười vô ưu viên mãn.\r\n\r\n“Không có giọt nước mắt nào rơi\r\nVì những thứ, những người không xứng đáng.\r\nKhông có nỗi buồn nào vô hạn\r\nĐể ủ dột thê lương mọc kín góc tâm hồn!”\r\n \r\nCái người ta hoài công tìm kiếm suốt một thời xanh trẻ, rốt cuộc không phải là một tình yêu điên cuồng mù quáng, lại càng không phải là những thứ vật chất phù du. Cuối cùng khi đi hết đoạn đường đầy tin yêu và khát vọng, người ta chỉ mong thấy được sự thanh thản bình yên trong sâu thẳm lòng mình.\r\n\r\nChúc bạn có một thanh xuân không hối tiếc!', '10fa78e835810c444e6c7566627aa953.png', '2019-04-08 08:49:26', '2019-05-05 20:57:18'),
(132, 'Út quyên và tôi', 'ut-quyen-va-toi', 2, 2, 2, '45000', '500', 'Tập truyện ngắn với 12 câu chuyện là 12 niềm vui, 12 kỉ niệm dễ thương, 12 bài học giản dị mà sâu sắc… Gặp trong tập truyện này những hình ảnh rất dễ thương, những lời thoại rất học trò…', 'f16b61d13e44e00f714201631b161647.jpg', '2019-04-08 08:50:24', '2019-05-06 05:09:22'),
(133, 'Đi qua hoa cúc', 'di-qua-hoa-cuc', 2, 2, 2, '70000', '500', 'Cuốn Đi Qua Hoa Cúc là tập truyện dài của Nguyễn Nhật Ánh, mở đầu câu truyện tác giả kể lại tuổi ấu thơ hồn nhiên của nhân vật trong truyện, kết hợp với tả cảnh ở miền quê, những ngôi nhà nằm dọc hai bên đường đá sỏi dọc theo hai bên hàng dâm bụt và cả cây sứ cây bàng tỏa bóng mát, tỏa hương thơm trước sân nhà. Một nét vẽ nên thơ thật đầm ấm ở một vùng quê xa xôi tác giả dường như làm ấm lòng cho người đọc. Thật vậy mỗi cốt truyện của Nguyễn Nhật Ánh đã phác họa lên một nét quê hương ngọt ngào, một thời ấu thơ đẹp, một tình yêu của tuổi học trò cũng hòa lẫn tình yêu khát khao của bao lứa tuổi. Cuốn truyện dài Đi Qua Hoa Cúc là một trong những tác phẩm tuyệt tác hay của tác giả làm thôi thúc người đọc thêm nhiều ấn tượng và sự lôi cuốn tràn dâng trong lòng bạn đọc.', '321374869722732f1791b349df96bcc4.jpg', '2019-04-08 08:51:12', '2019-05-06 05:07:00'),
(134, 'Chúc một ngày tốt lành', 'chuc-mot-ngay-tot-lanh', 2, 2, 2, '115000', '500', 'Đọc tựa cuốn sách mới nhất của nhà văn Nguyễn Nhật Ánh là muốn mở ngay trang sách. Bạn sẽ thấy một thứ ngôn ngữ lạ của Hàn Quốc hay của nước nào tùy bạn đoán, Gô un un là Chào buổi sáng; Un gô gô là Chúc ngủ ngon, và nữa, Chiếp un un; Ăng gô gô; Chiếp chiếp gô…\r\n\r\n \r\n\r\nSau chó Bê Tô, rồi Hai con mèo ngồi bên cửa sổ, nhà văn viết về một cặp heo', '93d27a7a50176f8ea8f5d71a620570be.jpg', '2019-04-08 08:52:39', '2019-05-06 05:07:58'),
(135, 'Bồ câu chung mái vòm', 'bo-cau-chung-mai-vom', 1, 1, 1, '80000', '500', '\"Những truyện ngắn trong tập sách này được tôi viết sau khi đi du học về với nhiều kỷ niệm thân thương.\r\nTôi vẫn thường mơ thấy lại những chú bồ câu đáng yêu dưới mái vòm nhà thờ yên ả. Tôi nhớ hoài những buổi chiều lang thang ở Rennes trong làn gió thu lãng mạn, nơi tôi đã viết truyện ngắn \"Một mùa thu ở Rennes\". Và bạn cũng sẽ bắt gặp những chuyến chu du của tôi đến những miền đất lạ trong \"Con gà nói tiếng Đức\", \"Bất chợt ở La Mã\", \"Tú cầu vùng Bretagne\"...\r\nMời bạn hãy lại cùng tôi, mơ về những tháng ngày tươi đẹp của một Châu Âu cổ kính nhưng hiện đại, nơi những người trẻ chúng ta luôn mong có một hành trình hướng đến tương lai\"', '853c33402cf24993d9e1a58613bd6c88.jpg', '2019-04-08 08:56:01', '2019-05-06 05:05:38'),
(136, 'Búp bê nhỏ xíu và chàng khổng lồ', 'bup-be-nho-xiu-va-chang-khong-lo', 1, 1, 1, '52000', '500', 'Những truyện ngắn mới của Dương Thụy, viết về nước Pháp, nơi tác giả dành nhiều tình cảm đặc biệt, có những người bạn mà tác giả xem như người nhà. Tập truyện cuốn hút bởi sự giản dị và không khí lãng mạn bao trùm.', 'c9858a417fa0cac1d22b6b8f29466771.jpg', '2019-04-08 08:57:54', '2019-05-06 05:10:11'),
(137, 'Trả lại nụ hôn', 'tra-lai-nu-hon', 1, 9, 9, '75000', '500', '“Trả lại nụ hôn” được chia làm 4 phần Xuân/ Hạ/ Thu/ Đông như là một cách làm mới bố cục tập ký sự, nhưng không hề khiên cưỡng mà trái lại, các bài viết còn được tác giả sắp xếp khá “đắc địa” với những tình tiết hợp cảnh và gợi… tình.  Nếu như “Venise và những cuộc tình gondola” hoàn toàn viết về châu Âu thì tập sách mới này mở rộng biên giới sang một số nước châu Á như Myanmar, Hàn Quốc, Hong Kong… Có một điểm chung giữa 2 tập ký sự là Dương Thụy hay nhắc đến những cuộc tình. Vậy mà người đọc cứ thấy cảm giác lạ lẫm trong mỗi bài viết, và lạ hơn, qua những lần chuyển mùa như trong tập “Trả lại nụ hôn” này.', '83d964b8ee01626a246e35b7d5653367.jpg', '2019-04-08 08:59:13', '2019-05-06 05:12:42'),
(138, 'Vanise và những cuộc tình gondola', 'vanise-va-nhung-cuoc-tinh-gondola', 2, 2, 2, '118000', '5000', 'Với tinh thần truyền cho những bạn trẻ niềm đam mê học hỏi, tính xốc vác, thú chu du qua những “ghi chép ngoài truyện”, Venise và những cuộc tình Gondola sẽ mang đến cho độc giả câu chuyện rất thật và cũng rất lý thú của chính tác giả. Từ những hiểu biết về Paris qua những trang sách báo đến khao khát cháy bỏng được một lần đặt chân đến Paris… đến những nỗ lực phấn đấu không ngừng để trở thành “dân Paris”, những cảm xúc vui buồn về cuộc sống ở kinh thành ánh sáng… Tất cả đều được Dương Thụy kể lại qua những dòng ký sự mượt mà sâu lắng và tràn đầy nhiệt huyết của một người trẻ dấn thân ở xứ người.', '35d2df8e12b30439691174a980535e94.jpg', '2019-04-08 09:01:27', '2019-05-06 05:11:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` datetime NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` datetime NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `book_id`, `content`, `created_at`, `updated_at`) VALUES
(3, 6, 3, 'quá dữ', '2019-05-22 00:03:18', '2019-05-22 00:03:18'),
(4, 7, 1, 'sách này khá là hay, mình đoán vậy chứ đã đọc éo đâu mà biết hihi', '2019-05-22 00:24:04', '2019-05-22 00:24:04'),
(5, 7, 3, 'Bạn phía trên pr hơi quá nhé', '2019-05-22 00:24:26', '2019-05-22 00:24:26'),
(6, 7, 128, 'Tôi đã và đang sắp đọc xong cuốn sách này rồi, nay tôi lên đây để nói ra hết tâm tư lòng này là: là sách hay quá đi à à à....', '2019-05-22 00:39:11', '2019-05-22 00:39:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `headerpages`
--

CREATE TABLE `headerpages` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `headerpages`
--

INSERT INTO `headerpages` (`id`, `image`, `text`, `title`, `created_at`, `updated_at`) VALUES
(1, 'bookds.jpeg', 'Thế giới sách', 'Trang sản phẩm', '2019-05-21 17:03:19', '2019-05-21 10:03:19'),
(2, 'banner6.jpg', 'Liên hệ', 'Trang liên hệ', '2019-05-21 17:05:08', '2019-05-21 10:05:08'),
(3, '1_Y_E8iXfA9bv9jePsyg9ATA.jpeg', 'Thông tin cá nhân', 'Trang thông tin cá nhân', '2019-05-21 17:30:08', '2019-05-21 10:30:08'),
(4, 'Conserver-the_visuel-haut_desktop.jpg', 'Giỏ hàng- thanh toán', 'Trang giỏ hàng thanh toán', '2019-05-21 17:18:41', '2019-05-21 10:18:41'),
(5, 'Visuel-cate_coffret_et_assortiment_desktop.jpg', 'Tra cứu đơn hàng', 'Trang tra cứu đơn hàng', '2019-05-22 15:59:21', '2019-05-22 08:59:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_books`
--

CREATE TABLE `image_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image_books`
--

INSERT INTO `image_books` (`id`, `book_id`, `image`, `created_at`, `updated_at`) VALUES
(10, 1, 'sach-toi-thay-hoa-vang-tren-co-xanh-1484671487-1784161-1484671487.jpg', '2019-04-08 08:23:43', '2019-04-08 08:23:43'),
(11, 1, '77b8b27d91fa78f8253d8fd43562e411.jpg', '2019-04-08 08:23:43', '2019-04-08 08:23:43'),
(14, 3, '5c.jpg', '2019-04-09 10:47:02', '2019-04-09 10:47:02'),
(15, 3, '5c2.jpg', '2019-04-09 10:47:02', '2019-04-09 10:47:02'),
(16, 132, 'ut-quyen.jpg', '2019-05-06 05:03:29', '2019-05-06 05:03:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kinds`
--

CREATE TABLE `kinds` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kinds`
--

INSERT INTO `kinds` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Truyện ngắn', NULL, '2019-04-08 08:55:07'),
(2, 'Tiểu thuyết', NULL, NULL),
(3, 'Văn học', NULL, NULL),
(5, 'Thiếu nhi', '2019-04-08 08:28:13', '2019-04-08 08:28:13'),
(6, 'Giáo khoa- Tham khảo', '2019-04-08 08:28:53', '2019-04-08 08:28:53'),
(7, 'Kinh tế', '2019-04-08 08:29:04', '2019-04-08 08:29:04'),
(8, 'Tâm lý - Kỹ năng sống', '2019-04-08 08:29:31', '2019-04-08 08:29:31'),
(9, 'Văn hóa - Nghệ thuật', '2019-04-08 08:30:18', '2019-04-08 08:30:18'),
(10, 'Truyện dài', '2019-05-19 05:47:26', '2019-05-19 05:47:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_24_090906_create_kinds_table', 1),
(4, '2019_03_24_091124_create_authors_table', 1),
(5, '2019_03_24_091208_create_publishers_table', 1),
(6, '2019_03_24_091234_create_books_table', 1),
(7, '2019_03_24_091310_create_feedback_table', 1),
(8, '2019_03_24_091337_create_orders_table', 1),
(9, '2019_03_24_091543_create_image_books_table', 1),
(10, '2019_03_24_093508_create_customers_table', 1),
(11, '2019_03_24_093544_create_employees_table', 1),
(12, '2019_03_24_093602_create_bills_table', 1),
(13, '2019_03_24_093615_create_bill_details_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalPrice` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payMethod` int(11) NOT NULL DEFAULT '1',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `quantity`, `totalPrice`, `name`, `address`, `phone`, `email`, `payMethod`, `content`, `status`, `created_at`, `updated_at`) VALUES
(16, 4, '256000', 'Mai Lan', 'Ho chi minh, vietnam', '0332524582', 'mailan@gmail.com', 1, 'không có gì', '3', '2019-05-22 18:13:12', '2019-05-22 11:13:12'),
(18, 4, '333000', 'Hoàng Văn Thành', '100Q Hùng Vương, Phường 9, quận 5, hồ chí minh', '332072362', 'thanhhv317@gmail.com', 1, 'Tôi là người có tiền nên tôi mua nhiều thì sao nào', '2', '2019-05-21 08:10:00', '2019-05-21 01:10:00'),
(20, 1, '64500', 'Hoàng Văn Thành', '100Q Hùng Vương, Phường 9, quận 5, hồ chí minh', '2432134152', 'thanhhv317@gmail.com', 1, 'không có gì', '3', '2019-05-21 08:40:24', '2019-05-21 01:40:24'),
(21, 3, '245000', 'Hoàng Văn Thành', '100Q Hùng Vương, Phường 9, quận 5, hồ chí minh', '0332072362', 'thanhhv317@gmail.com', 1, 'không có gì', '1', '2019-05-22 18:13:05', '2019-05-22 11:13:05'),
(22, 1, '70000', 'Hoàng Văn Thành', '100Q Hùng Vương, Phường 9, quận 5, hồ chí minh', '2432134152', 'thanhhv317@gmail.com', 2, 'không có gì', '3', '2019-05-22 18:13:08', '2019-05-22 11:13:08'),
(23, 2, '105000', 'Hoàng Văn Thành', '100Q Hùng Vương, Phường 9, quận 5, hồ chí minh', '2432134152', 'thanhhv317@gmail.com', 1, 'không có gì', '1', '2019-05-21 10:46:09', '2019-05-21 03:46:09'),
(24, 3, '224500', 'Hoàng Văn Thành', '100Q Hùng Vương, Phường 9, quận 5, hồ chí minh', '2432134152', 'thanhhv317@gmail.com', 1, 'không có gì', '1', '2019-05-22 20:09:58', '2019-05-22 13:09:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `book_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `book_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(16, 16, '129', 1, '58000', '2019-05-20 03:20:46', '2019-05-20 03:20:46'),
(17, 16, '128', 3, '66000', '2019-05-20 03:20:46', '2019-05-20 03:20:46'),
(19, 18, '134', 2, '115000', '2019-05-20 08:22:24', '2019-05-20 08:22:24'),
(20, 18, '132', 1, '45000', '2019-05-20 08:22:25', '2019-05-20 08:22:25'),
(21, 18, '129', 1, '58000', '2019-05-20 08:22:25', '2019-05-20 08:22:25'),
(25, 20, '2', 1, '64500', '2019-05-21 01:39:34', '2019-05-21 01:39:34'),
(26, 21, '137', 1, '75000', '2019-05-21 01:40:11', '2019-05-21 01:40:11'),
(27, 21, '136', 1, '52000', '2019-05-21 01:40:11', '2019-05-21 01:40:11'),
(28, 21, '138', 1, '118000', '2019-05-21 01:40:11', '2019-05-21 01:40:11'),
(29, 22, '133', 1, '70000', '2019-05-21 01:46:05', '2019-05-21 01:46:05'),
(30, 23, '131', 1, '60000', '2019-05-21 01:46:20', '2019-05-21 01:46:20'),
(31, 23, '132', 1, '45000', '2019-05-21 01:46:20', '2019-05-21 01:46:20'),
(32, 24, '1', 1, '125000', '2019-05-22 05:00:16', '2019-05-22 05:00:16'),
(33, 24, '3', 1, '33500', '2019-05-22 05:00:16', '2019-05-22 05:00:16'),
(34, 24, '128', 1, '66000', '2019-05-22 05:00:16', '2019-05-22 05:00:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('thanhhv317@gmail.com', '$2y$10$C8sCzq3kyOsdcLs0nN6o2OlJnAbms4HYvvUKoQGC.431YBId1YKGC', '2019-05-22 23:13:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `publishers`
--

CREATE TABLE `publishers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `address`, `info`, `created_at`, `updated_at`) VALUES
(1, 'Nhà xuất bản Kim Đồng', '55 Quang Trung, Hai Bà Trưng, Hà Nội', 'Đây là nhà xuất bản sách nổi tiếng cho thiếu nhi thuộc trực thuộc Trung ương Đoàn TNCS Hồ Chí Minh. Các nhà văn trẻ có thể gửi tác phẩm của mình cho nhà xuất bản Kim Đồng. Nhà xuất bản Kim Đồng chuyên in ấn, xuất bản sách dành cho thiếu nhi và các bậc phụ huynh trong cả nước. Ngoài ra nhà xuất bản còn có nhiều sách để quảng bá và giới thiệu văn hóa Việt Nam ra thế giới.', NULL, NULL),
(2, 'Nhà xuất bản Trẻ', '161B Lý Chính Thắng, Phường 7, Quận 3, Thành phố Hồ Chí Minh.', 'Nhà xuất bản trẻ xuất bản sách và văn hóa phẩm các loại, phục vụ chủ yếu là các đối tượng trẻ như thanh niên, thiếu nhi, tổ chức Đoàn các cấp của thành phố, phục vụ bạn đọc trong và ngoài nước. Nhà xuất bản có nhận xuất bản nhiều thể loại sách như: tài liệu chính trị, kiến thức phổ thông, văn hóa – xã hội, nghệ thuật, văn học, từ điển,...', NULL, NULL),
(3, 'Nhà xuất bản Tổng hợp thành phố Hồ Chí Minh', '	62 Nguyễn Thị Minh Khai, Phường Đa Kao, Quận 1, TP.HCM', 'Nhà xuất bản Tổng hợp thành phố Hồ Chí Minh được thành lập từ năm 1977. Đúng như tên gọi của nhà xuất bản là cơ quan hội tụ về tư tưởng, văn hóa, chính trị của Đảng bộ và nhân dân thành phố. Nhà xuất bản Tổng hợp thành phố Hồ chí Minh xuất bản hàng ngàn tựa sách gồm nhiều thể loại', NULL, NULL),
(7, 'Nhà xuất bản Giáo dục', 'Số 81 Trần Hưng Đạo, Hoàn Kiếm, Hà Nội', '<p style=\"text-align:center\"><strong>Nhà xuất bản giáo dục , tự hào là NXB&nbsp;</strong><em>\" ươm mồng cho nền giáo dục nước nhà\".&nbsp;&nbsp;</em><input checked=\"checked\" name=\"button nè\" type=\"radio\" value=\"1\" /></p>\r\n\r\n<p><strong>Nhà xuất bản giáo dục , tự hào là NXB&nbsp;</strong><em>\" ươm mồng cho nền giáo dục nước nhà\".</em></p>', '2019-03-28 10:26:47', '2019-03-28 10:28:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `top_banners`
--

CREATE TABLE `top_banners` (
  `id` int(10) NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `top_banners`
--

INSERT INTO `top_banners` (`id`, `value`, `created_at`, `updated_at`) VALUES
(1, '[{\"id\":\"4636249\",\"linkbtn\":\"product\",\"textbtn\":\"s\\u00e1ch b\\u00e1n ch\\u1ea1y\",\"image\":\"56877170_10157243899272769_7371811085793361920_n.jpg\"},{\"id\":\"71737543\",\"linkbtn\":\"product\\/5\",\"textbtn\":\"s\\u00e1ch thi\\u1ebfu nhi\",\"image\":\"nobi.png\"},{\"id\":\"24413280\",\"linkbtn\":\"product\\/1\",\"textbtn\":\"Truy\\u1ec7n ng\\u1eafn\",\"image\":\"sabuta.png\"},{\"id\":\"63109918\",\"linkbtn\":\"product\\/5\",\"textbtn\":\"Ti\\u1ec3u thuy\\u1ebft\",\"image\":\"57297744_10157243899352769_2040960753887870976_n.png\"},{\"id\":\"38687792\",\"linkbtn\":\"about\",\"textbtn\":\"Th\\u00f4ng tin\",\"image\":\"photo-3-1500343004516.jpg\"},{\"id\":\"49989886\",\"linkbtn\":\"login\",\"textbtn\":\"mua ngay\",\"image\":\"Untitled.png\"}]', NULL, '2019-05-22 23:50:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `top_slides`
--

CREATE TABLE `top_slides` (
  `id` int(10) NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `top_slides`
--

INSERT INTO `top_slides` (`id`, `value`, `created_at`, `updated_at`) VALUES
(1, '[{\"id\":\"3417290\",\"title\":\"t\\u1ee7 s\\u00e1ch 2019\",\"description\":\"M\\u1ed9t th\\u1ebf gi\\u1edbi m\\u1edbi r\\u1ed9ng m\\u1edf\",\"linkbtn\":\"#\",\"textbtn\":\"Xem ngay\",\"image\":\"banner-bg-book1.jpg\"},{\"id\":\"13854043\",\"title\":\"nh\\u00e0 s\\u00e1ch online\",\"description\":\"\\u0110\\u1ecdc hi\\u1ec3u tri th\\u1ee9c\",\"linkbtn\":\"http:\\/\\/localhost:8080\\/www\\/framework\\/ebook\\/admin\\/home\\/list\",\"textbtn\":\"Xem ngay\",\"image\":\"as.jpg\"},{\"id\":\"637385\",\"title\":\"m\\u01b0ng khai tr\\u01b0\\u01a1ng\",\"description\":\"m\\u1ed9t cu\\u1ed1n s\\u00e1ch m\\u1ed9t t\\u01b0\\u01a1ng lai\",\"linkbtn\":\"www.fb.com\",\"textbtn\":\"Xem ngay\",\"image\":\"banner1.jpg\"}]', NULL, '2019-04-12 01:57:58'),
(2, 'hi', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `address`, `phone`, `birthday`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Hoàng Văn Thành', 'thanhhv317@gmail.com', '2019-05-23 07:45:24', '$2y$10$oaek6pCJ7tWAG.VyaLw/VuSB2a.BxVwhc//uTVH4U9gA3uILEQZfu', '2', '100Q Hùng Vương, Phường 9, quận 5, hồ chí minh', '2432134152', '1998-06-20', 'hi1.png', '0YKe4qYU3Sf6E8feyXVWCGfjz0zP94BEscYImgJ6agCb32zNUL4LLzMDv6Rq', '2019-05-19 02:41:42', '2019-05-20 21:55:23'),
(7, 'Mai Lan', 'mailan@gmail.com', '2019-05-23 07:45:06', '$2y$10$sx2SwZ/BvbSkok5XStBfoOFgjDjixjyCnQLYRHZ5fM4KKTwSPAcUy', '1', 'Ho chi minh, vietnam', '0332524582', '1998-02-02', 'maxresdefault.jpg', '8dxDIQ3TzOgrZX4A4RlP5CsTPQCJJB58UBbppEMw4ojn35YQjaW3Nop888KI', '2019-05-19 05:16:20', '2019-05-19 05:17:22'),
(8, 'kẻ lừa đảo', 'luadao@gmail.com', '2019-05-20 09:56:30', '$2y$10$2xdn5fpIlMxjyI0mB26inenPDXvYhBy8E2n9LgzBZXAatYqzu52t2', '1', 'Ho chi minh, vietnam', '032545658', '1998-11-08', '20150416-0001.jpeg', 'tgB21aXSA4RoN3T2qBqcm8XKWZOujTCmgItp0yBhD9YAQpSyrP0F4Gm1iHCJ', '2019-05-20 02:53:48', '2019-05-20 02:54:17'),
(9, 'Trịnh Đình Quang', 'test@gmail.com', '2019-05-23 07:48:25', '$2y$10$Ol7jA1roxnDLa4s1aa9DBeVvfLTR19QqylRQNOhxWacyABBPPeHzW', '2', 'Ho chi minh, vietnam', '0325456582', '1998-11-08', 'cute-dog-shiba-inu-ryuji-japan-1-1492164409885.jpg', NULL, '2019-05-23 00:46:47', '2019-05-23 00:48:25');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_customer_id_foreign` (`customer_id`),
  ADD KEY `bills_employee_id_foreign` (`employee_id`);

--
-- Chỉ mục cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_details_bill_id_foreign` (`bill_id`),
  ADD KEY `bill_details_book_id_foreign` (`book_id`);

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_publisher_id_foreign` (`publisher_id`),
  ADD KEY `books_kind_id_foreign` (`kind_id`),
  ADD KEY `books_author_id_foreign` (`author_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD KEY `customers_id_foreign` (`id`);

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD KEY `employees_id_foreign` (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_user_id_foreign` (`user_id`),
  ADD KEY `feedback_book_id_foreign` (`book_id`);

--
-- Chỉ mục cho bảng `headerpages`
--
ALTER TABLE `headerpages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image_books`
--
ALTER TABLE `image_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_books_book_id_foreign` (`book_id`);

--
-- Chỉ mục cho bảng `kinds`
--
ALTER TABLE `kinds`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order` (`order_id`);

--
-- Chỉ mục cho bảng `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `top_banners`
--
ALTER TABLE `top_banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `top_slides`
--
ALTER TABLE `top_slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `headerpages`
--
ALTER TABLE `headerpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `image_books`
--
ALTER TABLE `image_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `kinds`
--
ALTER TABLE `kinds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `top_banners`
--
ALTER TABLE `top_banners`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `top_slides`
--
ALTER TABLE `top_slides`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bills_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `bill_details_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bill_details_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_kind_id_foreign` FOREIGN KEY (`kind_id`) REFERENCES `kinds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedback_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `image_books`
--
ALTER TABLE `image_books`
  ADD CONSTRAINT `image_books_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
