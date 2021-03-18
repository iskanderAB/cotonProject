<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210315135731 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, qte_dispo DOUBLE PRECISION DEFAULT NULL, unite_vente DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE association_villagoise (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, rep VARCHAR(255) DEFAULT NULL, adr VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, num_fix BIGINT DEFAULT NULL, mobile BIGINT DEFAULT NULL, fax BIGINT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE besoin (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bordereau_liv (id INT AUTO_INCREMENT NOT NULL, num_bord VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, mod_paie VARCHAR(255) DEFAULT NULL, mod_liv VARCHAR(255) DEFAULT NULL, date_paie DATE DEFAULT NULL, del_liv DATE DEFAULT NULL, taux_rem DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bordereau_reg (id INT AUTO_INCREMENT NOT NULL, num_bor_reg VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, mnt_reg DOUBLE PRECISION DEFAULT NULL, mod_paie VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE canton (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE centre_gest_int (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detail_besoin (id INT AUTO_INCREMENT NOT NULL, qte DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture_globale (id INT AUTO_INCREMENT NOT NULL, num_fact_g VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, mod_paie VARCHAR(255) DEFAULT NULL, date_paie DATE DEFAULT NULL, obs VARCHAR(255) DEFAULT NULL, credit DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture_liv_cot (id INT AUTO_INCREMENT NOT NULL, num_fact_liv VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, mod_paie VARCHAR(255) DEFAULT NULL, mod_liv VARCHAR(255) DEFAULT NULL, date_paie DATE DEFAULT NULL, obs VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture_liv_int (id INT AUTO_INCREMENT NOT NULL, num_fac_liv VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, mod_paie VARCHAR(255) DEFAULT NULL, mod_liv VARCHAR(255) DEFAULT NULL, date_paie DATE DEFAULT NULL, obs VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prix_vente (id INT AUTO_INCREMENT NOT NULL, prix_vente DOUBLE PRECISION DEFAULT NULL, tva DOUBLE PRECISION DEFAULT NULL, detail_besoin VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saison (id INT AUTO_INCREMENT NOT NULL, compagne VARCHAR(255) DEFAULT NULL, date_deb DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, comm VARCHAR(255) DEFAULT NULL, prix_cot DOUBLE PRECISION DEFAULT NULL, tva_cot DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket_pesee (id INT AUTO_INCREMENT NOT NULL, facture_liv_cot_id INT DEFAULT NULL, num_ticket VARCHAR(255) DEFAULT NULL, compagne VARCHAR(255) DEFAULT NULL, num_caisse INT DEFAULT NULL, date_p1 DATE DEFAULT NULL, date_p2 DATE DEFAULT NULL, heure_p1 VARCHAR(255) DEFAULT NULL, heure_p2 VARCHAR(255) DEFAULT NULL, peseur VARCHAR(255) DEFAULT NULL, poids_p1 BIGINT DEFAULT NULL, poids_p2 BIGINT DEFAULT NULL, INDEX IDX_68DDAF546573E3BB (facture_liv_cot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transporteur (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, representant VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, num_fix BIGINT DEFAULT NULL, mobile BIGINT DEFAULT NULL, fax BIGINT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) DEFAULT NULL, role VARCHAR(255) DEFAULT NULL, login VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usine (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, matricule VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ticket_pesee ADD CONSTRAINT FK_68DDAF546573E3BB FOREIGN KEY (facture_liv_cot_id) REFERENCES facture_liv_cot (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket_pesee DROP FOREIGN KEY FK_68DDAF546573E3BB');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE association_villagoise');
        $this->addSql('DROP TABLE besoin');
        $this->addSql('DROP TABLE bordereau_liv');
        $this->addSql('DROP TABLE bordereau_reg');
        $this->addSql('DROP TABLE canton');
        $this->addSql('DROP TABLE centre_gest_int');
        $this->addSql('DROP TABLE detail_besoin');
        $this->addSql('DROP TABLE facture_globale');
        $this->addSql('DROP TABLE facture_liv_cot');
        $this->addSql('DROP TABLE facture_liv_int');
        $this->addSql('DROP TABLE prix_vente');
        $this->addSql('DROP TABLE saison');
        $this->addSql('DROP TABLE ticket_pesee');
        $this->addSql('DROP TABLE transporteur');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE usine');
        $this->addSql('DROP TABLE vehicule');
    }
}
