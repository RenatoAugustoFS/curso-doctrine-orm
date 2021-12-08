<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211208142445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Course (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, description VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE course_student (course_id INTEGER NOT NULL, student_id INTEGER NOT NULL, PRIMARY KEY(course_id, student_id))');
        $this->addSql('CREATE INDEX IDX_BFE0AADF591CC992 ON course_student (course_id)');
        $this->addSql('CREATE INDEX IDX_BFE0AADFCB944F1A ON course_student (student_id)');
        $this->addSql('DROP INDEX IDX_858EB8D9CB944F1A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Phone AS SELECT id, student_id, areaCode, number FROM Phone');
        $this->addSql('DROP TABLE Phone');
        $this->addSql('CREATE TABLE Phone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, student_id INTEGER DEFAULT NULL, areaCode VARCHAR(255) NOT NULL COLLATE BINARY, number VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_858EB8D9CB944F1A FOREIGN KEY (student_id) REFERENCES Student (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO Phone (id, student_id, areaCode, number) SELECT id, student_id, areaCode, number FROM __temp__Phone');
        $this->addSql('DROP TABLE __temp__Phone');
        $this->addSql('CREATE INDEX IDX_858EB8D9CB944F1A ON Phone (student_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE Course');
        $this->addSql('DROP TABLE course_student');
        $this->addSql('DROP INDEX IDX_858EB8D9CB944F1A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__Phone AS SELECT id, student_id, areaCode, number FROM Phone');
        $this->addSql('DROP TABLE Phone');
        $this->addSql('CREATE TABLE Phone (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, student_id INTEGER DEFAULT NULL, areaCode VARCHAR(255) NOT NULL, number VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO Phone (id, student_id, areaCode, number) SELECT id, student_id, areaCode, number FROM __temp__Phone');
        $this->addSql('DROP TABLE __temp__Phone');
        $this->addSql('CREATE INDEX IDX_858EB8D9CB944F1A ON Phone (student_id)');
    }
}
