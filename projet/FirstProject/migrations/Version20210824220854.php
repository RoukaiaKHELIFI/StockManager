<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210824220854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achats ADD fournisseurs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE achats ADD CONSTRAINT FK_9920924E27ACDDFD FOREIGN KEY (fournisseurs_id) REFERENCES fournisseurs (id)');
        $this->addSql('CREATE INDEX IDX_9920924E27ACDDFD ON achats (fournisseurs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achats DROP FOREIGN KEY FK_9920924E27ACDDFD');
        $this->addSql('DROP INDEX IDX_9920924E27ACDDFD ON achats');
        $this->addSql('ALTER TABLE achats DROP fournisseurs_id');
    }
}
