CREATE TABLE chat_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender ENUM('admin', 'user') NOT NULL,
    message TEXT NOT NULL,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
);
