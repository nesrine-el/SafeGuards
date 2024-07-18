<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240718113415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE earthquake (id INT AUTO_INCREMENT NOT NULL, time VARCHAR(255) NOT NULL, latitude VARCHAR(255) NOT NULL, idToken VARCHAR(255) NOT NULL, longitude VARCHAR(255) NOT NULL, depth VARCHAR(255) NOT NULL, mag VARCHAR(255) NOT NULL, magType VARCHAR(255) DEFAULT NULL, nst VARCHAR(255) DEFAULT NULL, gap VARCHAR(255) DEFAULT NULL, dmin VARCHAR(255) DEFAULT NULL, rms NUMERIC(11, 10) DEFAULT NULL, net VARCHAR(2) DEFAULT NULL, updated VARCHAR(24) DEFAULT NULL, place VARCHAR(66) NOT NULL, horizontalError VARCHAR(19) DEFAULT NULL, depthError VARCHAR(19) DEFAULT NULL, magError VARCHAR(21) DEFAULT NULL, magNst VARCHAR(3) DEFAULT NULL, locationSource VARCHAR(2) DEFAULT NULL, magSource VARCHAR(2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE significants_1900_2023');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE significants_1900_2023 (Time VARCHAR(24) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, Place VARCHAR(67) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, Latitude NUMERIC(11, 8) DEFAULT NULL, Longitude NUMERIC(11, 7) DEFAULT NULL, Depth VARCHAR(6) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, Mag NUMERIC(3, 2) DEFAULT NULL, MagType VARCHAR(5) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, nst VARCHAR(3) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, gap VARCHAR(10) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, dmin VARCHAR(9) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, rms VARCHAR(5) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, net VARCHAR(9) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, horizontalError VARCHAR(4) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, depthError VARCHAR(5) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, magError VARCHAR(10) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, magNst VARCHAR(3) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('DROP TABLE earthquake');
    }
}
