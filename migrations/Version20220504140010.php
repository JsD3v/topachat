<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220504140010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alimentation (id INT AUTO_INCREMENT NOT NULL, nom_alimentation VARCHAR(255) NOT NULL, voltage INT NOT NULL, watt INT NOT NULL, nombre_connecteur INT NOT NULL, prix_alimentation NUMERIC(15, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cartegraphique (id INT AUTO_INCREMENT NOT NULL, nom_carte_graphique VARCHAR(255) NOT NULL, benchmark INT NOT NULL, technologie VARCHAR(50) NOT NULL, vram INT NOT NULL, generation VARCHAR(50) NOT NULL, consommation_carte_graphique INT NOT NULL, prix_carte_graphique NUMERIC(15, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE certification (id INT AUTO_INCREMENT NOT NULL, nom_certification VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chipset (id INT AUTO_INCREMENT NOT NULL, nom_chipset VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, date_achat DATE NOT NULL, adresse_ville VARCHAR(255) NOT NULL, adresse_rue VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE connecteur (id INT AUTO_INCREMENT NOT NULL, nom_connecteur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE connecteur_carte_mere (id INT AUTO_INCREMENT NOT NULL, nombre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fabricant (id INT AUTO_INCREMENT NOT NULL, nom_fabricant VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modularite (id INT AUTO_INCREMENT NOT NULL, nom_modularite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE socket (id INT AUTO_INCREMENT NOT NULL, nom_socket VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stockage (id INT AUTO_INCREMENT NOT NULL, nom_stockage VARCHAR(255) NOT NULL, capacite INT NOT NULL, ssd TINYINT(1) DEFAULT NULL, hdd TINYINT(1) DEFAULT NULL, prix_stockage NUMERIC(15, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64919EB6921 ON user (client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64919EB6921');
        $this->addSql('DROP TABLE alimentation');
        $this->addSql('DROP TABLE cartegraphique');
        $this->addSql('DROP TABLE certification');
        $this->addSql('DROP TABLE chipset');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE connecteur');
        $this->addSql('DROP TABLE connecteur_carte_mere');
        $this->addSql('DROP TABLE fabricant');
        $this->addSql('DROP TABLE modularite');
        $this->addSql('DROP TABLE socket');
        $this->addSql('DROP TABLE stockage');
        $this->addSql('DROP INDEX UNIQ_8D93D64919EB6921 ON user');
        $this->addSql('ALTER TABLE user DROP client_id');
    }
}
