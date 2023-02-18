<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230215101249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE servers ADD image_id UUID DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN servers.image_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE servers ADD CONSTRAINT FK_4F8AF5F73DA5256D FOREIGN KEY (image_id) REFERENCES documents (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4F8AF5F73DA5256D ON servers (image_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE servers DROP CONSTRAINT FK_4F8AF5F73DA5256D');
        $this->addSql('DROP INDEX UNIQ_4F8AF5F73DA5256D');
        $this->addSql('ALTER TABLE servers DROP image_id');
    }
}
