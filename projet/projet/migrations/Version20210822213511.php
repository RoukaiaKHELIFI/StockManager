<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210822213511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD scategorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27CF6A778A FOREIGN KEY (scategorie_id) REFERENCES scategorie (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27CF6A778A ON produit (scategorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27CF6A778A');
        $this->addSql('DROP INDEX IDX_29A5EC27CF6A778A ON produit');
        $this->addSql('ALTER TABLE produit DROP scategorie_id');
    }
}
