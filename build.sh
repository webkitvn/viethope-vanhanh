#!/bin/bash

# Van Hanh Theme SCSS Build Script

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Function to print colored output
print_status() {
    echo -e "${GREEN}[INFO]${NC} $1"
}

print_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

print_warning() {
    echo -e "${YELLOW}[WARNING]${NC} $1"
}

# Check if sass is installed
if ! command -v sass &> /dev/null; then
    print_error "Sass is not installed. Please install it first:"
    echo "npm install -g sass"
    exit 1
fi

# Get command from argument
COMMAND=${1:-"build"}

case $COMMAND in
    "dev"|"development")
        print_status "Building SCSS in development mode (with sourcemap)..."
        sass scss/custom.scss:css/custom.css --style=expanded --source-map
        print_status "Development build completed!"
        ;;
    "build"|"production")
        print_status "Building SCSS in production mode (minified)..."
        sass scss/custom.scss:css/custom.css --style=compressed
        rm -f css/custom.css.map
        print_status "Production build completed!"
        ;;
    "watch")
        print_status "Starting watch mode..."
        print_warning "Press Ctrl+C to stop watching"
        sass scss/custom.scss:css/custom.css --style=expanded --source-map --watch
        ;;
    "clean")
        print_status "Cleaning build artifacts..."
        rm -f css/custom.css css/custom.css.map
        print_status "Clean completed!"
        ;;
    "zip")
        THEME_SLUG="vanhanh"
        ZIP_FILE="${THEME_SLUG}.zip"
        TEMP_DIR=$(mktemp -d)
        DEST="${TEMP_DIR}/${THEME_SLUG}"

        # Build production CSS first
        print_status "Building production CSS..."
        sass scss/custom.scss:css/custom.css --style=compressed
        rm -f css/custom.css.map

        print_status "Creating theme zip: ${ZIP_FILE}..."
        mkdir -p "$DEST"

        # Copy theme files
        cp -R css fonts img js inc templates "$DEST/"
        cp style.css functions.php header.php footer.php index.php page.php \
           single.php search.php category.php 404.php "$DEST/"

        # Copy archive/single/taxonomy templates
        for f in archive-*.php single-*.php taxonomy-*.php; do
            [ -f "$f" ] && cp "$f" "$DEST/"
        done

        # Copy screenshot if exists
        [ -f screenshot.png ] && cp screenshot.png "$DEST/"

        # Create zip
        rm -f "$ZIP_FILE"
        (cd "$TEMP_DIR" && zip -rq "${OLDPWD}/${ZIP_FILE}" "$THEME_SLUG")

        # Cleanup
        rm -rf "$TEMP_DIR"

        print_status "Created ${ZIP_FILE} ($(du -h "$ZIP_FILE" | cut -f1))"
        ;;
    *)
        echo "Usage: ./build.sh [dev|build|watch|clean|zip]"
        echo ""
        echo "Commands:"
        echo "  dev, development  - Build with sourcemap (development)"
        echo "  build, production - Build minified (production)"
        echo "  watch            - Watch for changes and auto-rebuild"
        echo "  clean            - Remove build artifacts"
        echo "  zip              - Build production and create installable theme zip"
        exit 1
        ;;
esac
