<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250421122932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE aside_block (id INT AUTO_INCREMENT NOT NULL, merge_id INT DEFAULT NULL, paragraph_id INT DEFAULT NULL, main_title_id INT DEFAULT NULL, sub_title_id INT DEFAULT NULL, padding_id INT DEFAULT NULL, background_color VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_22ADE66EF4215C5 (merge_id), UNIQUE INDEX UNIQ_22ADE66E8B50597F (paragraph_id), UNIQUE INDEX UNIQ_22ADE66ED3BD96C8 (main_title_id), UNIQUE INDEX UNIQ_22ADE66EB03069E4 (sub_title_id), UNIQUE INDEX UNIQ_22ADE66E438BFA98 (padding_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE block (id INT AUTO_INCREMENT NOT NULL, cv_id INT NOT NULL, title VARCHAR(150) NOT NULL, placement VARCHAR(150) NOT NULL, with_dates TINYINT(1) NOT NULL, INDEX IDX_831B9722CFE419E2 (cv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE coordinates (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, phone VARCHAR(100) NOT NULL, street VARCHAR(255) NOT NULL, zipcode VARCHAR(50) NOT NULL, city VARCHAR(255) NOT NULL, country VARCHAR(150) NOT NULL, UNIQUE INDEX UNIQ_9816D676A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE curriculum_vitae (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, header_id INT NOT NULL, aside_block_id INT NOT NULL, main_block_id INT NOT NULL, name VARCHAR(255) NOT NULL, template VARCHAR(255) NOT NULL, profile_img LONGTEXT DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, description TEXT NOT NULL, INDEX IDX_1FC99844A76ED395 (user_id), UNIQUE INDEX UNIQ_1FC998442EF91FD8 (header_id), UNIQUE INDEX UNIQ_1FC99844844BA807 (aside_block_id), UNIQUE INDEX UNIQ_1FC9984430CF9379 (main_block_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE header (id INT AUTO_INCREMENT NOT NULL, merge_id INT DEFAULT NULL, paragraph_id INT DEFAULT NULL, main_title_id INT DEFAULT NULL, sub_title_id INT DEFAULT NULL, padding_id INT DEFAULT NULL, background_color VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_6E72A8C1F4215C5 (merge_id), UNIQUE INDEX UNIQ_6E72A8C18B50597F (paragraph_id), UNIQUE INDEX UNIQ_6E72A8C1D3BD96C8 (main_title_id), UNIQUE INDEX UNIQ_6E72A8C1B03069E4 (sub_title_id), UNIQUE INDEX UNIQ_6E72A8C1438BFA98 (padding_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE line (id INT AUTO_INCREMENT NOT NULL, block_id INT NOT NULL, start_at DATE DEFAULT NULL, end_at DATE DEFAULT NULL, title VARCHAR(255) NOT NULL, company_name VARCHAR(100) DEFAULT NULL, INDEX IDX_D114B4F6E9ED820C (block_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE line_detail (id INT AUTO_INCREMENT NOT NULL, line_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, before_character VARCHAR(10) DEFAULT NULL, INDEX IDX_5A48292E4D7B7542 (line_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE main_block (id INT AUTO_INCREMENT NOT NULL, merge_id INT DEFAULT NULL, paragraph_id INT DEFAULT NULL, main_title_id INT DEFAULT NULL, sub_title_id INT DEFAULT NULL, padding_id INT DEFAULT NULL, background_color VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_20472464F4215C5 (merge_id), UNIQUE INDEX UNIQ_204724648B50597F (paragraph_id), UNIQUE INDEX UNIQ_20472464D3BD96C8 (main_title_id), UNIQUE INDEX UNIQ_20472464B03069E4 (sub_title_id), UNIQUE INDEX UNIQ_20472464438BFA98 (padding_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE main_title (id INT AUTO_INCREMENT NOT NULL, merge_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_886ACB2DF4215C5 (merge_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE merge (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, type VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE padding (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, type VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE paragraph (id INT AUTO_INCREMENT NOT NULL, merge_id INT DEFAULT NULL, color VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_7DD39862F4215C5 (merge_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', expires_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE sub_title (id INT AUTO_INCREMENT NOT NULL, merge_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_C7721CD2F4215C5 (merge_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, gender VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, firstname VARCHAR(180) NOT NULL, lastname VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT '(DC2Type:json)', password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE aside_block ADD CONSTRAINT FK_22ADE66EF4215C5 FOREIGN KEY (merge_id) REFERENCES merge (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE aside_block ADD CONSTRAINT FK_22ADE66E8B50597F FOREIGN KEY (paragraph_id) REFERENCES paragraph (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE aside_block ADD CONSTRAINT FK_22ADE66ED3BD96C8 FOREIGN KEY (main_title_id) REFERENCES main_title (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE aside_block ADD CONSTRAINT FK_22ADE66EB03069E4 FOREIGN KEY (sub_title_id) REFERENCES sub_title (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE aside_block ADD CONSTRAINT FK_22ADE66E438BFA98 FOREIGN KEY (padding_id) REFERENCES padding (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE block ADD CONSTRAINT FK_831B9722CFE419E2 FOREIGN KEY (cv_id) REFERENCES curriculum_vitae (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE coordinates ADD CONSTRAINT FK_9816D676A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curriculum_vitae ADD CONSTRAINT FK_1FC99844A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curriculum_vitae ADD CONSTRAINT FK_1FC998442EF91FD8 FOREIGN KEY (header_id) REFERENCES header (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curriculum_vitae ADD CONSTRAINT FK_1FC99844844BA807 FOREIGN KEY (aside_block_id) REFERENCES aside_block (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curriculum_vitae ADD CONSTRAINT FK_1FC9984430CF9379 FOREIGN KEY (main_block_id) REFERENCES main_block (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE header ADD CONSTRAINT FK_6E72A8C1F4215C5 FOREIGN KEY (merge_id) REFERENCES merge (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE header ADD CONSTRAINT FK_6E72A8C18B50597F FOREIGN KEY (paragraph_id) REFERENCES paragraph (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE header ADD CONSTRAINT FK_6E72A8C1D3BD96C8 FOREIGN KEY (main_title_id) REFERENCES main_title (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE header ADD CONSTRAINT FK_6E72A8C1B03069E4 FOREIGN KEY (sub_title_id) REFERENCES sub_title (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE header ADD CONSTRAINT FK_6E72A8C1438BFA98 FOREIGN KEY (padding_id) REFERENCES padding (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE line ADD CONSTRAINT FK_D114B4F6E9ED820C FOREIGN KEY (block_id) REFERENCES block (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE line_detail ADD CONSTRAINT FK_5A48292E4D7B7542 FOREIGN KEY (line_id) REFERENCES line (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE main_block ADD CONSTRAINT FK_20472464F4215C5 FOREIGN KEY (merge_id) REFERENCES merge (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE main_block ADD CONSTRAINT FK_204724648B50597F FOREIGN KEY (paragraph_id) REFERENCES paragraph (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE main_block ADD CONSTRAINT FK_20472464D3BD96C8 FOREIGN KEY (main_title_id) REFERENCES main_title (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE main_block ADD CONSTRAINT FK_20472464B03069E4 FOREIGN KEY (sub_title_id) REFERENCES sub_title (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE main_block ADD CONSTRAINT FK_20472464438BFA98 FOREIGN KEY (padding_id) REFERENCES padding (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE main_title ADD CONSTRAINT FK_886ACB2DF4215C5 FOREIGN KEY (merge_id) REFERENCES merge (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE paragraph ADD CONSTRAINT FK_7DD39862F4215C5 FOREIGN KEY (merge_id) REFERENCES merge (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE sub_title ADD CONSTRAINT FK_C7721CD2F4215C5 FOREIGN KEY (merge_id) REFERENCES merge (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE aside_block DROP FOREIGN KEY FK_22ADE66EF4215C5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE aside_block DROP FOREIGN KEY FK_22ADE66E8B50597F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE aside_block DROP FOREIGN KEY FK_22ADE66ED3BD96C8
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE aside_block DROP FOREIGN KEY FK_22ADE66EB03069E4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE aside_block DROP FOREIGN KEY FK_22ADE66E438BFA98
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE block DROP FOREIGN KEY FK_831B9722CFE419E2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE coordinates DROP FOREIGN KEY FK_9816D676A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curriculum_vitae DROP FOREIGN KEY FK_1FC99844A76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curriculum_vitae DROP FOREIGN KEY FK_1FC998442EF91FD8
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curriculum_vitae DROP FOREIGN KEY FK_1FC99844844BA807
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE curriculum_vitae DROP FOREIGN KEY FK_1FC9984430CF9379
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE header DROP FOREIGN KEY FK_6E72A8C1F4215C5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE header DROP FOREIGN KEY FK_6E72A8C18B50597F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE header DROP FOREIGN KEY FK_6E72A8C1D3BD96C8
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE header DROP FOREIGN KEY FK_6E72A8C1B03069E4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE header DROP FOREIGN KEY FK_6E72A8C1438BFA98
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE line DROP FOREIGN KEY FK_D114B4F6E9ED820C
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE line_detail DROP FOREIGN KEY FK_5A48292E4D7B7542
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE main_block DROP FOREIGN KEY FK_20472464F4215C5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE main_block DROP FOREIGN KEY FK_204724648B50597F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE main_block DROP FOREIGN KEY FK_20472464D3BD96C8
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE main_block DROP FOREIGN KEY FK_20472464B03069E4
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE main_block DROP FOREIGN KEY FK_20472464438BFA98
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE main_title DROP FOREIGN KEY FK_886ACB2DF4215C5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE paragraph DROP FOREIGN KEY FK_7DD39862F4215C5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE sub_title DROP FOREIGN KEY FK_C7721CD2F4215C5
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE aside_block
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE block
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE coordinates
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE curriculum_vitae
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE header
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE line
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE line_detail
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE main_block
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE main_title
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE merge
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE padding
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE paragraph
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE reset_password_request
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE sub_title
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE `user`
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
    }
}
