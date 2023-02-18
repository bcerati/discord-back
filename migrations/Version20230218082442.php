<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230218082442 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE server_categories ADD server_id UUID DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN server_categories.server_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE server_categories ADD CONSTRAINT FK_E83CD6CF1844E6B7 FOREIGN KEY (server_id) REFERENCES servers (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E83CD6CF1844E6B7 ON server_categories (server_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE server_categories DROP CONSTRAINT FK_E83CD6CF1844E6B7');
        $this->addSql('DROP INDEX UNIQ_E83CD6CF1844E6B7');
        $this->addSql('ALTER TABLE server_categories DROP server_id');
    }
}
