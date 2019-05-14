<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190513093751 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blogs_translations CHANGE object_id object_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE roles roles JSON NOT NULL, CHANGE username username VARCHAR(180) DEFAULT NULL');
        $this->addSql('ALTER TABLE ext_categories ADD parent_id INT DEFAULT NULL, CHANGE root root INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ext_categories ADD CONSTRAINT FK_2C418A1D727ACA70 FOREIGN KEY (parent_id) REFERENCES ext_categories (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_2C418A1D727ACA70 ON ext_categories (parent_id)');
        $this->addSql('ALTER TABLE category_translations CHANGE object_id object_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blogs_translations CHANGE object_id object_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category_translations CHANGE object_id object_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ext_categories DROP FOREIGN KEY FK_2C418A1D727ACA70');
        $this->addSql('DROP INDEX IDX_2C418A1D727ACA70 ON ext_categories');
        $this->addSql('ALTER TABLE ext_categories DROP parent_id, CHANGE root root INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin, CHANGE username username VARCHAR(180) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
