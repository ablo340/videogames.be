<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181213184014 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE console CHANGE date_de_sortie date_de_sortie VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE jeux CHANGE console_id console_id INT NOT NULL, CHANGE date_de_sortie date_de_sortie VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE console CHANGE date_de_sortie date_de_sortie VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE jeux CHANGE console_id console_id INT DEFAULT NULL, CHANGE date_de_sortie date_de_sortie VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
