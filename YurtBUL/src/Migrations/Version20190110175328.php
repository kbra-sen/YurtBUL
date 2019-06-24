<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190110175328 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ayarlar (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, keywords VARCHAR(255) DEFAULT NULL, company VARCHAR(255) DEFAULT NULL, adress VARCHAR(255) DEFAULT NULL, fax VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, smtpserver VARCHAR(255) DEFAULT NULL, smtpemail VARCHAR(255) DEFAULT NULL, smtppassword VARCHAR(255) DEFAULT NULL, smptport VARCHAR(255) DEFAULT NULL, aboutus VARCHAR(255) DEFAULT NULL, contact VARCHAR(255) DEFAULT NULL, referances VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE ayarlar');
    }
}
