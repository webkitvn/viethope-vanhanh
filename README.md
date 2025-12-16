# Van Hanh WordPress Theme

## Build System

Theme này sử dụng Sass CLI để compile SCSS files từ `./scss` sang `./css`.

### Cài đặt

```bash
# Cài đặt Sass CLI (nếu chưa có)
npm install -g sass
```

### Sử dụng

```bash
# Development build (với sourcemap)
./build.sh dev

# Production build (minified)
./build.sh build

# Watch mode (tự động rebuild khi có thay đổi)
./build.sh watch

# Clean build artifacts
./build.sh clean
```

### Cấu trúc SCSS

- `scss/custom.scss` - File chính import tất cả modules
- `scss/_*.scss` - Các module SCSS
- `scss/bootstrap/` - Bootstrap framework
- `css/custom.css` - File CSS đã compile

### Design tokens (CSS custom properties)

Theme sử dụng CSS custom properties (design tokens) được define trong `scss/_variables.scss` (output ra `:root { ... }` trong `css/custom.css`). Khi cần dùng trong SCSS/CSS, hãy ưu tiên `var(--...)` thay vì tạo `$` variables mới.

- **Primary palette**
  - `--vh-global-color-palette-1` (legacy: `$lightBlue`)
  - `--vh-global-color-palette-2` (legacy: `$darkBlue`)
- **Neutral**
  - `--vh-color-gray` (legacy: `$gray`)
- **Typography**
  - `--vh-font-sans` (legacy: `$san-serif`)
- **Radius**
  - `--vh-radius-base` (legacy: `$br`)
- **Derived palette (preserve legacy Sass darken())**
  - `--vh-global-color-palette-2-darken-5`
  - `--vh-global-color-palette-2-darken-10`
  - `--vh-global-color-palette-1-darken-5`
  - `--vh-global-color-palette-1-darken-10`

### Workflow

1. **Development**: Chạy `pnpm run watch` để tự động compile khi edit SCSS
2. **Production**: Chạy `pnpm run build` để tạo file CSS minified
3. **Testing**: Chạy `pnpm run dev` để build với sourcemap cho debugging
