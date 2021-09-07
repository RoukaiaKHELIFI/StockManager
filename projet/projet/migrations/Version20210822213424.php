<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210822213424 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scategorie DROP FOREIGN KEY FK_51809477F347EFB');
        $this->addSql('DROP INDEX IDX_51809477F347EFB ON scategorie');
        $this->addSql('ALTER TABLE scategorie DROP produit_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scategorie ADD produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scategorie ADD CONSTRAINT FK_51809477F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_51809477F347EFB ON scategorie (produit_id)');
    }
}
