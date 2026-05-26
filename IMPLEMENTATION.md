# Tailwind CSS v4 + Alpine + SweetAlert2 Implementation Plan

## Goal

Migrate the current site CSS/JS pipeline to Tailwind CSS v4.x.x while preserving the existing visual style exactly. Use Alpine.js for responsive behavior and UI animation interactions. Use SweetAlert2 for notification dialogs and alerts.

This implementation should:
- keep the current visual styling and component layout unchanged
- translate the current `boxicon` and custom CSS design into Tailwind utility-based CSS
- use Alpine.js for interactive UI behavior instead of hand-written DOM scripts
- use SweetAlert2 for notification alerts
- keep the existing site and admin experience intact while migrating the build pipeline

## Current State

Relevant files:
- `package.json`
- `tailwind.config.cjs`
- `postcss.config.cjs`
- `resources/css/app.css`
- `resources/css/admin.css`
- `resources/js/app.js`
- `resources/js/admin.js`
- `resources/views/layouts/dashboard.blade.php`

Current status:
- Tailwind v4 is installed in `package.json`
- `resources/css/app.css` already contains Tailwind directives and custom `@apply` styles
- `resources/views/layouts/dashboard.blade.php` loads `resources/css/app.css` and, for admin, `resources/css/admin.css` and `resources/js/admin.js`
- app JS currently imports `./bootstrap` only

## Implementation Plan

### 1. Clean up Tailwind build setup
- Ensure `package.json` dependencies are correct for Tailwind v4, Alpine v3, SweetAlert2, and Vite
- Keep `@tailwindcss/postcss` and `autoprefixer` in PostCSS config
- Ensure `tailwind.config.cjs` content paths cover Blade, JS, and CSS files

### 2. Recreate CSS as Tailwind utilities
- Replace the current CSS in `resources/css/app.css` with Tailwind-compatible definitions only
- Use `@import 'tailwindcss';` or `@tailwind` directives correctly
- Avoid importing `public/css/style.css` or any legacy site CSS
- Recreate layout styles, buttons, headers, hero, forms, cards, and animations using Tailwind classes and `@apply`
- Keep color values, spacing, typography, and layout matching the original style

### 3. Update admin styles
- Keep `resources/css/admin.css` as a Tailwind stylesheet for admin-specific dashboard styling
- Ensure the admin layout uses Tailwind utilities and no legacy CSS dependencies

### 4. Replace DOM scripting with Alpine.js
- Create or update `resources/js/app.js` and `resources/js/admin.js` to initialize Alpine
- Move interactive logic from the dashboard layout into Alpine components where appropriate
- Use data attributes for responsive menus, dropdowns, and animations
- Keep existing behavior for sidebar toggle, profile dropdown, and flash close actions

### 5. Add SweetAlert2 for notifications
- Install `sweetalert2`
- Integrate SweetAlert2 in JS for flash messages / notifications
- Keep existing server-side flash storage; use JS to display alerts on page load

### 6. Preserve current layout and functionality
- Do not change the component structure or route behavior
- Keep `boxicons` loaded for icons if they are still used in templates
- Apply Tailwind styling and Alpine behavior while preserving the same appearance

## File Changes

Likely touched files:
- `package.json`
- `tailwind.config.cjs`
- `postcss.config.cjs`
- `resources/css/app.css`
- `resources/css/admin.css`
- `resources/js/app.js`
- `resources/js/admin.js`
- `resources/views/layouts/dashboard.blade.php`
- optionally `resources/views/components/*.blade.php` for Alpine wiring

## Verification

After implementation, verify:
- `npm install` succeeds
- `npm run build` succeeds
- `php artisan serve` + Vite dev works if needed
- UI appearance matches existing style
- admin responsive behavior works with Alpine
- SweetAlert2 notifications appear for errors/success messages

## Notes

- Implementation should not introduce new visual styles beyond the existing site theme.
- If there are any fallback style files, they should remain untouched until the new Tailwind pipeline is verified.
- This document is the agreed plan before applying code changes.
