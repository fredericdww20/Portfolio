<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241010113410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bloc (id INT AUTO_INCREMENT NOT NULL, page_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_C778955AC4663E4 (page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bloc ADD CONSTRAINT FK_C778955AC4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE content_element ADD bloc_id INT DEFAULT NULL, CHANGE page_id page_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE content_element ADD CONSTRAINT FK_9E48878A5582E9C0 FOREIGN KEY (bloc_id) REFERENCES bloc (id)');
        $this->addSql('CREATE INDEX IDX_9E48878A5582E9C0 ON content_element (bloc_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE content_element DROP FOREIGN KEY FK_9E48878A5582E9C0');
        $this->addSql('ALTER TABLE bloc DROP FOREIGN KEY FK_C778955AC4663E4');
        $this->addSql('DROP TABLE bloc');
        $this->addSql('DROP INDEX IDX_9E48878A5582E9C0 ON content_element');
        $this->addSql('ALTER TABLE content_element DROP bloc_id, CHANGE page_id page_id INT NOT NULL');
    }
}
