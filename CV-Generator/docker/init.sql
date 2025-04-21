-- Créer la base de données si elle n'existe pas déjà
CREATE DATABASE IF NOT EXISTS `CV-Generator`;

-- Assurer que l'utilisateur admin est correctement créé avec les privilèges nécessaires
CREATE USER IF NOT EXISTS 'admin'@'%' IDENTIFIED BY 'fapirmaf';

-- Accorder tous les privilèges à l'utilisateur sur la base de données
GRANT ALL PRIVILEGES ON `CV-Generator`.* TO 'admin'@'%';

-- Appliquer les changements
FLUSH PRIVILEGES;