<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220503113313 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alimentation (id INT AUTO_INCREMENT NOT NULL, modularite_id INT NOT NULL, fabricant_id INT NOT NULL, certification_id INT NOT NULL, nom_alimentation VARCHAR(255) NOT NULL, voltage INT NOT NULL, watt INT NOT NULL, nombre_connecteur INT NOT NULL, prix_alimentation NUMERIC(15, 2) NOT NULL, INDEX IDX_8E65DFA087B0B4A4 (modularite_id), INDEX IDX_8E65DFA0CBAAAAB3 (fabricant_id), INDEX IDX_8E65DFA0CB47068A (certification_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carte_graphique (id INT AUTO_INCREMENT NOT NULL, connecteur_id INT NOT NULL, fabricant_id INT NOT NULL, nom_carte_graphique VARCHAR(255) NOT NULL, benchmark INT NOT NULL, technologie VARCHAR(50) NOT NULL, vram INT NOT NULL, generation VARCHAR(50) NOT NULL, consomation_carte_graphique INT NOT NULL, prix_carte_graphique NUMERIC(15, 2) NOT NULL, INDEX IDX_246178CF4A8D987E (connecteur_id), INDEX IDX_246178CFCBAAAAB3 (fabricant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carte_mere (id INT AUTO_INCREMENT NOT NULL, chipset_id INT NOT NULL, fabricant_id INT NOT NULL, nom_carte_mere VARCHAR(255) NOT NULL, memoire_max VARCHAR(50) NOT NULL, wifi TINYINT(1) DEFAULT NULL, rj45 TINYINT(1) DEFAULT NULL, voltage VARCHAR(50) NOT NULL, prix_carte_mere NUMERIC(15, 2) NOT NULL, INDEX IDX_21EB4E72BC1433B9 (chipset_id), INDEX IDX_21EB4E72CBAAAAB3 (fabricant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE certification (id INT AUTO_INCREMENT NOT NULL, nom_certification VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chipset (id INT AUTO_INCREMENT NOT NULL, nom_chipset VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, date_achat DATE NOT NULL, adresse_ville VARCHAR(255) NOT NULL, adresse_rue VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE configuration (id INT AUTO_INCREMENT NOT NULL, carte_mere_id INT NOT NULL, processeur_id INT NOT NULL, ram_id INT NOT NULL, alimentation_id INT NOT NULL, carte_graphique_id INT NOT NULL, stockage_id INT NOT NULL, ventirad_id INT NOT NULL, INDEX IDX_A5E2A5D768162054 (carte_mere_id), INDEX IDX_A5E2A5D75C9BE5AD (processeur_id), INDEX IDX_A5E2A5D73366068 (ram_id), INDEX IDX_A5E2A5D78441D4D9 (alimentation_id), INDEX IDX_A5E2A5D721E1B659 (carte_graphique_id), INDEX IDX_A5E2A5D7DAA83D7F (stockage_id), INDEX IDX_A5E2A5D727B7A443 (ventirad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE connecteur (id INT AUTO_INCREMENT NOT NULL, nom_connecteur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE connecteur_carte_mere (id INT AUTO_INCREMENT NOT NULL, carte_mere_id INT NOT NULL, connecteur_id INT NOT NULL, nombre INT NOT NULL, INDEX IDX_5EAEFA6868162054 (carte_mere_id), INDEX IDX_5EAEFA684A8D987E (connecteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fabricant (id INT AUTO_INCREMENT NOT NULL, nom_fabricant VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modularite (id INT AUTO_INCREMENT NOT NULL, nom_modularite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE processeur (id INT AUTO_INCREMENT NOT NULL, fabricant_id INT NOT NULL, nom_processeur VARCHAR(255) NOT NULL, nombre_de_coeur INT NOT NULL, memoire_cache INT NOT NULL, vitesse_horloge_processeur NUMERIC(5, 2) NOT NULL, generation VARCHAR(255) NOT NULL, overcloking NUMERIC(15, 2) NOT NULL, consommation_processeur INT NOT NULL, prix_processeur NUMERIC(15, 2) NOT NULL, INDEX IDX_459D7D3ECBAAAAB3 (fabricant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE processeur_chipset (processeur_id INT NOT NULL, chipset_id INT NOT NULL, INDEX IDX_7D868E225C9BE5AD (processeur_id), INDEX IDX_7D868E22BC1433B9 (chipset_id), PRIMARY KEY(processeur_id, chipset_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ram (id INT AUTO_INCREMENT NOT NULL, fabricant_id INT NOT NULL, nom_ram VARCHAR(255) NOT NULL, quantite INT NOT NULL, vitesse_horloge_ram INT NOT NULL, type_de_memoire_ram VARCHAR(255) NOT NULL, prix_ram NUMERIC(15, 2) NOT NULL, INDEX IDX_E7D1222FCBAAAAB3 (fabricant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE socket (id INT AUTO_INCREMENT NOT NULL, nom_socket VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE socket_chipset (socket_id INT NOT NULL, chipset_id INT NOT NULL, INDEX IDX_EC396110D20E239C (socket_id), INDEX IDX_EC396110BC1433B9 (chipset_id), PRIMARY KEY(socket_id, chipset_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stockage (id INT AUTO_INCREMENT NOT NULL, fabricant_id INT NOT NULL, connecteur_id INT NOT NULL, nom_stockage VARCHAR(255) NOT NULL, capacite INT NOT NULL, ssd TINYINT(1) DEFAULT NULL, hdd TINYINT(1) DEFAULT NULL, prix_stockage NUMERIC(15, 2) NOT NULL, INDEX IDX_CABCB492CBAAAAB3 (fabricant_id), INDEX IDX_CABCB4924A8D987E (connecteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ventirad (id INT AUTO_INCREMENT NOT NULL, socket_id INT NOT NULL, fabricant_id INT NOT NULL, nom_ventirad VARCHAR(255) NOT NULL, taille INT NOT NULL, refroidissement_max INT NOT NULL, prix_ventirad NUMERIC(15, 2) NOT NULL, INDEX IDX_CF5DF709D20E239C (socket_id), INDEX IDX_CF5DF709CBAAAAB3 (fabricant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alimentation ADD CONSTRAINT FK_8E65DFA087B0B4A4 FOREIGN KEY (modularite_id) REFERENCES modularite (id)');
        $this->addSql('ALTER TABLE alimentation ADD CONSTRAINT FK_8E65DFA0CBAAAAB3 FOREIGN KEY (fabricant_id) REFERENCES fabricant (id)');
        $this->addSql('ALTER TABLE alimentation ADD CONSTRAINT FK_8E65DFA0CB47068A FOREIGN KEY (certification_id) REFERENCES certification (id)');
        $this->addSql('ALTER TABLE carte_graphique ADD CONSTRAINT FK_246178CF4A8D987E FOREIGN KEY (connecteur_id) REFERENCES connecteur (id)');
        $this->addSql('ALTER TABLE carte_graphique ADD CONSTRAINT FK_246178CFCBAAAAB3 FOREIGN KEY (fabricant_id) REFERENCES fabricant (id)');
        $this->addSql('ALTER TABLE carte_mere ADD CONSTRAINT FK_21EB4E72BC1433B9 FOREIGN KEY (chipset_id) REFERENCES chipset (id)');
        $this->addSql('ALTER TABLE carte_mere ADD CONSTRAINT FK_21EB4E72CBAAAAB3 FOREIGN KEY (fabricant_id) REFERENCES fabricant (id)');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D768162054 FOREIGN KEY (carte_mere_id) REFERENCES carte_mere (id)');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D75C9BE5AD FOREIGN KEY (processeur_id) REFERENCES processeur (id)');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D73366068 FOREIGN KEY (ram_id) REFERENCES ram (id)');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D78441D4D9 FOREIGN KEY (alimentation_id) REFERENCES alimentation (id)');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D721E1B659 FOREIGN KEY (carte_graphique_id) REFERENCES carte_graphique (id)');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D7DAA83D7F FOREIGN KEY (stockage_id) REFERENCES stockage (id)');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D727B7A443 FOREIGN KEY (ventirad_id) REFERENCES ventirad (id)');
        $this->addSql('ALTER TABLE connecteur_carte_mere ADD CONSTRAINT FK_5EAEFA6868162054 FOREIGN KEY (carte_mere_id) REFERENCES carte_mere (id)');
        $this->addSql('ALTER TABLE connecteur_carte_mere ADD CONSTRAINT FK_5EAEFA684A8D987E FOREIGN KEY (connecteur_id) REFERENCES connecteur (id)');
        $this->addSql('ALTER TABLE processeur ADD CONSTRAINT FK_459D7D3ECBAAAAB3 FOREIGN KEY (fabricant_id) REFERENCES fabricant (id)');
        $this->addSql('ALTER TABLE processeur_chipset ADD CONSTRAINT FK_7D868E225C9BE5AD FOREIGN KEY (processeur_id) REFERENCES processeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE processeur_chipset ADD CONSTRAINT FK_7D868E22BC1433B9 FOREIGN KEY (chipset_id) REFERENCES chipset (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ram ADD CONSTRAINT FK_E7D1222FCBAAAAB3 FOREIGN KEY (fabricant_id) REFERENCES fabricant (id)');
        $this->addSql('ALTER TABLE socket_chipset ADD CONSTRAINT FK_EC396110D20E239C FOREIGN KEY (socket_id) REFERENCES socket (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE socket_chipset ADD CONSTRAINT FK_EC396110BC1433B9 FOREIGN KEY (chipset_id) REFERENCES chipset (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stockage ADD CONSTRAINT FK_CABCB492CBAAAAB3 FOREIGN KEY (fabricant_id) REFERENCES fabricant (id)');
        $this->addSql('ALTER TABLE stockage ADD CONSTRAINT FK_CABCB4924A8D987E FOREIGN KEY (connecteur_id) REFERENCES connecteur (id)');
        $this->addSql('ALTER TABLE ventirad ADD CONSTRAINT FK_CF5DF709D20E239C FOREIGN KEY (socket_id) REFERENCES socket (id)');
        $this->addSql('ALTER TABLE ventirad ADD CONSTRAINT FK_CF5DF709CBAAAAB3 FOREIGN KEY (fabricant_id) REFERENCES fabricant (id)');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE configuration DROP FOREIGN KEY FK_A5E2A5D78441D4D9');
        $this->addSql('ALTER TABLE configuration DROP FOREIGN KEY FK_A5E2A5D721E1B659');
        $this->addSql('ALTER TABLE configuration DROP FOREIGN KEY FK_A5E2A5D768162054');
        $this->addSql('ALTER TABLE connecteur_carte_mere DROP FOREIGN KEY FK_5EAEFA6868162054');
        $this->addSql('ALTER TABLE alimentation DROP FOREIGN KEY FK_8E65DFA0CB47068A');
        $this->addSql('ALTER TABLE carte_mere DROP FOREIGN KEY FK_21EB4E72BC1433B9');
        $this->addSql('ALTER TABLE processeur_chipset DROP FOREIGN KEY FK_7D868E22BC1433B9');
        $this->addSql('ALTER TABLE socket_chipset DROP FOREIGN KEY FK_EC396110BC1433B9');
        $this->addSql('ALTER TABLE carte_graphique DROP FOREIGN KEY FK_246178CF4A8D987E');
        $this->addSql('ALTER TABLE connecteur_carte_mere DROP FOREIGN KEY FK_5EAEFA684A8D987E');
        $this->addSql('ALTER TABLE stockage DROP FOREIGN KEY FK_CABCB4924A8D987E');
        $this->addSql('ALTER TABLE alimentation DROP FOREIGN KEY FK_8E65DFA0CBAAAAB3');
        $this->addSql('ALTER TABLE carte_graphique DROP FOREIGN KEY FK_246178CFCBAAAAB3');
        $this->addSql('ALTER TABLE carte_mere DROP FOREIGN KEY FK_21EB4E72CBAAAAB3');
        $this->addSql('ALTER TABLE processeur DROP FOREIGN KEY FK_459D7D3ECBAAAAB3');
        $this->addSql('ALTER TABLE ram DROP FOREIGN KEY FK_E7D1222FCBAAAAB3');
        $this->addSql('ALTER TABLE stockage DROP FOREIGN KEY FK_CABCB492CBAAAAB3');
        $this->addSql('ALTER TABLE ventirad DROP FOREIGN KEY FK_CF5DF709CBAAAAB3');
        $this->addSql('ALTER TABLE alimentation DROP FOREIGN KEY FK_8E65DFA087B0B4A4');
        $this->addSql('ALTER TABLE configuration DROP FOREIGN KEY FK_A5E2A5D75C9BE5AD');
        $this->addSql('ALTER TABLE processeur_chipset DROP FOREIGN KEY FK_7D868E225C9BE5AD');
        $this->addSql('ALTER TABLE configuration DROP FOREIGN KEY FK_A5E2A5D73366068');
        $this->addSql('ALTER TABLE socket_chipset DROP FOREIGN KEY FK_EC396110D20E239C');
        $this->addSql('ALTER TABLE ventirad DROP FOREIGN KEY FK_CF5DF709D20E239C');
        $this->addSql('ALTER TABLE configuration DROP FOREIGN KEY FK_A5E2A5D7DAA83D7F');
        $this->addSql('ALTER TABLE configuration DROP FOREIGN KEY FK_A5E2A5D727B7A443');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, telephone VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, message LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles JSON NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE alimentation');
        $this->addSql('DROP TABLE carte_graphique');
        $this->addSql('DROP TABLE carte_mere');
        $this->addSql('DROP TABLE certification');
        $this->addSql('DROP TABLE chipset');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE configuration');
        $this->addSql('DROP TABLE connecteur');
        $this->addSql('DROP TABLE connecteur_carte_mere');
        $this->addSql('DROP TABLE fabricant');
        $this->addSql('DROP TABLE modularite');
        $this->addSql('DROP TABLE processeur');
        $this->addSql('DROP TABLE processeur_chipset');
        $this->addSql('DROP TABLE ram');
        $this->addSql('DROP TABLE socket');
        $this->addSql('DROP TABLE socket_chipset');
        $this->addSql('DROP TABLE stockage');
        $this->addSql('DROP TABLE ventirad');
    }
}
