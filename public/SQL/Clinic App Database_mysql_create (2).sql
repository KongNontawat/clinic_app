CREATE TABLE `patients` (
	`patient_id` INT(20) NOT NULL AUTO_INCREMENT,
	`opd_id` varchar(20) NOT NULL,
	`id_card` INT(13) NOT NULL UNIQUE,
	`group_id` INT(20),
	`title` varchar(6),
	`fname` varchar(100) NOT NULL,
	`lname` varchar(255) NOT NULL,
	`nname` varchar(50),
	`sex` varchar(6) NOT NULL,
	`birthdate` varchar(30) NOT NULL,
	`age` INT(3) NOT NULL,
	`nationality` varchar(50) NOT NULL,
	`race` varchar(50) NOT NULL,
	`religion` varchar(50) NOT NULL,
	`email` varchar(255),
	`id_line` varchar(100),
	`phone` varchar(30) NOT NULL,
	`address_id` INT(20) NOT NULL,
	`occupation` varchar(50),
	`image` varchar(255),
	`status` INT(2) NOT NULL DEFAULT '0',
	`created_at` TIMESTAMP NOT NULL DEFAULT(current_timestamp()),
	`updated_at` TIMESTAMP NOT NULL DEFAULT(current_timestamp()) ,
	PRIMARY KEY (`patient_id`,`opd_id`)
);

CREATE TABLE `patiest_medical_info` (
	`patiest_medical_info_id` INT(20) NOT NULL AUTO_INCREMENT,
	`patient_id` INT(20) NOT NULL,
	`height` INT(3),
	`weight` INT(3),
	`drug_allergies` TEXT,
	`food_allergies` TEXT,
	`smoker` INT(1),
	`drinks` INT(1),
	`congenital_disease` TEXT,
	`diabetic` BOOLEAN,
	`high_blood_pressure` BOOLEAN,
	`blood_group` varchar(5),
	`bleed_tendency` BOOLEAN,
	`heart_deisease` BOOLEAN,
	`surgery` TEXT,
	`accident` TEXT,
	`high_risk_diseases` TEXT,
	`medical_history` TEXT,
	`current_medication` TEXT,
	`female_pregnant` BOOLEAN,
	`first_chanel` varchar(255),
	`note` TEXT,
	`inquirer_id` INT(20) NOT NULL,
	PRIMARY KEY (`patiest_medical_info_id`)
);

CREATE TABLE `patient_emc` (
	`patient_emc_id` INT(20) NOT NULL AUTO_INCREMENT,
	`patient_id` INT(20) NOT NULL,
	`emc_relation` varchar(30),
	`emc_title` varchar(10),
	`emc_fname` varchar(100),
	`emc_lname` varchar(255),
	`address_id` INT(100),
	`emc_phone` varchar(30),
	PRIMARY KEY (`patient_emc_id`)
);

CREATE TABLE `address_info` (
	`address_id` INT(20) NOT NULL AUTO_INCREMENT,
	`address` TEXT NOT NULL,
	`subdistrict_id` INT(20) NOT NULL,
	`district_id` INT(20) NOT NULL,
	`province_id` INT(20) NOT NULL,
	`postcode_id` INT(20) NOT NULL,
	`country` varchar(30) NOT NULL,
	PRIMARY KEY (`address_id`)
);

CREATE TABLE `patient_group` (
	`patient_group_id` INT(20) NOT NULL AUTO_INCREMENT,
	`patient_id` INT(20) NOT NULL,
	`group_name` varchar(30) NOT NULL,
	`group_detail` TEXT,
	PRIMARY KEY (`patient_group_id`)
);

CREATE TABLE `users` (
	`user_id` INT(20) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	`role` varchar(30) NOT NULL,
	`email_verified_at` TIMESTAMP,
	`password` varchar(255) NOT NULL,
	`remember_token` varchar(100),
	`created_at` TIMESTAMP NOT NULL DEFAULT(current_timestamp()),
	`updated_at` TIMESTAMP NOT NULL DEFAULT(current_timestamp()),
	`deleted_at` TIMESTAMP NOT NULL DEFAULT(current_timestamp()),
	PRIMARY KEY (`user_id`)
);

CREATE TABLE `doctors` (
	`doctor_id` INT(20) NOT NULL AUTO_INCREMENT,
	`user_id` INT(20) NOT NULL,
	`title` varchar(6),
	`fname` varchar(100) NOT NULL,
	`lname` varchar(255) NOT NULL,
	`nname` varchar(50) NOT NULL,
	`sex` varchar(6) NOT NULL,
	`birthdate` varchar(30) NOT NULL,
	`age` INT(3) NOT NULL,
	`email` varchar(255) NOT NULL,
	`phone` varchar(30) NOT NULL,
	`address_id` INT(20) NOT NULL,
	`designation` varchar(255),
	`specialize` varchar(255),
	`in_hospital` varchar(255),
	`aboutme` TEXT,
	`image` varchar(255),
	`status` INT(1) NOT NULL DEFAULT '0',
	`created_at` TIMESTAMP NOT NULL DEFAULT(current_timestamp()),
	`updated_at` TIMESTAMP NOT NULL DEFAULT(current_timestamp()),
	PRIMARY KEY (`doctor_id`)
);

CREATE TABLE `logs_patients` (
	`logs_patient_id` INT(20) NOT NULL AUTO_INCREMENT,
	`patient_id` INT(20) NOT NULL,
	`activity` varchar(255) NOT NULL,
	`logs_details` TEXT,
	`active_time` TIMESTAMP NOT NULL DEFAULT(current_timestamp()),
	PRIMARY KEY (`logs_patient_id`)
);

CREATE TABLE `logs_users` (
	`logs_patient_id` INT(20) NOT NULL AUTO_INCREMENT,
	`user_id` INT(20) NOT NULL,
	`activity` varchar(255) NOT NULL,
	`logs_details` TEXT,
	`active_time` TIMESTAMP NOT NULL DEFAULT(current_timestamp()),
	PRIMARY KEY (`logs_patient_id`)
);

CREATE TABLE `employee` (
	`employee_id` INT(20) NOT NULL AUTO_INCREMENT,
	`user_id` INT(20) NOT NULL,
	`title` varchar(6),
	`fname` varchar(100) NOT NULL,
	`lname` varchar(255) NOT NULL,
	`nname` varchar(50) NOT NULL,
	`sex` varchar(6) NOT NULL,
	`birthdate` varchar(30) NOT NULL,
	`age` INT(3) NOT NULL,
	`email` varchar(255) NOT NULL,
	`phone` varchar(30) NOT NULL,
	`address_id` INT(20) NOT NULL,
	`designation` varchar(255),
	`aboutme` TEXT,
	`image` varchar(255),
	`status` INT(1) NOT NULL DEFAULT '0',
	`created_at` TIMESTAMP NOT NULL DEFAULT(current_timestamp()),
	`updated_at` TIMESTAMP NOT NULL DEFAULT(current_timestamp()),
	PRIMARY KEY (`employee_id`)
);

CREATE TABLE `appointment` (
	`appointment_id` INT(20) NOT NULL AUTO_INCREMENT,
	`doctor_id` INT(20) NOT NULL,
	`patient_id` INT(20) NOT NULL,
	`appointment_number` INT(20) NOT NULL UNIQUE,
	`reason_for_appointment` TEXT NOT NULL,
	`status` INT(1) NOT NULL,
	`doctor_comment` TEXT,
	`appointment_date` DATE NOT NULL,
	`appointment_time` TIME NOT NULL,
	PRIMARY KEY (`appointment_id`)
);

ALTER TABLE `patients` ADD CONSTRAINT `patients_fk0` FOREIGN KEY (`address_id`) REFERENCES `address_info`(`address_id`);

ALTER TABLE `patiest_medical_info` ADD CONSTRAINT `patiest_medical_info_fk0` FOREIGN KEY (`patient_id`) REFERENCES `patients`(`patient_id`);

ALTER TABLE `patient_emc` ADD CONSTRAINT `patient_emc_fk0` FOREIGN KEY (`patient_id`) REFERENCES `patients`(`patient_id`);

ALTER TABLE `patient_group` ADD CONSTRAINT `patient_group_fk0` FOREIGN KEY (`patient_id`) REFERENCES `patients`(`patient_id`);

ALTER TABLE `doctors` ADD CONSTRAINT `doctors_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `doctors` ADD CONSTRAINT `doctors_fk1` FOREIGN KEY (`address_id`) REFERENCES `address_info`(`address_id`);

ALTER TABLE `logs_patients` ADD CONSTRAINT `logs_patients_fk0` FOREIGN KEY (`patient_id`) REFERENCES `patients`(`patient_id`);

ALTER TABLE `logs_users` ADD CONSTRAINT `logs_users_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `employee` ADD CONSTRAINT `employee_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `employee` ADD CONSTRAINT `employee_fk1` FOREIGN KEY (`address_id`) REFERENCES `address_info`(`address_id`);

ALTER TABLE `appointment` ADD CONSTRAINT `appointment_fk0` FOREIGN KEY (`doctor_id`) REFERENCES `doctors`(`doctor_id`);

ALTER TABLE `appointment` ADD CONSTRAINT `appointment_fk1` FOREIGN KEY (`patient_id`) REFERENCES `patients`(`patient_id`);












