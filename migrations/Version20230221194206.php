<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230221194206 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE channels (id UUID NOT NULL, server_id UUID DEFAULT NULL, category_id UUID DEFAULT NULL, name VARCHAR(30) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F314E2B61844E6B7 ON channels (server_id)');
        $this->addSql('CREATE INDEX IDX_F314E2B612469DE2 ON channels (category_id)');
        $this->addSql('COMMENT ON COLUMN channels.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN channels.server_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN channels.category_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN channels.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE channels ADD CONSTRAINT FK_F314E2B61844E6B7 FOREIGN KEY (server_id) REFERENCES servers (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE channels ADD CONSTRAINT FK_F314E2B612469DE2 FOREIGN KEY (category_id) REFERENCES server_categories (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE server_channels DROP CONSTRAINT fk_31b1630a1844e6b7');
        $this->addSql('ALTER TABLE server_channels DROP CONSTRAINT fk_31b1630a12469de2');
        $this->addSql('DROP TABLE server_channels');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE server_channels (id UUID NOT NULL, server_id UUID DEFAULT NULL, category_id UUID DEFAULT NULL, name VARCHAR(30) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_31b1630a12469de2 ON server_channels (category_id)');
        $this->addSql('CREATE INDEX idx_31b1630a1844e6b7 ON server_channels (server_id)');
        $this->addSql('COMMENT ON COLUMN server_channels.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN server_channels.server_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN server_channels.category_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN server_channels.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE server_channels ADD CONSTRAINT fk_31b1630a1844e6b7 FOREIGN KEY (server_id) REFERENCES servers (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE server_channels ADD CONSTRAINT fk_31b1630a12469de2 FOREIGN KEY (category_id) REFERENCES server_categories (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE channels DROP CONSTRAINT FK_F314E2B61844E6B7');
        $this->addSql('ALTER TABLE channels DROP CONSTRAINT FK_F314E2B612469DE2');
        $this->addSql('DROP TABLE channels');
    }
}
