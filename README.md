# Car Rent Management System

A modern car rental management platform built with Laravel, Bootstrap, Stripe, Filament, and Laravel Telescope. This system provides complete CRUD functionality for cars, a robust financial module for managing rental transactions, secure online payments via Stripe, and a responsive, user-friendly interface. The admin dashboard is powered by Laravel Filament, while Laravel Telescope is used for debugging and performance monitoring.

## 🚗 Features

- Full CRUD operations for car listings
- Rental transaction management
- Stripe integration for secure online payments
- Modern admin dashboard with Laravel Filament
- Debugging and monitoring with Laravel Telescope
- Responsive frontend using Bootstrap

## 🛠️ Tech Stack

- **Backend:** Laravel
- **Frontend:** Bootstrap, Blade
- **Admin Panel:** Laravel Filament
- **Payments:** Stripe
- **Monitoring:** Laravel Telescope

## ⚙️ Installation

### Prerequisites

- PHP 8.1+
- Composer
- Node.js & npm
- MySQL or compatible database
- Git

### Setup Steps

1. **Clone the Repository**
    ```
    git clone https://github.com/ashenbotheju/car-rent-management-system.git
    cd car-rent-management-system
    ```

2. **Install PHP Dependencies**
    ```
    composer install
    ```

3. **Install Node Dependencies**
    ```
    npm install
    ```

4. **Copy and Configure Environment File**
    ```
    cp .env.example .env
    ```
    - Update `.env` with your database, mail, and Stripe credentials.

5. **Generate Application Key**
    ```
    php artisan key:generate
    ```

6. **Run Migrations and Seeders**
    ```
    php artisan migrate --seed
    ```

7. **Link Storage**
    ```
    php artisan storage:link
    ```

8. **Build Frontend Assets**
    ```
    npm run build
    ```

9. **Start the Development Server**
    ```
    php artisan serve
    ```

10. **Access the Application**
    - Visit: [http://localhost:8000](http://localhost:8000)

## 💳 Stripe Integration

- Set your Stripe API keys in the `.env` file:
    ```
    STRIPE_KEY=your_stripe_public_key
    STRIPE_SECRET=your_stripe_secret_key
    ```
- The platform supports secure online payments for car rentals.

## 🛡️ Admin Dashboard

- Access the admin panel via Filament at `/admin`.
- Manage cars, rentals, users, and view financial reports.

## 🔎 Debugging & Monitoring

- Laravel Telescope is enabled for debugging and performance monitoring.
- Access Telescope at `/telescope` (ensure you are authorized).

## 📱 Responsive Design

- The UI is built with Bootstrap for optimal experience on all devices.

## 🙋 Support

For issues, please open an issue in the repository.

---

**Project Link:** [github.com/ashenbotheju/car-rent-management-system](https://github.com/ashenbotheju/car-rent-management-system)