CREATE DATABASE restaurant_insurance;

USE restaurant_insurance;

CREATE TABLE application_form (
    id INT AUTO_INCREMENT PRIMARY KEY,
    named_insured VARCHAR(255),
    trading_as VARCHAR(255),
    website VARCHAR(255),
    tax_status VARCHAR(255),
    abn VARCHAR(50),
    occupation VARCHAR(255),
    hours_of_operation VARCHAR(255),
    years_in_operation INT,
    insurance_from DATE,
    insurance_to DATE,
    declined_insurance BOOLEAN,
    refused_renewal BOOLEAN,
    special_conditions BOOLEAN,
    special_excess BOOLEAN,
    claim_rejected BOOLEAN,
    bankruptcy BOOLEAN,
    criminal_offence BOOLEAN,
    other_matters BOOLEAN,
    claim_date DATE,
    insurer VARCHAR(255),
    claim_details TEXT
);
