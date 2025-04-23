
CREATE TABLE game_rounds (
                             id INT AUTO_INCREMENT PRIMARY KEY,
                             tournament_name VARCHAR(255) NOT NULL,
                             tournament_date DATE NOT NULL,
                             round_number INT NOT NULL,
                             player_name VARCHAR(255) NOT NULL,
                             player_symbol ENUM('rock', 'paper', 'scissors') NOT NULL,
                             played_at DATETIME NOT NULL,
                             created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

