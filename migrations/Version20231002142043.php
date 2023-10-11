<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231002142043 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE detail_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE produit_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE detail (id INT NOT NULL, numcom_id INT NOT NULL, num_produit_id INT NOT NULL, qcom NUMERIC(8, 0) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2E067F93B93752DD ON detail (numcom_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2E067F9380233E70 ON detail (num_produit_id)');
        $this->addSql('CREATE TABLE produit (id INT NOT NULL, npro VARCHAR(15) NOT NULL, libelle VARCHAR(60) NOT NULL, prix NUMERIC(6, 0) NOT NULL, qstock NUMERIC(8, 0) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F93B93752DD FOREIGN KEY (numcom_id) REFERENCES commande (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE detail ADD CONSTRAINT FK_2E067F9380233E70 FOREIGN KEY (num_produit_id) REFERENCES produit (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE detail_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE produit_id_seq CASCADE');
        $this->addSql('ALTER TABLE detail DROP CONSTRAINT FK_2E067F93B93752DD');
        $this->addSql('ALTER TABLE detail DROP CONSTRAINT FK_2E067F9380233E70');
        $this->addSql('DROP TABLE detail');
        $this->addSql('DROP TABLE produit');
    }
}
