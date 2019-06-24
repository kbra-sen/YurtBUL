<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181214201227 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE yurt (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, yursahibid INT DEFAULT NULL, adres VARCHAR(255) DEFAULT NULL, sehirid VARCHAR(255) DEFAULT NULL, ilce VARCHAR(255) DEFAULT NULL, telefon VARCHAR(255) DEFAULT NULL, tipid INT DEFAULT NULL, turid INT DEFAULT NULL, yil VARCHAR(255) DEFAULT NULL, fiyat DOUBLE PRECISION DEFAULT NULL, webpage VARCHAR(255) DEFAULT NULL, aciklama LONGTEXT DEFAULT NULL, durum VARCHAR(255) DEFAULT NULL, keyword VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user CHANGE adsoyad adsoyad VARCHAR(50) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE sifre sifre VARCHAR(255) NOT NULL, CHANGE image image VARCHAR(255) NOT NULL, CHANGE create_at create_at DATETIME NOT NULL, CHANGE update_at update_at DATETIME NOT NULL, CHANGE durum durum VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE yurt');
        $this->addSql('ALTER TABLE user CHANGE adsoyad adsoyad VARCHAR(50) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE email email VARCHAR(255) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE sifre sifre VARCHAR(255) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE image image VARCHAR(255) DEFAULT \'usermid.png\' NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE create_at create_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE update_at update_at DATETIME DEFAULT NULL, CHANGE durum durum VARCHAR(255) DEFAULT \'false\' NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
