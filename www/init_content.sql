CREATE TABLE content (
    id INT AUTO_INCREMENT PRIMARY KEY,
    identifier VARCHAR(100) UNIQUE,
    value TEXT
);

INSERT INTO content (identifier, value) VALUES
('home_title', 'Bienvenue sur mon site'),
('home_text', 'Ceci est mon site'),
('home_image', 'uploads/default.jpg');  -- mets une image par défaut
