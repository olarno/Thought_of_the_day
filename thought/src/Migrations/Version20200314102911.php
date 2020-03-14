<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200314102911 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE thought ADD color_id INT NOT NULL');
        $this->addSql('ALTER TABLE thought ADD CONSTRAINT FK_91BB9F6C7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color_feel (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_91BB9F6C7ADA1FB5 ON thought (color_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE thought DROP FOREIGN KEY FK_91BB9F6C7ADA1FB5');
        $this->addSql('DROP INDEX UNIQ_91BB9F6C7ADA1FB5 ON thought');
        $this->addSql('ALTER TABLE thought DROP color_id');
    }
}
