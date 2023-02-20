<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230220091057 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\PostgreSQL100Platform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\PostgreSQL100Platform'."
        );

        $this->addSql('CREATE TABLE server_categories (id UUID NOT NULL, server_id UUID DEFAULT NULL, name VARCHAR(30) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_e83cd6cf1844e6b7 ON server_categories (server_id)');
        $this->addSql('COMMENT ON COLUMN server_categories.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN server_categories.server_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN server_categories.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\PostgreSQL100Platform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\PostgreSQL100Platform'."
        );

        $this->addSql('CREATE TABLE documents (id UUID NOT NULL, name VARCHAR(30) NOT NULL, extension VARCHAR(10) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN documents.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN documents.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\PostgreSQL100Platform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\PostgreSQL100Platform'."
        );

        $this->addSql('CREATE TABLE servers (id UUID NOT NULL, image_id UUID DEFAULT NULL, name VARCHAR(30) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_4f8af5f73da5256d ON servers (image_id)');
        $this->addSql('COMMENT ON COLUMN servers.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN servers.image_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN servers.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\PostgreSQL100Platform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\PostgreSQL100Platform'."
        );

        $this->addSql('CREATE TABLE server_channels (id UUID NOT NULL, server_id UUID DEFAULT NULL, category_id UUID DEFAULT NULL, name VARCHAR(30) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_31b1630a12469de2 ON server_channels (category_id)');
        $this->addSql('CREATE INDEX idx_31b1630a1844e6b7 ON server_channels (server_id)');
        $this->addSql('COMMENT ON COLUMN server_channels.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN server_channels.server_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN server_channels.category_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN server_channels.created_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\PostgreSQL100Platform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\PostgreSQL100Platform'."
        );

        $this->addSql('DROP TABLE server_categories');
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\PostgreSQL100Platform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\PostgreSQL100Platform'."
        );

        $this->addSql('DROP TABLE documents');
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\PostgreSQL100Platform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\PostgreSQL100Platform'."
        );

        $this->addSql('DROP TABLE servers');
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\PostgreSQL100Platform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\PostgreSQL100Platform'."
        );

        $this->addSql('DROP TABLE server_channels');
    }
}
