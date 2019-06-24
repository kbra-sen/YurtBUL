<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190117130537 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE favorilerim ADD userid INT DEFAULT NULL, ADD yurtid INT DEFAULT NULL, DROP title, DROP fiyat, DROP sehir, DROP ilce, DROP webpage');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE favorilerim ADD title VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD fiyat DOUBLE PRECISION DEFAULT NULL, ADD sehir VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD ilce VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD webpage VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP userid, DROP yurtid');
    }
}
