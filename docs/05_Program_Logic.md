# Program Logic

## Patient Registration
```text
START
  ↓
Display registration form
  ↓
Receive patient data
  ↓
Validate required fields
  ├─ No → show validation error → END
  ↓ Yes
Validate/normalize data
  ↓
Insert into patients using prepared statement
  ↓
Save success message
  ↓
Redirect to patient list
  ↓
END
```

## Appointment Scheduling
```text
START
  ↓
Select patient + doctor + date + time
  ↓
Validate required values
  ├─ No → error → END
  ↓ Yes
Check doctor/date/time slot
  ├─ Already booked → error → END
  ↓ Available
Insert appointment
  ↓
Confirm scheduled appointment
  ↓
END
```
