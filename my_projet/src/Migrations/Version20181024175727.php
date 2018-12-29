<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181024175727 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE console (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, fabricant VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, date_de_sortie DATE NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jeux ADD console_id INT NOT NULL, DROP console');
        $this->addSql('ALTER TABLE jeux ADD CONSTRAINT FK_3755B50D72F9DD9F FOREIGN KEY (console_id) REFERENCES console (id)');
        $this->addSql('CREATE INDEX IDX_3755B50D72F9DD9F ON jeux (console_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE jeux DROP FOREIGN KEY FK_3755B50D72F9DD9F');
        $this->addSql('DROP TABLE console');
        $this->addSql('DROP INDEX IDX_3755B50D72F9DD9F ON jeux');
        $this->addSql('ALTER TABLE jeux ADD console VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP console_id');
    }
}
