<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181227232906 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ilce (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, sehirid INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user CHANGE create_at create_at DATETIME NOT NULL, CHANGE update_at update_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE ilce');
        $this->addSql('ALTER TABLE user CHANGE create_at create_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE update_at update_at DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL');
    }
}
