
A fully functional Ecommerce Web Application built with PHP Laravel framework.
This project covers the core features of an online shop including product listing, cart system, checkout, and order management.

🚀 Features

✅ User Authentication (Register / Login)

✅ Product Management (CRUD operations for Admin)

✅ Category & Subcategory Management

✅ Shopping Cart System

✅ Add to Cart, Update, Remove Items

✅ Checkout with Billing Information

✅ Order Placement & Order History

✅ Admin Dashboard for managing products, users, and orders

✅ Responsive UI with Bootstrap

✅ Secure Payment Integration (Stripe/PayPal if added)

🛠️ Tech Stack

Backend: Laravel (PHP)

Frontend: Blade Templates, Bootstrap, JavaScript

Database: MySQL

Authentication: Laravel Jetstream

Payment Gateway: Stripe

## ⚙️ Installation

```bash
# Clone the repo
git clone https://github.com/your-username/your-repo-name.git

# Enter project folder
cd your-repo-name

# Install PHP dependencies
composer install

# Install Node dependencies
npm install && npm run dev

# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate

# Run migrations
php artisan migrate

# Serve the application
php artisan serve
