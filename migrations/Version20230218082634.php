<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230218082634 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX uniq_e83cd6cf1844e6b7');
        $this->addSql('CREATE INDEX IDX_E83CD6CF1844E6B7 ON server_categories (server_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX IDX_E83CD6CF1844E6B7');
        $this->addSql('CREATE UNIQUE INDEX uniq_e83cd6cf1844e6b7 ON server_categories (server_id)');
    }
}
