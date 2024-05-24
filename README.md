# Plant E-commerce Website

This is a Laravel application for an e-commerce website that sells plants and plant-related products. It provides an admin panel for managing products and a front-end for displaying and purchasing products.

## Features

- **Product Management**: Administrators can create, edit, and delete products through an intuitive admin panel.
- **Product Listing**: The website displays a grid of product cards with images, names, descriptions, and prices.
- **Product Details**: Users can view detailed information about each product, including its description, price, and color.
- **Profit Margin Calculation**: The application calculates the final price for products based on a configurable profit margin percentage.
- **Authentication and Authorization**: The application includes an authentication system and likely has different user roles or permissions for managing products.
- **Roles and Permissions**: The application has a role-based access control system for managing employees. Administrators can assign roles and permissions to employees, allowing them to perform specific actions within the application.

## Technologies Used

- Laravel (PHP web framework)
- Blade (Laravel's templating engine)
- Tailwind CSS (utility-first CSS framework)
- MySQL (or any other database supported by Laravel)
- Laravel Eloquent ORM (for interacting with the database)
- Spatie Laravel Permission (for managing roles and permissions)

## Installation

1. Clone the repository:

```bash
git clone https://github.com/PS213073/project-5.git 
```
2. Install the dependencies:
```bash
cd plant-ecommerce
composer install
npm install
```
3. Configure the environment variables:
```bash
cp .env.example .env
```
4. Update the .env file with your database credentials and other necessary configurations.

5. Generate the application key:
```bash
php artisan key:generate
```
6. Run the database migrations:
```bash
php artisan migrate
```
7. Compile the front-end assets:
```bash
npm run dev
```
8. Start the development server:
```bash
php artisan serve
```
9. The application should now be accessible at http://localhost:8000.
