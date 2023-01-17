<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230117004754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gender CHANGE gender_value gender_value INT NOT NULL');
        $this->addSql('ALTER TABLE school_class DROP head_teatcher_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gender CHANGE gender_value gender_value VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE school_class ADD head_teatcher_id INT NOT NULL');
    }
}
