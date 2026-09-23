# Entity Relationship Diagram

```text
USERS (1) -------- (0..1) DOCTORS
  |                       |
  |                       +------< APPOINTMENTS >------ PATIENTS
  |                       |
  +------< NOTICES        +------< MEDICAL_RECORDS >---- PATIENTS
```

### Core entities
- users: identity, credentials and role
- doctors: specialization and professional details
- patients: demographic/contact information and assigned doctor
- appointments: patient + doctor + date/time + status
- medical_records: patient + doctor + diagnosis + treatment
- notices: announcement content, expiry and creator

### Important constraints
- Doctor email is unique through users.email.
- A doctor cannot have two appointments at the same date/time through a composite unique key.
- Foreign keys enforce relationships and cascading/set-null behavior.
