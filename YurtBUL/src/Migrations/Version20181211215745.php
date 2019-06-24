<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181211215745 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user CHANGE adsoyad adsoyad VARCHAR(50) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE sifre sifre VARCHAR(255) NOT NULL, CHANGE image image VARCHAR(255) NOT NULL, CHANGE durum durum VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE yurt_sahibi DROP create_at, DROP update_at');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user CHANGE adsoyad adsoyad VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE email email VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE sifre sifre VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE image image VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE durum durum VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE yurt_sahibi ADD create_at DATETIME DEFAULT CURRENT_TIMESTAMP, ADD update_at DATETIME DEFAULT NULL');
    }
}
