# StudentCarCatalog

**Simple PHP car catalog for beginners with login, filtering, and clean CSS.**

---

## Project Description

This is a simple project for first-year web development students. It demonstrates basic PHP skills: user login, car catalog browsing, filtering by brand/country/category, and viewing car details. All data is stored in PHP arrays, and the interface is styled with clean, minimal CSS.

## Features
- User authentication (login/logout)
- Car catalog with filters (brand, country, category)
- Detailed car information page
- Session management
- Simple and clean CSS, easy to understand and modify
- No database required (all data in PHP arrays)

## Requirements
- PHP 7.x or newer
- XAMPP or any local PHP server
- Modern web browser

## Setup & Usage
1. Copy the `taskk` folder into your XAMPP `htdocs` directory.
2. Make sure all car images are in the `image` folder and named according to the car `id` (`1.jpg`, `2.jpg`, etc).
3. Start Apache using XAMPP.
4. Open your browser and go to [http://localhost/taskk/](http://localhost/taskk/)

## Test Users
| Username | Password | Name  |
|----------|----------|-------|
| bake17   | qwerty   | Bake  |
| sake17   | qwerty   | Sake  |
| make17   | qwerty   | Make  |
| ereke17  | qwerty   | Ereke |
| beka17   | qwerty   | Beka  |

## File Structure
- `index.php` — main page, filters, car catalog
- `car.php` — single car details
- `login.php` — login form
- `logout.php` — logout script
- `users.php` — user array
- `cars.php` — car array
- `image/` — car images (`1.jpg`, `2.jpg`, ...)
- `assets/css/style.css` — project styles

## Usage Tips
- To add a new car: add an entry to the `$arr` array in `cars.php`.
- To add a new user: add an entry to the `$users` array in `users.php`.
- Car images must be in JPG format and named after the car `id` (`1.jpg`, `2.jpg`, ...).


---

## License
This project was created for educational purposes. You are free to use, modify, and share it with attribution.

---

**Good luck with your studies and development!**

---

_This project was originally developed as a university assignment._
