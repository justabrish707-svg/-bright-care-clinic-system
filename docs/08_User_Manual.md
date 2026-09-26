# Bright Care Clinic Management System — User Manual

## 1. Introduction
The Bright Care Clinic Management System replaces manual clinic workflows with a web-based system for authorized administrators and doctors.

## 2. Requirements & Installation
Run the system on a computer with XAMPP (Apache, PHP and MySQL/MariaDB), a modern browser and at least 4 GB RAM.

**Option A: XAMPP Deployment**
1. Copy the `app/` folder contents and `config.php` to your `htdocs` folder.
2. Start Apache and MySQL in XAMPP.
3. Access via `http://localhost/login.php`.

**Option B: PHP Built-in Server (Development)**
1. Start MySQL in XAMPP.
2. Open your terminal in the `app/` directory.
3. Run `php -S localhost:8000`.
4. Access via `http://localhost:8000/login.php`.

## 3. Administrator Dashboard
Administrators can:
- Manage doctors
- Register/view patients
- Schedule/view appointments
- Publish and delete notices
- View operational statistics

## 4. Doctor Dashboard
Doctors can:
- View assigned patients
- View their appointments
- Record diagnosis and treatment
- View medical records
- Publish notices

## 5. Login
Open `http://localhost/bright-care/login.php` and enter the assigned credentials. Never share passwords.

## 6. Patient registration
Open Patients → complete required fields → Register Patient. Verify the patient appears in the patient list.

## 7. Appointment scheduling
Open Appointments → select patient and doctor → choose date/time → Schedule. The database prevents duplicate doctor time slots.

## 8. Medical records
Doctors open Medical Records → select patient → enter diagnosis and treatment → Save Record.

## 9. Notices
Open Notices → enter title/content → optionally add expiry → Publish Notice.

## 10. Technical support
For assessment deployment issues, check that Apache/MySQL are running, database `bright_care_clinic` exists, and `app/config.php` matches the local database credentials.
