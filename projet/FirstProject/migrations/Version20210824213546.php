<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210824213546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achats ADD produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE achats ADD CONSTRAINT FK_9920924EF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_9920924EF347EFB ON achats (produit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achats DROP FOREIGN KEY FK_9920924EF347EFB');
        $this->addSql('DROP INDEX IDX_9920924EF347EFB ON achats');
        $this->addSql('ALTER TABLE achats DROP produit_id');
    }
}
