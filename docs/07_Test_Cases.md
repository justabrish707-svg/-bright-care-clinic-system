# Test Cases

| ID | Test | Expected result | Actual result (Tested) | Status |
|---|---|---|---|---|
| TC-01 | Correct admin login | Redirect to admin dashboard | Redirected successfully | ✅ Pass |
| TC-02 | Wrong password | Error message; no session | Validation error shown | ✅ Pass |
| TC-03 | Doctor opens admin-only route | HTTP 403 / Redirect | Redirected to login with error | ✅ Pass |
| TC-04 | Register patient with required fields | Patient saved and appears in list | Patient saved to DB | ✅ Pass |
| TC-05 | Register patient without phone | Validation error | Form validation prevented save | ✅ Pass |
| TC-06 | Schedule free appointment slot | Appointment saved | Appointment visible in table | ✅ Pass |
| TC-07 | Schedule same doctor/date/time twice | Database rejects duplicate slot | Rejected constraint | ✅ Pass |
| TC-08 | Doctor records diagnosis/treatment | Medical record saved | Record created successfully | ✅ Pass |
| TC-09 | Expired notice | Not displayed in active notice list | Notice automatically hidden | ✅ Pass |
| TC-10 | Logout | Session destroyed and Login displayed | Redirected to login.php | ✅ Pass |
