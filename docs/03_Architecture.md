# Architectural Design

```text
+---------------------------+
| Client / Browser          |
| HTML5 + CSS3 + Forms      |
+-------------+-------------+
              | HTTP
              v
+---------------------------+
| Apache / XAMPP            |
| PHP application           |
| Auth + RBAC + Validation  |
| PDO + Prepared Statements |
+-------------+-------------+
              | SQL
              v
+---------------------------+
| MySQL / MariaDB           |
| Users, Doctors, Patients  |
| Appointments, Records,    |
| Notices                   |
+---------------------------+
```

## Security boundary
Authentication is session-based. Authorization is enforced server-side. Database writes use PDO prepared statements. Passwords are stored with `password_hash()`. Forms use CSRF tokens.
