<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230117204632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE grade ADD student_rating_id INT NOT NULL');
        $this->addSql('ALTER TABLE grade ADD CONSTRAINT FK_595AAE346D5C2E46 FOREIGN KEY (student_rating_id) REFERENCES student (id)');
        $this->addSql('CREATE INDEX IDX_595AAE346D5C2E46 ON grade (student_rating_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE grade DROP FOREIGN KEY FK_595AAE346D5C2E46');
        $this->addSql('DROP INDEX IDX_595AAE346D5C2E46 ON grade');
        $this->addSql('ALTER TABLE grade DROP student_rating_id');
    }
}
