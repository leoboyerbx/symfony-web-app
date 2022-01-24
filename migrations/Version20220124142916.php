<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220124142916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_D4E6F8185E73F45');
        $this->addSql('CREATE TEMPORARY TABLE __temp__address AS SELECT id, county_id, line1, line2, city, zipcode FROM address');
        $this->addSql('DROP TABLE address');
        $this->addSql('CREATE TABLE address (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, county_id INTEGER NOT NULL, line1 VARCHAR(255) NOT NULL COLLATE BINARY, line2 VARCHAR(255) DEFAULT NULL COLLATE BINARY, city VARCHAR(255) NOT NULL COLLATE BINARY, zipcode VARCHAR(10) NOT NULL COLLATE BINARY, CONSTRAINT FK_D4E6F8185E73F45 FOREIGN KEY (county_id) REFERENCES county (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO address (id, county_id, line1, line2, city, zipcode) SELECT id, county_id, line1, line2, city, zipcode FROM __temp__address');
        $this->addSql('DROP TABLE __temp__address');
        $this->addSql('CREATE INDEX IDX_D4E6F8185E73F45 ON address (county_id)');
        $this->addSql('DROP INDEX IDX_58E2FF25F92F3E70');
        $this->addSql('CREATE TEMPORARY TABLE __temp__county AS SELECT id, country_id, name FROM county');
        $this->addSql('DROP TABLE county');
        $this->addSql('CREATE TABLE county (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, country_id INTEGER NOT NULL, name VARCHAR(100) NOT NULL COLLATE BINARY, CONSTRAINT FK_58E2FF25F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO county (id, country_id, name) SELECT id, country_id, name FROM __temp__county');
        $this->addSql('DROP TABLE __temp__county');
        $this->addSql('CREATE INDEX IDX_58E2FF25F92F3E70 ON county (country_id)');
        $this->addSql('DROP INDEX IDX_75EA56E016BA31DB');
        $this->addSql('DROP INDEX IDX_75EA56E0E3BD61CE');
        $this->addSql('DROP INDEX IDX_75EA56E0FB7336F0');
        $this->addSql('CREATE TEMPORARY TABLE __temp__messenger_messages AS SELECT id, body, headers, queue_name, created_at, available_at, delivered_at FROM messenger_messages');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL COLLATE BINARY, headers CLOB NOT NULL COLLATE BINARY, queue_name VARCHAR(255) NOT NULL COLLATE BINARY, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO messenger_messages (id, body, headers, queue_name, created_at, available_at, delivered_at) SELECT id, body, headers, queue_name, created_at, available_at, delivered_at FROM __temp__messenger_messages');
        $this->addSql('DROP TABLE __temp__messenger_messages');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_D4E6F8185E73F45');
        $this->addSql('CREATE TEMPORARY TABLE __temp__address AS SELECT id, county_id, line1, line2, city, zipcode FROM address');
        $this->addSql('DROP TABLE address');
        $this->addSql('CREATE TABLE address (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, county_id INTEGER NOT NULL, line1 VARCHAR(255) NOT NULL, line2 VARCHAR(255) DEFAULT NULL, city VARCHAR(255) NOT NULL, zipcode VARCHAR(10) NOT NULL)');
        $this->addSql('INSERT INTO address (id, county_id, line1, line2, city, zipcode) SELECT id, county_id, line1, line2, city, zipcode FROM __temp__address');
        $this->addSql('DROP TABLE __temp__address');
        $this->addSql('CREATE INDEX IDX_D4E6F8185E73F45 ON address (county_id)');
        $this->addSql('DROP INDEX IDX_58E2FF25F92F3E70');
        $this->addSql('CREATE TEMPORARY TABLE __temp__county AS SELECT id, country_id, name FROM county');
        $this->addSql('DROP TABLE county');
        $this->addSql('CREATE TABLE county (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, country_id INTEGER NOT NULL, name VARCHAR(100) NOT NULL)');
        $this->addSql('INSERT INTO county (id, country_id, name) SELECT id, country_id, name FROM __temp__county');
        $this->addSql('DROP TABLE __temp__county');
        $this->addSql('CREATE INDEX IDX_58E2FF25F92F3E70 ON county (country_id)');
    }
}
