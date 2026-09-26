# Bright Care Clinic Management System

A PHP + MySQL clinic management system built to satisfy the Addis Ababa Labor and Skill Bureau Web Development and Database Administration Level IV Candidate's Package (May 2026).

## Stack
- PHP 8.x
- MySQL/MariaDB
- Apache (XAMPP)
- HTML5, CSS3, JavaScript
- PDO with prepared statements
- Session-based authentication and role-based authorization

## Modules
- Administrator: dashboard, doctors, patients, appointments, notices
- Doctor: dashboard, patients, appointments, medical records, notices
- Secure login/logout
- Responsive UI
- Validation and useful HTTP status codes
- Relational database with foreign keys, indexes and constraints

## Installation

### Option A: XAMPP deployment (Standard)
1. Install XAMPP and start Apache + MySQL.
2. Copy the contents of the `app` folder (and `.env`) to `C:\xampp\htdocs\bright-care`.
3. Open phpMyAdmin and import `database/bright_care.sql`.
4. Open `http://localhost/bright-care/login.php`.

### Option B: PHP Built-in Server (Development)
1. Start MySQL in XAMPP.
2. Open phpMyAdmin and import `database/bright_care.sql`.
3. Open your terminal in the `app/` folder.
4. Run `php -S localhost:8000`.
5. Open `http://localhost:8000/login.php`.
5. Demo accounts:
   - Admin: `admin@brightcare.local` / `Admin@123`
   - Doctor: `doctor@brightcare.local` / `Doctor@123`

## Important
Change demo passwords before any real deployment. This project is an educational assessment system and does not replace production-grade clinical/security review.
