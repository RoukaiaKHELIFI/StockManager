<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210824222832 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE achats (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, fournisseurs_id INT DEFAULT NULL, cout INT NOT NULL, quantite INT NOT NULL, sous_total DOUBLE PRECISION NOT NULL, total DOUBLE PRECISION NOT NULL, remise INT NOT NULL, total_net DOUBLE PRECISION NOT NULL, mode_paie VARCHAR(255) NOT NULL, paye DOUBLE PRECISION NOT NULL, INDEX IDX_9920924EF347EFB (produit_id), INDEX IDX_9920924E27ACDDFD (fournisseurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE achats ADD CONSTRAINT FK_9920924EF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE achats ADD CONSTRAINT FK_9920924E27ACDDFD FOREIGN KEY (fournisseurs_id) REFERENCES fournisseur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE achats');
    }
}
