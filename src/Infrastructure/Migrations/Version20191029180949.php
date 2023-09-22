<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191029180949 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE clients (uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid_client)\', first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shipping_address (uuid CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid_address)\', client_uuid CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid_client)\', country VARCHAR(150) NOT NULL, city VARCHAR(150) NOT NULL, street VARCHAR(150) NOT NULL, zip_code VARCHAR(150) NOT NULL, is_default VARCHAR(150) NOT NULL, INDEX IDX_EB066945E393C4 (client_uuid), PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE shipping_address ADD CONSTRAINT FK_EB066945E393C4 FOREIGN KEY (client_uuid) REFERENCES clients (uuid)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shipping_address DROP FOREIGN KEY FK_EB066945E393C4');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE shipping_address');
    }
}
