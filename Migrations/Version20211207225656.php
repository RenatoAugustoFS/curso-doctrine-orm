<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211207225656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Phone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, student_id INTEGER DEFAULT NULL, areaCode VARCHAR(255) NOT NULL, number VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_858EB8D9CB944F1A ON Phone (student_id)');
        $this->addSql('CREATE TABLE Student (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE Phone');
        $this->addSql('DROP TABLE Student');
    }
}
