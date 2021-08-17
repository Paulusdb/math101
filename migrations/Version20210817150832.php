<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210817150832 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE practice_results (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, topic VARCHAR(255) NOT NULL, sub_topic VARCHAR(255) NOT NULL, exercise_quantity INT NOT NULL, amount_good INT DEFAULT NULL, amount_wrong INT DEFAULT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test_results (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, topic VARCHAR(255) NOT NULL, grade NUMERIC(3, 1) NOT NULL, amount_good INT DEFAULT NULL, amount_wrong INT DEFAULT NULL, time_spend TIME DEFAULT NULL, date_time DATETIME NOT NULL, amount_add INT DEFAULT NULL, amount_wrong_add INT DEFAULT NULL, amount_subtract INT DEFAULT NULL, amount_wrong_subtract INT DEFAULT NULL, amount_multiply INT DEFAULT NULL, amount_wrong_multiply INT DEFAULT NULL, amount_divide INT DEFAULT NULL, amount_wrong_divide INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD user_type VARCHAR(255) NOT NULL, ADD class VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE practice_results');
        $this->addSql('DROP TABLE test_results');
        $this->addSql('ALTER TABLE user DROP user_type, DROP class');
    }
}
