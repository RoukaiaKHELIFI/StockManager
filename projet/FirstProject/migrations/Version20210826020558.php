<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210826020558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vente (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, client_id INT DEFAULT NULL, quantite INT NOT NULL, mode_paie VARCHAR(255) NOT NULL, INDEX IDX_888A2A4CF347EFB (produit_id), INDEX IDX_888A2A4C19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4CF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4C19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('DROP TABLE ventes');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ventes (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, mode_paie VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, quantite INT NOT NULL, INDEX IDX_64EC489A19EB6921 (client_id), INDEX IDX_64EC489AF347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ventes ADD CONSTRAINT FK_64EC489A19EB6921 FOREIGN KEY (client_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE ventes ADD CONSTRAINT FK_64EC489AF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('DROP TABLE vente');
    }
}
