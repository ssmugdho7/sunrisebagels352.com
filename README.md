# Sunrise Bagels & Deli - PHP Website Package

## What is included
- Responsive franchise-style public website: Home, Menu, Catering, Our Story, Visit/Contact.
- Black + sunrise-gold brand system based on the provided storefront image.
- Breakfast and lunch menus stored in `data/menu.json` and rendered dynamically on the website.
- Modular website library: `library/header.php`, `footer.php`, `banner.php`, `offers.php`, `menu-section.php`.
- Password-protected `owner/` dashboard to edit menu items, descriptions, prices, hours, promotions, links and business details.
- Contact/catering inquiry collection with owner-side review.
- Server-side OpenAI AI Concierge using the Responses API.

## Owner login
Open: `/owner/`

Initial password: `352`

The password is stored as a one-way hash in `config/owner.php`, not as plain text. Use Owner > Password to replace it before public launch.

## OpenAI API key
Open `config/openai.php` and replace:

```php
'api_key' => "Harold Cabrera",
```

with your real OpenAI API key. Keep the key server-side. Do not place it in JavaScript.

## Install
1. Upload the complete folder contents into your PHP hosting web root or a subfolder.
2. PHP 8.1+ with cURL is recommended.
3. Make sure the web server can write to `data/menu.json`, `data/settings.json`, and `data/inquiries.csv` (when created).
4. Make sure `config/owner.php` is writable if you want the owner to change the password from the dashboard.
5. Apache users should keep the included `.htaccess` files to block direct access to config/data files.
6. In Owner > Website Settings, enter the real phone, address, hours, map link, social links and online-ordering URL.
7. In Owner > Menu & Prices, replace the temporary `$0.00` placeholders with final prices.

## Folder architecture
- `/library/` reusable header, footer, banner, offer and menu components
- `/data/` owner-editable JSON data and inquiry CSV
- `/owner/` secure content-management area
- `/api/` server-side AI endpoint
- `/assets/` CSS, JS and provided storefront image
- `/config/` application, password and AI configuration

## Security notes
- Password `352` is intentionally configured because it was requested for setup, but it is too weak for a production admin account. Change it before launch.
- The OpenAI key is only read from PHP server-side configuration.
- Add HTTPS on the live domain.
- On Nginx hosting, duplicate the `.htaccess` protections in the Nginx server configuration because Nginx ignores `.htaccess` files.
