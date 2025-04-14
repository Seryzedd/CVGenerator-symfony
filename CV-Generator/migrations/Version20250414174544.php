<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250414174544 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE line (id INT AUTO_INCREMENT NOT NULL, block_id INT NOT NULL, start_at DATE DEFAULT NULL, end_at DATE DEFAULT NULL, title VARCHAR(255) NOT NULL, company_name VARCHAR(100) DEFAULT NULL, INDEX IDX_D114B4F6E9ED820C (block_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE line ADD CONSTRAINT FK_D114B4F6E9ED820C FOREIGN KEY (block_id) REFERENCES block (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE user CHANGE roles roles JSON NOT NULL COMMENT '(DC2Type:json)'
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE line DROP FOREIGN KEY FK_D114B4F6E9ED820C
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE line
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE `user` CHANGE roles roles JSON NOT NULL COMMENT '(DC2Type:json)'
        SQL);
    }
}
