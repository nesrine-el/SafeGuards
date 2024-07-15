<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240715114702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE earthquake ADD _id INT NOT NULL, CHANGE time time VARCHAR(24) DEFAULT NULL, CHANGE latitude latitude VARCHAR(18) DEFAULT NULL, CHANGE longitude longitude VARCHAR(19) DEFAULT NULL, CHANGE depth depth VARCHAR(20) DEFAULT NULL, CHANGE mag mag VARCHAR(20) DEFAULT NULL, CHANGE mag_type mag_type VARCHAR(5) DEFAULT NULL, CHANGE nst nst VARCHAR(3) DEFAULT NULL, CHANGE gap gap VARCHAR(18) DEFAULT NULL, CHANGE dmin dmin VARCHAR(13) DEFAULT NULL, CHANGE place place VARCHAR(66) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE earthquake DROP _id, CHANGE time time VARCHAR(255) NOT NULL, CHANGE latitude latitude VARCHAR(255) NOT NULL, CHANGE longitude longitude VARCHAR(255) NOT NULL, CHANGE depth depth VARCHAR(255) NOT NULL, CHANGE mag mag VARCHAR(255) NOT NULL, CHANGE mag_type mag_type VARCHAR(255) DEFAULT NULL, CHANGE nst nst VARCHAR(255) DEFAULT NULL, CHANGE gap gap VARCHAR(255) DEFAULT NULL, CHANGE dmin dmin VARCHAR(255) DEFAULT NULL, CHANGE place place VARCHAR(66) NOT NULL');
    }
}
