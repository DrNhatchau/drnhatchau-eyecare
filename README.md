# Website Phòng Khám Mắt DrNhatChau

Website tĩnh (HTML/CSS/JS thuần) cho Phòng Khám Mắt DrNhatChau, lấy cảm hứng cấu trúc từ [haiyeneyecare.com](https://haiyeneyecare.com).

## Cấu trúc thư mục

```
index.html        Trang chủ
gioi-thieu.html    Giới thiệu (sứ mệnh, tầm nhìn, giá trị cốt lõi)
dich-vu.html       Danh sách dịch vụ
bac-si.html        Đội ngũ bác sĩ
kien-thuc.html     Kiến thức nhãn khoa
lien-he.html       Liên hệ + bản đồ + form đặt lịch
css/style.css      Toàn bộ style
js/main.js         Menu mobile, active link, hiệu ứng header khi cuộn
assets/images/     Ảnh, logo (hiện đang là placeholder)
```

## Việc cần làm tiếp (nội dung đang để placeholder)

Tìm các comment `<!-- TODO: ... -->` trong từng file để biết chính xác vị trí cần sửa:

- [ ] Thay logo thật vào `assets/images/` và cập nhật thẻ `<img>` trong tất cả các trang (hiện dùng `logo-placeholder.svg`).
- [ ] Thêm ảnh thật cho phòng khám/bác sĩ (đang là các khung "Ảnh... sẽ cập nhật").
- [ ] Cập nhật **giờ làm việc** thật (đang để "Đang cập nhật" ở footer và trang Liên hệ).
- [ ] Cập nhật **link Facebook thật** (Fanpage: "Phòng khám Mắt TS BSCC Nguyễn Nhất Châu") — hiện để `href="#"`.
- [ ] Bổ sung tiểu sử chi tiết của TS. BSCC Nguyễn Nhất Châu (trang `bac-si.html`, `gioi-thieu.html`, `index.html`).
- [ ] Bổ sung các bác sĩ khác khi có (khung "+ Các bác sĩ khác" trong `bac-si.html`).
- [ ] Bổ sung dịch vụ mới khi có (khung "+ Các dịch vụ khác" trong `dich-vu.html`).
- [ ] Bổ sung thêm bài viết kiến thức nhãn khoa khi có (`kien-thuc.html`).

## Xem thử trên máy (local)

Không cần cài đặt gì đặc biệt, chỉ cần một server tĩnh đơn giản (mở trực tiếp file `index.html` cũng được, nhưng dùng server sẽ tránh lỗi đường dẫn):

```bash
# Cách 1: dùng Python (đã có sẵn trên hầu hết máy)
python -m http.server 5500

# Cách 2: dùng Node.js
npx serve .
```

Sau đó mở trình duyệt tới `http://localhost:5500`.

## Đưa code lên GitHub

1. Tạo tài khoản tại https://github.com/signup (nếu chưa có).
2. Tạo repository mới (trống, không cần thêm README/license) tại https://github.com/new, ví dụ tên `drnhatchau-eyecare`.
3. Trong thư mục dự án, chạy:

```bash
git init
git add .
git commit -m "Initial website for Phong Kham Mat DrNhatChau"
git branch -M main
git remote add origin https://github.com/<ten-tai-khoan>/drnhatchau-eyecare.git
git push -u origin main
```

Khi `git push` yêu cầu đăng nhập, làm theo hướng dẫn trên màn hình (Git Credential Manager của Windows sẽ mở trình duyệt để đăng nhập GitHub).

## Deploy lên Hostinger

**Cách 1 — Git auto-deploy (nếu gói hosting hỗ trợ):**
1. Đăng nhập hPanel → chọn website → mục **Git** (thường ở phần Advanced/Nâng cao).
2. Dán URL repository GitHub, chọn nhánh `main`, thư mục đích là `public_html`.
3. Nhấn **Create/Deploy** — Hostinger sẽ tự động kéo code mỗi lần bạn deploy (một số gói tự deploy khi push, một số cần bấm "Deploy" thủ công trong hPanel).

**Cách 2 — File Manager / FTP (nếu không có tính năng Git):**
1. Nén toàn bộ nội dung thư mục dự án (trừ thư mục `.git`) thành file `.zip`.
2. Vào hPanel → **File Manager** → vào thư mục `public_html` → Upload → chọn file zip → giải nén (Extract) ngay trong File Manager.
3. Hoặc dùng FTP client (FileZilla) với thông tin FTP trong hPanel → **Files → FTP Accounts**, kéo thả toàn bộ file vào `public_html`.
4. Đảm bảo `index.html` nằm trực tiếp trong `public_html` (không nằm trong thư mục con) để domain trỏ đúng vào trang chủ.
