# Project Setup Guide

This guide will walk you through the steps to set up and run the project.

## 1. Prerequisites

Before you begin, ensure you have the following software installed on your system:

*   **PHP**: Version 8.0 or higher.
*   **Composer**: For managing PHP dependencies.
*   **Node.js & npm**: For managing JavaScript dependencies.
*   **MySQL / MariaDB**: A database server.
*   **Git**: (Optional, if you're not cloning from a repository) For version control.

## 2. Project Setup

1.  **Copy Project Files**:
    Copy all project files from the flash drive to your desired directory (e.g., `C:\xampp\htdocs\ud-kurnia`).

2.  **Install PHP Dependencies**:
    Navigate to the project root directory in your terminal and run:
    ```bash
    composer install
    ```

3.  **Install Node.js Dependencies**:
    In the project root directory, run:
    ```bash
    npm install
    ```
    Then, compile assets:
    ```bash
    npm run dev
    ```

4.  **Environment Configuration**:
    *   Copy the `.env.example` file to `.env`:
        ```bash
        cp .env.example .env
        ```
    *   Open the newly created `.env` file and configure your database connection:
        ```
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=your_database_name # e.g., ud_kurnia
        DB_USERNAME=your_db_username   # e.g., root
        DB_PASSWORD=your_db_password   # e.g., (empty for root)
        ```
        Replace `your_database_name`, `your_db_username`, and `your_db_password` with your actual database credentials.

5.  **Generate Application Key**:
    In the project root directory, run:
    ```bash
    php artisan key:generate
    ```

6.  **Link Storage**:
    Create a symbolic link for storage:
    ```bash
    php artisan storage:link
    ```

## 3. Database Setup

1.  **Create a New Database**:
    Using your preferred database management tool (e.g., phpMyAdmin, MySQL Workbench, or the MySQL command line), create a new empty database. Make sure the database name matches the `DB_DATABASE` value in your `.env` file.

2.  **Import SQL Database**:
    Import the provided `.sql` file (e.g., `database.sql`) into the newly created database. You can typically do this through your database management tool's import function.

## 4. Running the Application

1.  **Start the Development Server**:
    In the project root directory, run:
    ```bash
    php artisan serve
    ```
    This will usually start the server at `http://127.0.0.1:8000`.

2.  **Access the Application**:
    Open your web browser and navigate to the address provided by `php artisan serve` (e.g., `http://127.0.0.1:8000`).

---
**Note**: If you encounter any issues, please refer to the Laravel documentation or seek assistance from your project maintainer.
