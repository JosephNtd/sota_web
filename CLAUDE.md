# CLAUDE.md — Dự án TitKul Website Rebuild

> **Repo:** `github.com/JosephNtd/sota_web` (branch `master`)
> **Nền tảng:** sota_web — CMS PHP MVC tự viết, WampServer + MariaDB, AltoRouter
> **Mục tiêu:** Dựng lại website titkul.vn — trang giới thiệu công ty + phần mềm SaaS giáo dục + tin tức. **Không có thương mại điện tử.**
> **Cập nhật lần cuối:** 23/06/2026

---

## 1. BỐI CẢNH DỰ ÁN

**Công ty:** Công ty Cổ phần TitKul — sản xuất phần mềm quản lý trường học (HDSchool, H2School, Zalo Mini App), phục vụ chuyển đổi số ngành giáo dục TP.HCM.

**Người thực hiện:** Thực tập sinh Web Developer.

**Nền tảng sota_web:**
- PHP thuần (không framework), MVC tự viết
- Router: AltoRouter (`libraries/router.php`) — `$requick` array + `switch($com)`
- Admin system: hoàn toàn config-driven qua `libraries/type/config-type-*.php`
- DB: MysqliDb wrapper, prefix `#_` cho tên bảng
- JS/CSS: tự build cache (debug mode bật để output từng file riêng lúc dev)
- `libraries/config.php` bị `.gitignore` — chỉ ở local, **không bao giờ commit hay lưu vào memory**

---

## 2. TỔNG QUAN KẾ HOẠCH

| Phase | Mô tả | Trạng thái |
|-------|--------|------------|
| 0 | Môi trường + config.php + WAMP chạy được | ✅ XONG |
| 1 | Phân tích / ánh xạ IA (Information Architecture) | ✅ XONG |
| 2 | Cấu hình content-type trong admin | ✅ XONG |
| 3 | Nhập liệu mẫu | ✅ XONG |
| 4 | Dựng template frontend | ✅ **XONG 100%** |
| 5 | Verify data dynamic + responsive test | ✅ XONG |
| 6 | Form AJAX (đăng ký tư vấn / liên hệ) | ✅ XONG |
| **7** | **Style audit + đồng bộ theme + Effect Map animations** | ✅ **XONG TOÀN BỘ** |
| **8** | **SEO / sitemap / favicon / robots.txt / responsive** | 🔧 **TIẾP THEO** |
| 9 | Minify CSS/JS + Lighthouse audit + deploy | ⏳ |

---

## 3. KIẾN TRÚC THÔNG TIN (IA)

### Ánh xạ content-type titkul → sota_web

| Loại | Type key | URL frontend | Template |
|------|----------|--------------|----------|
| Sản phẩm | `san-pham` | `/san-pham`, `/HDSchool`, `/H2School` | product_tpl / product_detail_tpl |
| Tính năng | `tinh-nang` | `/tinh-nang-noi-bat` | news_tpl (zigzag) / news_detail_tpl |
| HDSD | `huong-dan` | `/huong-dan-su-dung` | news_tpl (glass) / news_detail_tpl |
| Tin tức | `tin-tuc` | `/tin-tuc` | news_tpl (bento+grid) / news_detail_tpl |
| Case Study | `case-study` | `/case-study`, `/case-study/{slug}` | news_tpl / news_detail_tpl |
| Giới thiệu | `gioi-thieu` | `/gioi-thieu-titkul` | static_tpl |
| Văn bản PL | `van-ban-phap-ly` | `/van-ban-phap-ly` | static_tpl |
| Liên hệ | `lienhe` | `/lien-he` | contact_tpl |
| FAQ | `faq` | (dùng trong contact page) | — |
| Video | `video` | (homepage section) | — |
| Slider | `slider` | (photo module) | — |
| Đối tác | `doi-tac` | (photo module — nhãn "Trường tiêu biểu") | — |
| Newsletter | `dang-ky-tu-van` | (form partial) | — |

**Lưu ý sản phẩm:** slug `HDSchool` / `H2School` giữ đúng casing. `dropdown=false`, `list=false` (tắt giá). `masp` cần ALTER → `varchar(255)` để dùng làm subtitle.

---

## 4. CẤU TRÚC FILE CHÍNH

### Templates Frontend

| File | Dòng | Mô tả |
|------|------|-------|
| `templates/index.php` | 48 | Dispatcher: load đúng template theo `$source`; điều khiển `$__hideBread` |
| `templates/layout/slide.php` | 57 | Hero section (hexagon cluster + grid bg) |
| `templates/layout/menu.php` | 127 | Header + topbar + nav dropdown |
| `templates/layout/breadcrumb.php` | 27 | Page banner + H1 (ẩn khi có hero riêng) |
| `templates/layout/footer.php` | 86 | Footer 3 cột |
| `templates/layout/form_dangky.php` | 135 | Form đăng ký tư vấn (AJAX, reusable partial) |
| `templates/layout/hotro_lienhe.php` | 35 | Hotline + Zalo QR (reusable partial) |
| `templates/index/index_tpl.php` | 434 | Homepage 11 sections |
| `templates/news/news_tpl.php` | ~453 | Listing: 4 nhánh (case-study / tinh-nang / huong-dan / tin-tuc) |
| `templates/news/news_detail_tpl.php` | ~1100 | Detail: 4 nhánh (tinh-nang / huong-dan / case-study / tin-tuc) |
| `templates/product/product_tpl.php` | ~90 | Product listing — hero + zigzag rows + animations |
| `templates/product/product_detail_tpl.php` | 325 | Product detail 14 sections |
| `templates/static/static_tpl.php` | 202 | Giới thiệu + Văn bản pháp lý |
| `templates/contact/contact_tpl.php` | ~433 | Contact 3-section (hero / form glassmorphic / FAQ) |

### Breadcrumb ẩn theo trang (templates/index.php dòng 26–29)

```php
$__hideBread = ($source == 'index' || $source == 'static' || $source == 'contact');
if (!$__hideBread && $source == 'product' && empty($_GET['id'])) $__hideBread = true;
if (!$__hideBread && $source == 'news' && in_array(@$type, ['tin-tuc','huong-dan','case-study']) && empty($_GET['id'])) $__hideBread = true;
if (!$__hideBread && $source == 'news' && !empty($_GET['id'])) $__hideBread = true;
```

**Trang ẩn breadcrumb** (có hero section riêng): Homepage, Giới thiệu, Pháp lý, Liên hệ, Product listing, Tính năng listing, HDSD listing, Tin tức listing, Case Study listing, tất cả trang detail.

### Sources (Backend Data Layer)

| File | Dòng | Ghi chú |
|------|------|---------|
| `sources/index.php` | 71 | 10 queries: slider, tinhnang, sanpham_nb, huongdan, doitac, video, tintuc, casestudy (+stats/quote) |
| `sources/news.php` | 362 | Detail query + gallery queries stats/quote cho case-study |
| `sources/product.php` | 478 | 8 query blocks cho product detail |
| `sources/allpage.php` | — | Menu data: splistmenu, tinhnang_menu, huongdan_menu |

### Config & Router

| File | Dòng | Ghi chú |
|------|------|---------|
| `libraries/type/config-type-news.php` | 418 | 6 types: tin-tuc, tinh-nang, huong-dan, case-study, faq, video |
| `libraries/type/config-type-photo.php` | — | slider, doi-tac |
| `libraries/router.php` | 297 | AltoRouter routes + switch($com) |

### CSS

| File | Dòng |
|------|------|
| `assets/css/titkul.css` | **~10,600+** |

### AJAX & Forms

| File | Trạng thái |
|------|------------|
| `ajax/ajax_newsletter.php` | ✅ Có sẵn |
| `ajax/ajax_contact.php` | ✅ Có sẵn |

### Admin (đã sửa)

| File | Ghi chú |
|------|---------|
| `sota/sources/news.php` | Fix `case "man_photo":` (gallery 404 bug) |
| `sota/templates/gallery/man/photo_add_tpl.php` | `video_label` custom label support |
| `sota/templates/gallery/man/photo_edit_tpl.php` | `video_label` custom label support |

---

## 5. HOMEPAGE — 11 SECTIONS

| # | Section | Data source | CSS prefix |
|---|---------|-------------|------------|
| 1 | Hero (hexagons + brand + CTA) | `$tinhnang` (ảnh hex), hero tĩnh | `tk-hero2`, `tk-hex` |
| 2 | Apps Showcase (HDSchool / H2School) | `$sanpham_nb` (`noibat > 0`) | `tk-apps`, `tk-app-card` |
| 3+4 | Benefits + Why TitKul | Hardcoded | `tk-benefit2`, `tk-stat2`, `tk-why2` |
| 5 | VMV Storytelling (Vision/Mission/CoreValues) | Hardcoded + ảnh `assets/images/titkul/` | `tk-vmv2` |
| 6 | For Who — 4 đối tượng | `$huongdan` (fallback hardcode) | `tk-forwho` |
| 7 | Đăng ký tư vấn (form partial) | Newsletter module | `tk-register` |
| 8 | Trường tiêu biểu (Owl Carousel) | `$doitac` | `tk-partners` |
| 9 | Video (max 4, YouTube) | `$video` | `tk-videos` |
| 10 | Tin tức bento (1 main + 2 side) | `$tintuc` | `tk-news-bento` |
| 11 | Case Study alternating | `$casestudy`, `$casestudy_stats`, `$casestudy_quote` | `tk-cs-*` |

**Quan trọng:**
- `$sanpham_nb`: query lọc `noibat > 0` — phải tick "Nổi bật" trong admin
- `$tinhnang` hex: lấy tối đa 6 items `noibat > 0`
- Section 1 Hero: không dùng owl-carousel — hero tĩnh, grid pattern CSS

---

## 6. CASE STUDY — DATA MODEL

### Bảng `#_news` (type = `case-study`)

| Trường admin | DB column | Dùng để hiển thị |
|---|---|---|
| Tiêu đề | `tenvi` | Tên trường / dự án |
| Mô tả | `motavi` | Tóm tắt (homepage + listing) |
| Nội dung (CKEditor) | `noidungvi` | Chi tiết trang riêng |
| Hình ảnh | `photo` | Ảnh chính |
| Địa chỉ | `diachi` | Địa điểm trường |
| Nghề nghiệp | `nghenghiep` | Năm triển khai |
| Link ngoài | `link` | Badge type ("Trường học" / "Dự án triển khai") |
| Nổi bật ✅ | `noibat` | Hiển thị trên homepage |

### Gallery `#_gallery` (com=`news`, type=`case-study`, kind=`man`)

| `val` | `tenvi` | `link_video` | Giới hạn |
|-------|---------|--------------|---------|
| `stats` | Nhãn (VD: "Giảm thời gian báo cáo") | Giá trị (VD: "75%") | max 4 |
| `quote` | Nội dung câu nói | Tên + chức vụ tác giả | max 1 |

### Detail page — 7 sections

1. **Hero**: Badge (link) + Năm (nghenghiep) + Tiêu đề + Ảnh logo + Location (diachi) + Mô tả
2. **Quote**: Gallery `val='quote'`
3. **Stats**: Gallery `val='stats'` — counter-up khi scroll vào
4. **Content**: CKEditor `noidungvi`
5. **Gallery**: `hinhanhtt` — layered showcase (3 ảnh: center + left float + right float)
6. **CTA**: Navy dark + animated gradient + nút đăng ký
7. **Related**: Case studies cùng `id_list`, max 4

---

## 7. CSS ARCHITECTURE

**File:** `assets/css/titkul.css` (~10,600 dòng)

### Design System — "Premium Scholastic Modernism"

| Token | Giá trị | CSS var |
|-------|---------|---------|
| Deep Navy | `#001F3F` | `--tk-navy` |
| Professional Red | `#bb0021` | `--tk-red` |
| Background | `#f8f9ff` | `--tk-bg` |
| Surface Page | `#e8eff8` | *(dùng làm `--tk-surface-page` — xem TODO)* |
| Glass | `rgba(255,255,255,0.7)` + `blur(12px)` | — |
| Border Subtle | `#E2E8F0` | `--tk-border-subtle` |
| Shadow Card | `0 4px 20px rgba(0,0,0,.05)` | `--tk-shadow-card` |
| Card radius | `16px` | `--tk-radius-card` |
| Heading font | Montserrat 700 | — |
| Body font | Inter 400 | — |
| Base grid | 8px | — |
| Section padding | 80px vertical | — |
| Container max | 1280px | `.fixwidth` |

**Lưu ý:** `--tk-main` trỏ về `var(--color-main, #16b1a9)` — fallback màu teal nếu admin chưa set. **Phải vào admin Cài đặt → đặt "Màu chính" = `#001f3f`**, hoặc đổi fallback trong CSS.

### CSS Block Map (ước lượng vị trí)

| Block | Class prefix | Vị trí |
|-------|-------------|--------|
| Root vars | `--tk-*` | 6–29 |
| Topbar + Menu | `.tk-topbar`, `.tk-nav`, `.tk-menu` | 30–130 |
| Page banner | `.tk-pagebanner` | 132–140 |
| Product listing | `.tk-product-hero`, `.tk-product-row` | 142–310 |
| Product detail | `.tk-prodetail-*`, `.tk-pd-*` | 310–650 |
| Footer | `.tk-footer`, `.tk-foot-*` | 660–695 |
| Global sections | `.tk-sec`, `.tk-sec-title`, `.tk-btn` | 712–726 |
| `.tk-rv` entrance system | `.tk-rv`, `.tk-d1`–`.tk-d6` | ~4870–4935 |
| `prefers-reduced-motion` | `@media` | ~4912–4935 |
| Hero (mới) | `.tk-hero2`, `.tk-hex` | 755–870 |
| Apps Showcase | `.tk-apps`, `.tk-app-card` | 871–960 |
| Benefits + Why | `.tk-benefit2`, `.tk-stat2`, `.tk-why2` | 961–1170 |
| VMV (homepage) | `.tk-vmv2` | 1170–1345 |
| Form đăng ký | `.tk-register` | 1423–1510 |
| Hỗ trợ Zalo | `.tk-support` | 1407–1422 |
| Tính năng listing | `.tk-feature-list`, `.tk-feat` | 1947–2100 |
| Tính năng detail | `.tk-nd-*` | 2100–2270 |
| HDSD listing | `.tk-hdsd-*` | 2270–2500 |
| HDSD detail | `.tk-hd-*` | 2500–3000 |
| Tin tức listing | `.tknews-*` | 2800–3500 |
| Tin tức detail | `.tknews-detail-*` | 3500–4000 |
| Giới thiệu | `.tk-about`, `.tk-about-vmv` | 1776–1920 |
| Contact | `.tkct-*` | 4096–4960 |
| Case Study listing | `.tk-cs-*` | ~8750–8970 |
| Case Study detail | `.tk-csd-*` | 4969–5730 |
| Responsive | `@media` | nhiều vị trí |

---

## 8. KỸ THUẬT QUAN TRỌNG

### CKEditor
- Lưu dưới dạng HTML-encoded entities → **xuất cần `htmlspecialchars_decode()`**
- Plain text: `strip_tags(htmlspecialchars_decode())`
- Paste trong visual mode có thể strip custom div/class → **dùng "Mã HTML" (Source mode, nút đầu tiên top-left)**
- Empty `<i>` tags bị strip → thêm `&zwj;` bên trong để giữ Font Awesome icon

### jQuery / JavaScript
- jQuery load **cuối body** qua `js.php`
- Inline script trong template **KHÔNG được dùng** `$(document).ready()` → dùng `window.addEventListener('load', ...)` hoặc đặt script sau `js.php`
- HTML comment `<!-- -->` **KHÔNG chặn PHP execution** → dùng `<?php /* */ ?>` khi cần comment-out PHP code

### Upload Path Constants (đã verify)

| Constant | Path | Dùng cho |
|----------|------|---------|
| `UPLOAD_NEWS_L` | `upload/news/` | Ảnh news, HDSD, case study, gallery |
| `UPLOAD_PRODUCT_L` | `upload/product/` | Ảnh sản phẩm |
| `UPLOAD_PHOTO_L` | `upload/photo/` | Slider, đối tác, logo |
| `UPLOAD_SEOPAGE_L` | `upload/seopage/` | Banner trang (#_seopage) |
| `UPLOAD_FILE` | `../upload/file/` | File taptin (video .mp4 etc) — dùng `$config_base . 'upload/file/' . $taptin` |
| `THUMBS` | `thumbs/` | Thumbnail on-the-fly |

### Gallery System
- `kind='man'` cho tất cả manual gallery, phân biệt bằng `val`
- Query pattern: `WHERE com='news' AND type=? AND kind='man' AND val=? AND id_photo=?`
- `video_label` config: khi có, admin hiện label custom + ẩn YouTube preview

### Router
- `$requick` array → route mapping
- `switch($com)` → load template/source
- Static (`gioi-thieu`, `van-ban-phap-ly`) và photo (`slider`, `doi-tac`) được resolve bằng `$com` case, **loại khỏi requick**

### noibat flag
- `noibat > 0` — sản phẩm/bài viết phải tick "Nổi bật" trong admin mới hiện trên homepage/sections
- Slug uniqueness check trong admin JS là **cross-table** → dùng prefix `hdsd-` cho HDSD categories (tránh trùng với `#_product`)

### Product data patterns
- Section 6 mô tả = `motavi` item `chuc-nang` đầu tiên
- Section 11 mô tả = `motavi` item `loi-ich` đầu tiên
- Subtitle per-product = `masp` (cần ALTER varchar(255))
- `select_photo` dropdown lưu vào cột `link`, query filter `WHERE link=product_slug`

### `.tk-hex-inner` pattern
- Khi muốn hover translate phần tử clip-path mà không mất vùng hover, dùng outer wrapper giữ nguyên vị trí + inner để xử lý visual.
- Wrapper: vị trí cố định (left, top, transform base). Inner: clip-path + chứa img + hover transform. Wrapper đứng yên → hover zone không mất.

### Carousel + visibility pattern
- Slides `.tk-feat-slide` có `visibility:visible` cứng từ class state (`.active`, `.prev`, `.next`)
- Khi overlay đóng (bỏ class `.is-active`), phải thêm rule: `.overlay:not(.is-active) .slide { visibility:hidden !important; pointer-events:none !important }`
- Nếu bỏ rule này, slides vẫn bắt được chuột dù `opacity:0` (vô hình) → chặn hover hex cluster + click nút giữa

---

## 9. PHASE 7 — ✅ HOÀN THÀNH TOÀN BỘ

### 9.1 — Session 23/06/2026 — Hexagons + Homepage animations

**Hexagon cluster (slide.php + titkul.css):**
- Thêm `.tk-hex-inner` wrapper: clip-path + overflow lên inner, img dùng `position:absolute; inset:0; object-fit:cover`
- Tách wrapper (giữ vị trí hover cố định) vs inner (trượt vào giữa) → hết giật hover
- CSS hover: từng pos tính offset bù (pos1: +69,+118; pos3: -139,0...) để inner trượt về tâm cluster

**Hero carousel 3D coverflow (slide.php, index_tpl.php, titkul.css):**
- Click `.tk-hex--center` → ẩn `#tkHeroDefault`, hiện `.tk-feat-overlay.is-active`
- Carousel: `.tk-feat-slide` 3 trạng thái (active/prev/next), perspective coverflow, ticket-stub card
- Bug fix: `.tk-feat-overlay:not(.is-active) .tk-feat-slide { visibility:hidden!important }` — khi đóng carousel, slide vô hình vẫn chặn click

**Effect Map Homepage (index_tpl.php + titkul.css):**
- Hệ thống `.tk-rv` (entrance per-element): `--up`, `--left`, `--right`, `--scale`, `--line`
- Stagger delays `.tk-d1`…`.tk-d6` dùng CSS `transition-delay`
- `IntersectionObserver.unobserve()` sau khi reveal → entrance chỉ chạy 1 lần
- **Counter-up** cho `.tk-stat2-num[data-count]` — easeOutCubic 1200ms
- Ambient Hero: fade-up on-load, hex stagger, center hex float `tkFloating`, blob `tkBlobDrift` 9s
- `@media (prefers-reduced-motion)` bao phủ tất cả animations mới

### 9.2 — Session 23/06/2026 — Effect Map tất cả trang con

Đã áp dụng hệ thống `.tk-rv` + IntersectionObserver cho **toàn bộ 10 trang/nhánh**:

| Trang | File | Script pattern |
|-------|------|----------------|
| Tính năng listing | `news_tpl.php` | Observe `.tk-feat` rows trực tiếp (không dùng `tk-sec` vì `:nth-child` CSS) |
| Tính năng detail | `news_detail_tpl.php` | IIFE + `section.tk-sec` observer |
| HDSD listing | `news_tpl.php` | IIFE + `section.tk-sec` observer |
| HDSD detail | `news_detail_tpl.php` | IIFE + `section.tk-sec` observer + smooth-scroll anchor |
| Tin tức listing | `news_tpl.php` | IIFE + `section.tk-sec` observer |
| Tin tức detail | `news_detail_tpl.php` | IIFE + `section.tk-sec` observer |
| Case Study listing | `news_tpl.php` | Observe `section.tk-sec` + `.tk-cs-item` rows trực tiếp |
| Case Study detail | `news_detail_tpl.php` | IIFE + `section.tk-sec` + counter-up cho stats |
| Liên hệ | `contact_tpl.php` | IIFE + `section.tk-sec` (append sau AJAX script có sẵn) |
| Product listing | `product_tpl.php` | Observe `section.tk-sec` + `.tk-product-row` trực tiếp |

**CSS thêm mới vào titkul.css:**

| CSS block | Mô tả |
|-----------|-------|
| `.tk-feature-list .tk-feat { opacity:0; transform:translateX(-80px) }` | Entrance zigzag rows tinh-nang |
| `.tk-feature-list .tk-feat--flip` | Flip direction entrance |
| `.tk-nd-hero__glass { animation: tkFloating }` | Ambient float tính năng detail |
| `.tk-hd-phone__img { animation: tkFloating }` | Ambient float HDSD phone mockup |
| `.tknews-detail-hero__bg { opacity:0; transform:scale(1.06) }` | Tin tức detail hero cover entrance |
| `.tk-casestudy .tk-cs-item { opacity:0; transform:translateY(40px) }` | Entrance case study listing rows |
| `.tk-csd-quote__mark { animation: tkFloating }` | Ambient float quote mark |
| `.tk-csd-cta { animation: tkCsdCtaGradient 8s }` | Animated gradient CTA section |
| `.tk-product-hero { background: gradient... }` | Hero section product listing |
| `.tk-product-list .tk-product-row { opacity:0 }` | Entrance product rows |

### 9.3 — Product listing redesign (product_tpl.php)

**Trước:** 46 dòng, không có hero, background xanh lá (`#eaf6d8`) lạc tone design system.

**Sau (90 dòng):**
- Hero section mới: eyebrow + H1 accent + desc + 3 trust badges (Bảo mật / Cập nhật / Hỗ trợ 24/7)
- `.tk-product-row--alt` background đổi từ `#eaf6d8` → `#fff` (đúng design system)
- Button đổi từ outline → filled Navy, hover → Red + arrow slide phải
- Image hover: `scale(1.04) translateY(-4px)`
- Tên sản phẩm: `var(--tk-main)` teal → `var(--tk-navy)` Navy, hover → Red
- Split reveal: text `tk-rv--left/right`, image `tk-rv--right/left` tùy row thường/alt

### 9.4 — Breadcrumb logic (templates/index.php)

Ẩn breadcrumb banner mặc định cho các trang có hero section riêng:
- **Thêm mới:** product listing + case-study listing
- **Có sẵn trước:** index, static, contact, tin-tuc listing, huong-dan listing, tất cả detail pages

---

## 10. CÁC VẤN ĐỀ CÒN TỒN ĐỌNG

### 🔴 Nhóm 1 — Lỗi thật (ưu tiên cao)

**1.1 — Trang Giới thiệu: VMV section mất style**
- `static_tpl.php` Khối 4 dùng `.tk-vmv-row`, `.tk-vmv-text`, `.tk-vmv-img`, `.tk-vmv-label`, `.tk-vmv-h3`
- Các class này **không có CSS** trong `titkul.css` (chỉ có `.tk-vmv2-*` cho homepage)
- → Thêm CSS, HOẶC refactor sang `.tk-vmv2` layout

**1.2 — Xóa file rác**
- `templates/static/static_tpl copy.php` vẫn còn trong repo
- → Xóa đi

**1.3 — Menu thiếu link Case Study**
- `menu.php` không có item "Case Study"; footer cũng không
- → Thêm menu item + footer link

### 🟠 Nhóm 2 — Không đồng bộ style

**2.1 — Page banner title màu sai**
- `.tk-pagebanner-title` và `.tk-pagebanner-desc` dùng `color: var(--tk-main)` (teal)
- → Đổi sang `color: var(--tk-navy)`

**2.2 — `#e60000` không thuộc design system**
- `.tk-support-title`, `.tk-register-title`, `.tk-register-form .invalid-feedback`
- → Đổi `#e60000` → `var(--tk-red)`

**2.4 — Contact page có local vars riêng không cần thiết**
- `.tkct-page { --tkct-primary: #001f3f; --tkct-secondary: #bb0021; ... }` — duplicate với global `--tk-*`
- → *(Optional)* Thay `var(--tkct-*)` bằng `var(--tk-*)`, xóa local var block

**2.5 — `static_tpl.php` dùng `var(--color-main)` thay `var(--tk-main)`**
- → Đổi sang class CSS + `var(--tk-main)`

**2.6 — Duplicate CSS rules trong dropdown menu**
- `.tk-menu .menu_cap_con` block bị copy lặp 2 lần (dòng 74–94)
- → Xóa phần duplicate

**2.8 — `--tk-main` fallback màu teal**
- → Vào admin Cài đặt → đặt "Màu chính" = `#001f3f`, HOẶC đổi fallback trong CSS

### 🟡 Nhóm 3 — Improvement

**3.1 — Upgrade VMV block trang Giới thiệu**
- Refactor sang `.tk-vmv2` (glassmorphism, grid) để đồng bộ visual với homepage

**3.2 — Redesign `hotro_lienhe.php` cho premium hơn**
- Hiện là danh sách `<ul>` text thô — không khớp với premium design
- → 2 card (Hotline + Zalo) với icon FA, màu Navy/Red

**3.3 — Footer cột 1: dữ liệu hardcode**
- → Bỏ comment đoạn dynamic, xóa hardcode, tích hợp social icons

**3.4 — Footer thiếu links**
- Thiếu: Tin tức, Tính năng nổi bật, Case Study, Giới thiệu
- → Thêm 3–4 links

**3.5 — Breadcrumb dùng `<h1>` sai cho description**
- `breadcrumb.php`: `$mota_page` render bằng `<h1>` — 2 H1 trên 1 trang, hại SEO
- → Đổi thành `<p class="tk-pagebanner-desc">`

**3.7 — Inline styles trong `static_tpl.php` (van-ban-phap-ly)**
- Sidebar "Liên hệ tư vấn" dùng ~8 inline styles
- → Tạo class CSS `.tk-static-sidebar-box`

### ⚪ Nhóm 4 — Cleanup

**4.1 — File phone templates cũ không dùng**
- `templates/layout/`: `phione_mk.php`, `phone3.php`, `phone-vr.php`, `phone_sato.php`
- → Confirm không dùng, sau đó xóa hoặc archive

**4.2 — Thêm token `--tk-surface-page`**
- `#e8eff8` xuất hiện nhiều chỗ hardcode
- → Thêm `--tk-surface-page: #e8eff8` vào `:root`, thay thế hardcode

---

## 11. PHASE 8 — TIẾP THEO (SEO + Responsive)

- [ ] Meta tags per-page (`<title>`, `<meta description>`, og:image, og:title)
- [ ] `sitemap.xml` tự sinh (hoặc static nếu ít trang)
- [ ] Favicon (32×32, 192×192) + apple-touch-icon (180×180)
- [ ] `robots.txt` cập nhật (disallow /sota/, /ajax/, /upload/)
- [ ] Responsive test breakpoints 1024 / 768 / 480px — tất cả trang
- [ ] Alt text ảnh đầy đủ trên các template còn thiếu

## 12. PHASE 9 — DEPLOY

- [ ] Minify CSS/JS (tắt debug mode trong config)
- [ ] Lazy load images (`loading="lazy"` — đã có nhiều chỗ, check lại chỗ còn thiếu)
- [ ] Lighthouse audit (target: Performance ≥ 85, Accessibility ≥ 90)
- [ ] Deploy hosting + SSL + domain `titkul.vn`

---

## 13. HƯỚNG DẪN LÀM VIỆC

### Quy ước đầu session
1. Đọc lại CLAUDE.md mục "Tồn đọng" và "Phase tiếp theo"
2. **Fetch bản mới nhất từ GitHub** trước khi làm việc
3. Đọc file thật trước khi đưa code — **không bịa hàm/field không có**

### Cách đưa code
- Ưu tiên **targeted edits / surgical patches** hơn regenerate toàn bộ file
- Full file output chỉ khi tạo template/config mới hoàn toàn
- Làm **iteratively**: push → xem kết quả → duyệt → tiếp tục

### Kết thúc session
- Cập nhật `CLAUDE.md` trong repo (section 9, 10, 11)
