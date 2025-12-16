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
    *)
        echo "Usage: ./build.sh [dev|build|watch|clean]"
        echo ""
        echo "Commands:"
        echo "  dev, development  - Build with sourcemap (development)"
        echo "  build, production - Build minified (production)"
        echo "  watch            - Watch for changes and auto-rebuild"
        echo "  clean            - Remove build artifacts"
        exit 1
        ;;
esac
