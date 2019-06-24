<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190115184240 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ayarlar CHANGE aboutus aboutus VARCHAR(255) DEFAULT NULL, CHANGE contact contact VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD image VARCHAR(255) DEFAULT NULL, CHANGE roles roles VARCHAR(40) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ayarlar CHANGE aboutus aboutus LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE contact contact LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user DROP image, CHANGE roles roles VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
