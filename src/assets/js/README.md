# JavaScript Modules Structure

## Overview
The JavaScript code is now organized into ES6 modules for better maintainability and organization.

## File Structure

```
assets/js/
├── modules/               # Individual feature modules
│   ├── carousel.js        # Embla Carousel initialization
│   ├── toolbox-slider.js  # Custom toolbox slider functionality
│   ├── isotope-filter.js  # Projects filtering with Isotope
│   ├── burger-menu.js     # Mobile menu toggle
│   ├── hover-effects.js   # Project card hover effects
│   ├── keyboard.js        # Keyboard accessibility support
│   └── gsap-scroll.js     # GSAP scroll effects & scroll-to-top button
├── main.js                # Main entry point (imports all modules)
└── scripts.js             # Legacy file (kept as backup)
```

## How It Works

1. **main.js** is the entry point that imports all modules
2. Each module exports its initialization function
3. WordPress loads main.js with `type="module"` attribute
4. All modules are initialized when DOM is ready

## Adding a New Module

1. Create a new file in `modules/` directory:
```javascript
// modules/my-feature.js
export function initMyFeature() {
    // Your code here
}
```

2. Import it in `main.js`:
```javascript
import { initMyFeature } from './modules/my-feature.js';

document.addEventListener('DOMContentLoaded', () => {
    initMyFeature();
});
```

## Important Notes

- **Module syntax**: Use `export` and `import` statements
- **Global functions**: If you need functions accessible in HTML (like `onclick`), add them to `window` object:
  ```javascript
  window.myFunction = myFunction;
  ```
- **jQuery modules**: jQuery-dependent modules are initialized separately when jQuery is ready
- **File paths**: Import paths are relative (e.g., `./modules/carousel.js`)

## Benefits

- **Separation of concerns**: Each feature has its own file
- **Maintainability**: Easy to find and update specific functionality
- **Performance**: Browser can cache modules separately
- **Debugging**: Easier to identify which module has issues
- **Scalability**: Simple to add new features without cluttering one file
