# Test Cases

| ID | Test | Expected result |
|---|---|---|
| TC-01 | Correct admin login | Redirect to admin dashboard |
| TC-02 | Wrong password | Error message; no session |
| TC-03 | Doctor opens admin-only route | HTTP 403 |
| TC-04 | Register patient with required fields | Patient saved and appears in list |
| TC-05 | Register patient without phone | Validation error |
| TC-06 | Schedule free appointment slot | Appointment saved |
| TC-07 | Schedule same doctor/date/time twice | Database rejects duplicate slot |
| TC-08 | Doctor records diagnosis/treatment | Medical record saved |
| TC-09 | Expired notice | Not displayed in active notice list |
| TC-10 | Logout | Session destroyed and Login displayed |
