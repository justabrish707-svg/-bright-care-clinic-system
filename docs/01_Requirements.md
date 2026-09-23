# Requirements Specification

## Functional requirements
1. Administrator and Doctor authentication.
2. Role-based authorization.
3. Administrator manages doctors, patients, appointments and notices.
4. Doctor manages/view assigned patients, appointments, medical records and notices.
5. Patient registration, retrieval and update.
6. Appointment scheduling with doctor/date/time availability enforcement.
7. Diagnosis and treatment recording.
8. Notice creation with expiry date.
9. Dashboard statistics.
10. Logout/session termination.

## Non-functional requirements
- Responsive on desktop, tablet and mobile.
- Secure password hashing and prepared SQL statements.
- Server-side validation and CSRF protection.
- Usable navigation with consistent layout.
- Referential database integrity.
- Maintainable modular PHP structure.
- Appropriate HTTP status responses for authorization and CSRF failures.
- Local XAMPP deployment.

## Hardware
- Dual-core CPU or better
- 4 GB RAM minimum; 8 GB recommended
- 2 GB free storage for application/database
- Keyboard, mouse and display
- LAN/Internet optional for local operation

## Software
- XAMPP with Apache, PHP and MySQL/MariaDB
- VS Code or equivalent editor
- Modern browser
- phpMyAdmin
