CREATE TABLE weather_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    city VARCHAR(255),
    temperature FLOAT,
    humidity INT,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
