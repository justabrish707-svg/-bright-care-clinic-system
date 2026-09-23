# Bright Care Clinic Management System — User Manual

## 1. Introduction
The Bright Care Clinic Management System replaces manual clinic workflows with a web-based system for authorized administrators and doctors.

## 2. Requirements
Run the system on a computer with XAMPP (Apache, PHP and MySQL/MariaDB), a modern browser and at least 4 GB RAM.

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
