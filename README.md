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

### Workflow

1. **Development**: Chạy `pnpm run watch` để tự động compile khi edit SCSS
2. **Production**: Chạy `pnpm run build` để tạo file CSS minified
3. **Testing**: Chạy `pnpm run dev` để build với sourcemap cho debugging
