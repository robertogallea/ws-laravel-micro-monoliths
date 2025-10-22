-- Creazione dei database per l'applicazione Laravel
CREATE DATABASE IF NOT EXISTS app;

-- Garantisce i privilegi all'utente laravel per tutti i database
GRANT ALL PRIVILEGES ON app.* TO 'laravel'@'%';

FLUSH PRIVILEGES;
