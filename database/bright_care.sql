CREATE DATABASE IF NOT EXISTS bright_care_clinic
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE bright_care_clinic;

CREATE TABLE users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(120) NOT NULL,
  email VARCHAR(190) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('admin','doctor') NOT NULL,
  phone VARCHAR(30),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE doctors (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NOT NULL UNIQUE,
  gender ENUM('Male','Female','Other') NOT NULL,
  phone VARCHAR(30) NOT NULL,
  specialization VARCHAR(100) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_doctor_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE patients (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  doctor_id INT UNSIGNED NULL,
  full_name VARCHAR(120) NOT NULL,
  gender ENUM('Male','Female','Other') NOT NULL,
  date_of_birth DATE NULL,
  phone VARCHAR(30) NOT NULL,
  address VARCHAR(255),
  emergency_contact VARCHAR(120),
  emergency_phone VARCHAR(30),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_patient_doctor FOREIGN KEY (doctor_id) REFERENCES doctors(id) ON DELETE SET NULL,
  INDEX idx_patient_name (full_name),
  INDEX idx_patient_phone (phone)
) ENGINE=InnoDB;

CREATE TABLE appointments (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  patient_id INT UNSIGNED NOT NULL,
  doctor_id INT UNSIGNED NOT NULL,
  appointment_date DATE NOT NULL,
  appointment_time TIME NOT NULL,
  reason VARCHAR(255),
  status ENUM('Scheduled','Completed','Cancelled') NOT NULL DEFAULT 'Scheduled',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_appt_patient FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
  CONSTRAINT fk_appt_doctor FOREIGN KEY (doctor_id) REFERENCES doctors(id) ON DELETE CASCADE,
  UNIQUE KEY uq_doctor_slot (doctor_id, appointment_date, appointment_time),
  INDEX idx_appt_date (appointment_date)
) ENGINE=InnoDB;

CREATE TABLE medical_records (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  patient_id INT UNSIGNED NOT NULL,
  doctor_id INT UNSIGNED NOT NULL,
  diagnosis TEXT NOT NULL,
  treatment TEXT NOT NULL,
  notes TEXT,
  recorded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_record_patient FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
  CONSTRAINT fk_record_doctor FOREIGN KEY (doctor_id) REFERENCES doctors(id) ON DELETE CASCADE,
  INDEX idx_record_patient (patient_id)
) ENGINE=InnoDB;

CREATE TABLE notices (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(180) NOT NULL,
  content TEXT NOT NULL,
  expiry_date DATE NULL,
  created_by INT UNSIGNED NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_notice_user FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE CASCADE,
  INDEX idx_notice_expiry (expiry_date)
) ENGINE=InnoDB;

-- Demo users. Password hashes are generated for the documented demo passwords.
INSERT INTO users (full_name,email,password_hash,role,phone) VALUES
('System Administrator','admin@brightcare.local','$2y$10$5QpW8l6XkGm2mJ0a9vZq1u1Q0YlH3Y7V0Yq9z4F7h6JmP5gT8sX2a','admin','0911000000'),
('Dr. Samuel Bekele','doctor@brightcare.local','$2y$10$2o4Lw8oJ8o6J7jQ7rQ8f7eR9o4d0kGmW8sQ2uB9dR3vH1tA6xP4i','doctor','0911000001');

INSERT INTO doctors (user_id,gender,phone,specialization)
SELECT id,'Male','0911000001','General Medicine'
FROM users WHERE email='doctor@brightcare.local';

INSERT INTO notices (title,content,expiry_date,created_by)
SELECT 'Welcome to Bright Care Clinic','Clinic Management System is ready for daily operations.',DATE_ADD(CURDATE(),INTERVAL 30 DAY),id
FROM users WHERE email='admin@brightcare.local';
