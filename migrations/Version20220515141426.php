<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220515141426 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE configuration (id INT AUTO_INCREMENT NOT NULL, processeur_id INT DEFAULT NULL, carte_mere_id INT DEFAULT NULL, ram_id INT DEFAULT NULL, alimentation_id INT DEFAULT NULL, carte_graphique_id INT DEFAULT NULL, stockage_id INT DEFAULT NULL, INDEX IDX_A5E2A5D75C9BE5AD (processeur_id), INDEX IDX_A5E2A5D768162054 (carte_mere_id), INDEX IDX_A5E2A5D73366068 (ram_id), INDEX IDX_A5E2A5D78441D4D9 (alimentation_id), INDEX IDX_A5E2A5D721E1B659 (carte_graphique_id), INDEX IDX_A5E2A5D7DAA83D7F (stockage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D75C9BE5AD FOREIGN KEY (processeur_id) REFERENCES processeur (id)');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D768162054 FOREIGN KEY (carte_mere_id) REFERENCES carte_mere (id)');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D73366068 FOREIGN KEY (ram_id) REFERENCES ram (id)');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D78441D4D9 FOREIGN KEY (alimentation_id) REFERENCES alimentation (id)');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D721E1B659 FOREIGN KEY (carte_graphique_id) REFERENCES cartegraphique (id)');
        $this->addSql('ALTER TABLE configuration ADD CONSTRAINT FK_A5E2A5D7DAA83D7F FOREIGN KEY (stockage_id) REFERENCES stockage (id)');
        $this->addSql('DROP TABLE ventirad');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ventirad (id INT AUTO_INCREMENT NOT NULL, socket_id INT NOT NULL, fabricant_id INT NOT NULL, nom_ventirad VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, taille INT NOT NULL, refroidissement_max INT NOT NULL, prix_ventirad NUMERIC(15, 2) NOT NULL, INDEX IDX_CF5DF709CBAAAAB3 (fabricant_id), INDEX IDX_CF5DF709D20E239C (socket_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE configuration');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
    }
}
