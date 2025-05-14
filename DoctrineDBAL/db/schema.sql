CREATE DATABASE IF NOT EXISTS rps_tournament CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE rps_tournament;

CREATE TABLE IF NOT EXISTS game_rounds (
                             id INT AUTO_INCREMENT PRIMARY KEY,
                             tournament_name VARCHAR(255) NOT NULL,
                             tournament_date DATE NOT NULL,
                             round_number INT NOT NULL,
                             player_name VARCHAR(255) NOT NULL,
                             player_symbol ENUM('rock', 'paper', 'scissors') NOT NULL,
                             played_at DATETIME NOT NULL,
                             created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

