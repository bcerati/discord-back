<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230228161608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notifications (id UUID NOT NULL, channel_id UUID DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6000B0D372F5A1AA ON notifications (channel_id)');
        $this->addSql('COMMENT ON COLUMN notifications.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN notifications.channel_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN notifications.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE notifications ADD CONSTRAINT FK_6000B0D372F5A1AA FOREIGN KEY (channel_id) REFERENCES channels (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE notifications DROP CONSTRAINT FK_6000B0D372F5A1AA');
        $this->addSql('DROP TABLE notifications');
    }
}
