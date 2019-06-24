<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190113143128 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, adsoyad VARCHAR(50) DEFAULT NULL, email VARCHAR(50) DEFAULT NULL, sifre VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, durum VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE security_user');
        $this->addSql('ALTER TABLE ayarlar CHANGE aboutus aboutus VARCHAR(255) DEFAULT NULL, CHANGE contact contact VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE security_user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL COLLATE utf8mb4_unicode_ci, roles VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, password VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, name VARCHAR(20) DEFAULT NULL COLLATE utf8mb4_unicode_ci, status VARCHAR(10) DEFAULT NULL COLLATE utf8mb4_unicode_ci, UNIQUE INDEX UNIQ_52825A88E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE ayarlar CHANGE aboutus aboutus LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE contact contact LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
