<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230218082256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE server_categories (id UUID NOT NULL, name VARCHAR(30) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN server_categories.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN server_categories.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('DROP TABLE channel_categories');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE channel_categories (id UUID NOT NULL, name VARCHAR(30) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN channel_categories.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN channel_categories.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('DROP TABLE server_categories');
    }
}
