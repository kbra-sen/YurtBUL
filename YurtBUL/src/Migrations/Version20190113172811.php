<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190113172811 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE userssssss');
        $this->addSql('ALTER TABLE ayarlar CHANGE aboutus aboutus VARCHAR(255) DEFAULT NULL, CHANGE contact contact VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE adsoyad adsoyad VARCHAR(50) DEFAULT NULL, CHANGE email email VARCHAR(50) DEFAULT NULL, CHANGE sifre sifre VARCHAR(255) DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL, CHANGE create_at create_at DATETIME DEFAULT NULL, CHANGE update_at update_at DATETIME DEFAULT NULL, CHANGE durum durum VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE userssssss (id INT AUTO_INCREMENT NOT NULL, adsoyad VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci, email VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci, sifre VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, image VARCHAR(255) DEFAULT \'usermid.png\' COLLATE utf8mb4_unicode_ci, durum VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, create_at DATETIME DEFAULT CURRENT_TIMESTAMP, update_at DATETIME DEFAULT \'0000-00-00 00:00:00\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE ayarlar CHANGE aboutus aboutus LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE contact contact LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE users CHANGE adsoyad adsoyad VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE email email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE sifre sifre VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE image image VARCHAR(255) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE durum durum VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE create_at create_at DATETIME DEFAULT CURRENT_TIMESTAMP, CHANGE update_at update_at DATETIME DEFAULT \'0000-00-00 00:00:00\'');
    }
}
