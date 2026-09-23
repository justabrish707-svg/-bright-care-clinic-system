# Site Map & Navigation

```text
Login
├── Administrator Dashboard
│   ├── Doctors
│   ├── Patients
│   ├── Appointments
│   └── Notices
└── Doctor Dashboard
    ├── Patients
    ├── Appointments
    ├── Medical Records
    └── Notices
```

## Navigation rules
- Unauthenticated users can only access Login.
- Administrator dashboard exposes all administration modules.
- Doctor dashboard exposes clinical modules and assigned patient data.
- Unauthorized routes return HTTP 403.
- Logout destroys the session and returns to Login.
