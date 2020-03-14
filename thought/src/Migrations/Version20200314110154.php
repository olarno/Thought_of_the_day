<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200314110154 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE thought ADD colors_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE thought ADD CONSTRAINT FK_91BB9F6C5C002039 FOREIGN KEY (colors_id) REFERENCES color_feel (id)');
        $this->addSql('CREATE INDEX IDX_91BB9F6C5C002039 ON thought (colors_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE thought DROP FOREIGN KEY FK_91BB9F6C5C002039');
        $this->addSql('DROP INDEX IDX_91BB9F6C5C002039 ON thought');
        $this->addSql('ALTER TABLE thought DROP colors_id');
    }
}
