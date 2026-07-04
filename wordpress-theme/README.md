# Theme WordPress - Phòng Khám Mắt DrNhatChau

Theme WordPress tùy chỉnh, thiết kế lại từ bản website tĩnh (xem thư mục gốc của repo), giúp bạn **tự đăng bài, thêm bác sĩ, thêm dịch vụ** ngay trong trang quản trị WordPress mà không cần biết code.

Theme đã được cài đặt và test trên WordPress local (PHP 8.3 + SQLite) - toàn bộ trang chủ, giới thiệu, dịch vụ, bác sĩ, blog, liên hệ đều hoạt động đúng.

## Cài đặt WordPress trên Hostinger

1. Đăng nhập **hPanel** → chọn website → **Auto Installer** (hoặc mục "Websites" → "Manage" → tìm "WordPress") → cài đặt WordPress vào domain của bạn.
2. Trong quá trình cài, đặt sẵn tên site, username/mật khẩu quản trị (ghi nhớ lại).
3. Sau khi cài xong, đăng nhập `https://ten-mien-cua-ban.com/wp-admin/`.

## Cài theme

1. Nén thư mục `drnhatchau-eyecare/` (thư mục con trong `wordpress-theme/`) thành file `drnhatchau-eyecare.zip` — **chỉ nén nội dung bên trong thư mục theme**, không nén luôn thư mục `wordpress-theme` bên ngoài.
2. Vào wp-admin → **Giao diện (Appearance) → Giao diện (Themes) → Thêm mới → Tải giao diện lên (Upload Theme)**.
3. Chọn file zip vừa tạo → **Cài đặt (Install Now)** → **Kích hoạt (Activate)**.

## Thiết lập ban đầu (bắt buộc, làm 1 lần)

### 1. Đường dẫn tĩnh (Permalinks)
Vào **Cài đặt (Settings) → Đường dẫn tĩnh (Permalinks)** → chọn **"Tên bài viết" (Post name)** → Lưu thay đổi.
(Nếu bỏ qua bước này, các trang như /dich-vu/, /bac-si/ sẽ không hiển thị đúng.)

### 2. Tạo các trang (Pages) cần thiết
Vào **Trang (Pages) → Thêm mới**, tạo đúng các trang sau (đường dẫn/slug phải khớp chính xác):

| Tiêu đề trang       | Đường dẫn (slug) | Ghi chú |
|---------------------|------------------|---------|
| Trang chủ            | `trang-chu`      | Nội dung để trống, chỉ dùng làm "Homepage" |
| Giới thiệu            | `gioi-thieu`     | Có thể để trống hoặc viết thêm nội dung, theme đã có sẵn bố cục |
| Liên hệ               | `lien-he`        | Để trống, theme tự hiển thị form liên hệ + bản đồ |
| Kiến thức nhãn khoa   | `kien-thuc`      | Để trống, đây sẽ là trang danh sách bài viết (blog) |

### 3. Gán trang chủ và trang danh sách bài viết
Vào **Cài đặt (Settings) → Đọc (Reading)**:
- **Trang chủ hiển thị (Your homepage displays)**: chọn **"Một trang tĩnh" (A static page)**
- **Trang chủ (Homepage)**: chọn trang **"Trang chủ"**
- **Trang bài viết (Posts page)**: chọn trang **"Kiến thức nhãn khoa"**
- Lưu thay đổi.

### 4. Tạo Menu chính (tùy chọn nhưng khuyến khích)
Vào **Giao diện → Menu (Menus)** → tạo menu mới, thêm các trang/liên kết: Trang chủ, Giới thiệu, Dịch vụ (liên kết tùy chỉnh tới `/dich-vu/`), Đội ngũ bác sĩ (`/bac-si/`), Kiến thức nhãn khoa, Liên hệ → gán vị trí hiển thị là **"Menu chính"**.
(Nếu chưa tạo menu, theme tự hiển thị menu mặc định giống trên nên trang vẫn chạy được ngay.)

### 5. Cập nhật thông tin liên hệ
Vào **Giao diện → Tùy biến (Customize) → "Thông tin liên hệ phòng khám"** để chỉnh: số điện thoại, email, địa chỉ, giờ làm việc, link Facebook, slogan. Các trang sẽ tự động cập nhật theo.

## Thêm nội dung

- **Thêm dịch vụ mới**: menu bên trái wp-admin → **Dịch vụ → Thêm dịch vụ mới**. Điền tiêu đề + mô tả, có thể thêm ảnh đại diện (Featured Image). Nếu dịch vụ cần phẫu thuật tại bệnh viện liên kết, tick ô "can_phau_thuat" trong phần Custom Fields (nếu không thấy, bật hiển thị qua "Screen Options" ở góc trên bên phải).
- **Thêm bác sĩ mới**: menu **Bác sĩ → Thêm bác sĩ mới**. Điền tên, mô tả/tiểu sử trong nội dung bài, và điền "chuc_danh" (chức danh) trong Custom Fields.
- **Viết bài kiến thức nhãn khoa**: menu **Bài viết (Posts) → Viết bài mới** như bình thường — bài viết sẽ tự động xuất hiện tại trang "Kiến thức nhãn khoa".

## Form liên hệ

Form ở trang Liên hệ gửi email qua hàm `wp_mail()` của WordPress tới địa chỉ email cấu hình trong Tùy biến, không cần cài plugin. Một số gói hosting chặn hàm mail() mặc định của PHP — nếu bạn gửi thử mà không nhận được email, cài plugin miễn phí **WP Mail SMTP**, kết nối với Gmail để đảm bảo email luôn gửi được.

## Test local đã thực hiện

Đã dựng WordPress + PHP 8.3 (SQLite, không cần MySQL) trên máy local để kiểm tra: trang chủ, giới thiệu, dịch vụ (danh sách + chi tiết), bác sĩ (danh sách + chi tiết), blog (danh sách + chi tiết), liên hệ (bản đồ + gửi form), menu di động, toàn bộ đều hoạt động đúng trước khi bàn giao.
