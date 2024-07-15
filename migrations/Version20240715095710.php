<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240715095710 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE earthquake (id INT AUTO_INCREMENT NOT NULL, time VARCHAR(255) NOT NULL, latitude VARCHAR(255) NOT NULL, longitude VARCHAR(255) NOT NULL, depth VARCHAR(255) NOT NULL, mag VARCHAR(255) NOT NULL, mag_type VARCHAR(255) DEFAULT NULL, nst VARCHAR(255) DEFAULT NULL, gap VARCHAR(255) DEFAULT NULL, dmin VARCHAR(255) DEFAULT NULL, rms NUMERIC(11, 10) DEFAULT NULL, net VARCHAR(2) DEFAULT NULL, updated VARCHAR(24) DEFAULT NULL, place VARCHAR(66) NOT NULL, horizontal_error VARCHAR(19) DEFAULT NULL, depth_error VARCHAR(19) DEFAULT NULL, mag_error VARCHAR(21) DEFAULT NULL, mag_nst VARCHAR(3) DEFAULT NULL, location_source VARCHAR(2) DEFAULT NULL, mag_source VARCHAR(2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE earthquake');
    }
}
