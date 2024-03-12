<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240308135321 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD job_offer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C13481D195 FOREIGN KEY (job_offer_id) REFERENCES job_offer (id)');
        $this->addSql('CREATE INDEX IDX_64C19C13481D195 ON category (job_offer_id)');
        $this->addSql('ALTER TABLE job_offer ADD closing_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD salary INT NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C13481D195');
        $this->addSql('DROP INDEX IDX_64C19C13481D195 ON category');
        $this->addSql('ALTER TABLE category DROP job_offer_id');
        $this->addSql('ALTER TABLE job_offer DROP closing_at, DROP salary, DROP created_at');
    }
}
