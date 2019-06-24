<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190117124856 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE favorilerim (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, fiyat DOUBLE PRECISION DEFAULT NULL, sehir VARCHAR(255) DEFAULT NULL, ilce VARCHAR(255) DEFAULT NULL, webpage VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ayarlar CHANGE aboutus aboutus VARCHAR(255) DEFAULT NULL, CHANGE contact contact VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE favorilerim');
        $this->addSql('ALTER TABLE ayarlar CHANGE aboutus aboutus LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE contact contact LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
