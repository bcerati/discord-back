<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230221195004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messages ADD channel_id UUID DEFAULT NULL');
        $this->addSql('COMMENT ON COLUMN messages.channel_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E9672F5A1AA FOREIGN KEY (channel_id) REFERENCES channels (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_DB021E9672F5A1AA ON messages (channel_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE messages DROP CONSTRAINT FK_DB021E9672F5A1AA');
        $this->addSql('DROP INDEX IDX_DB021E9672F5A1AA');
        $this->addSql('ALTER TABLE messages DROP channel_id');
    }
}
