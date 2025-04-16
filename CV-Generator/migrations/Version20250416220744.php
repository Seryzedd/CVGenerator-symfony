<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250416220744 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE line_detail (id INT AUTO_INCREMENT NOT NULL, line_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, before_character VARCHAR(10) DEFAULT NULL, INDEX IDX_5A48292E4D7B7542 (line_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE line_detail ADD CONSTRAINT FK_5A48292E4D7B7542 FOREIGN KEY (line_id) REFERENCES line (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT '(DC2Type:json)'
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE line_detail DROP FOREIGN KEY FK_5A48292E4D7B7542
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE line_detail
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `user` CHANGE roles roles JSON NOT NULL COMMENT '(DC2Type:json)'
        SQL);
    }
}
