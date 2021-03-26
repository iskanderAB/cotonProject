<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210322151156 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, qte_dispo DOUBLE PRECISION DEFAULT NULL, unite_vente DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_besoin (article_id INT NOT NULL, besoin_id INT NOT NULL, INDEX IDX_EBDF7F917294869C (article_id), INDEX IDX_EBDF7F91FE6EED44 (besoin_id), PRIMARY KEY(article_id, besoin_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE association_villagoise (id INT AUTO_INCREMENT NOT NULL, facture_globale_id INT DEFAULT NULL, besoin_id INT DEFAULT NULL, bordereau_reg_id INT DEFAULT NULL, ticket_pesee_id INT DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, rep VARCHAR(255) DEFAULT NULL, adr VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, num_fix BIGINT DEFAULT NULL, mobile BIGINT DEFAULT NULL, fax BIGINT DEFAULT NULL, INDEX IDX_F6B784339F8958B0 (facture_globale_id), INDEX IDX_F6B78433FE6EED44 (besoin_id), INDEX IDX_F6B78433F22A89D3 (bordereau_reg_id), INDEX IDX_F6B78433DC094D7B (ticket_pesee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE besoin (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bordereau_liv (id INT AUTO_INCREMENT NOT NULL, besoin_id INT DEFAULT NULL, num_bord VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, mod_paie VARCHAR(255) DEFAULT NULL, mod_liv VARCHAR(255) DEFAULT NULL, date_paie DATE DEFAULT NULL, del_liv DATE DEFAULT NULL, taux_rem DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_49303E85FE6EED44 (besoin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bordereau_reg (id INT AUTO_INCREMENT NOT NULL, num_bor_reg VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, mnt_reg DOUBLE PRECISION DEFAULT NULL, mod_paie VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE canton (id INT AUTO_INCREMENT NOT NULL, centre_gest_int_id INT DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, INDEX IDX_5B9EF92120E0773A (centre_gest_int_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE centre_gest_int (id INT AUTO_INCREMENT NOT NULL, association_villagoise_id INT DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, INDEX IDX_99E6E42A4A86E56F (association_villagoise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detail_besoin (id INT AUTO_INCREMENT NOT NULL, qte DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture_globale (id INT AUTO_INCREMENT NOT NULL, num_fact_g VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, mod_paie VARCHAR(255) DEFAULT NULL, date_paie DATE DEFAULT NULL, obs VARCHAR(255) DEFAULT NULL, credit DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture_liv_cot (id INT AUTO_INCREMENT NOT NULL, num_fact_liv VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, mod_paie VARCHAR(255) DEFAULT NULL, mod_liv VARCHAR(255) DEFAULT NULL, date_paie DATE DEFAULT NULL, obs VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture_liv_int (id INT AUTO_INCREMENT NOT NULL, bordereau_liv_id INT DEFAULT NULL, num_fac_liv VARCHAR(255) DEFAULT NULL, date DATE DEFAULT NULL, mod_paie VARCHAR(255) DEFAULT NULL, mod_liv VARCHAR(255) DEFAULT NULL, date_paie DATE DEFAULT NULL, obs VARCHAR(255) DEFAULT NULL, INDEX IDX_B88A0F1CE6A337C3 (bordereau_liv_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture_liv_int_bordereau_reg (facture_liv_int_id INT NOT NULL, bordereau_reg_id INT NOT NULL, INDEX IDX_3252FF1CF988E96D (facture_liv_int_id), INDEX IDX_3252FF1CF22A89D3 (bordereau_reg_id), PRIMARY KEY(facture_liv_int_id, bordereau_reg_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prix_vente (id INT AUTO_INCREMENT NOT NULL, prix_vente DOUBLE PRECISION DEFAULT NULL, tva DOUBLE PRECISION DEFAULT NULL, detail_besoin VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saison (id INT AUTO_INCREMENT NOT NULL, facture_globale_id INT DEFAULT NULL, ticket_pesee_id INT DEFAULT NULL, bordereau_reg_id INT DEFAULT NULL, compagne VARCHAR(255) DEFAULT NULL, date_deb DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, comm VARCHAR(255) DEFAULT NULL, prix_cot DOUBLE PRECISION DEFAULT NULL, tva_cot DOUBLE PRECISION DEFAULT NULL, INDEX IDX_C0D0D5869F8958B0 (facture_globale_id), INDEX IDX_C0D0D586DC094D7B (ticket_pesee_id), INDEX IDX_C0D0D586F22A89D3 (bordereau_reg_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saison_article (saison_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_E1F6BB50F965414C (saison_id), INDEX IDX_E1F6BB507294869C (article_id), PRIMARY KEY(saison_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket_pesee (id INT AUTO_INCREMENT NOT NULL, facture_liv_cot_id INT DEFAULT NULL, num_ticket VARCHAR(255) DEFAULT NULL, compagne VARCHAR(255) DEFAULT NULL, num_caisse INT DEFAULT NULL, date_p1 DATE DEFAULT NULL, date_p2 DATE DEFAULT NULL, heure_p1 VARCHAR(255) DEFAULT NULL, heure_p2 VARCHAR(255) DEFAULT NULL, peseur VARCHAR(255) DEFAULT NULL, poids_p1 BIGINT DEFAULT NULL, poids_p2 BIGINT DEFAULT NULL, INDEX IDX_68DDAF546573E3BB (facture_liv_cot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transporteur (id INT AUTO_INCREMENT NOT NULL, vehicule_id INT DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, representant VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, num_fix BIGINT DEFAULT NULL, mobile BIGINT DEFAULT NULL, fax BIGINT DEFAULT NULL, INDEX IDX_A25649754A4A3511 (vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) DEFAULT NULL, role VARCHAR(255) DEFAULT NULL, login VARCHAR(255) DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usine (id INT AUTO_INCREMENT NOT NULL, vehicule_id INT DEFAULT NULL, user_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) DEFAULT NULL, INDEX IDX_F3AB4814A4A3511 (vehicule_id), INDEX IDX_F3AB481A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, ticket_pesee_id INT DEFAULT NULL, matricule VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, INDEX IDX_292FFF1DDC094D7B (ticket_pesee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_besoin ADD CONSTRAINT FK_EBDF7F917294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_besoin ADD CONSTRAINT FK_EBDF7F91FE6EED44 FOREIGN KEY (besoin_id) REFERENCES besoin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE association_villagoise ADD CONSTRAINT FK_F6B784339F8958B0 FOREIGN KEY (facture_globale_id) REFERENCES facture_globale (id)');
        $this->addSql('ALTER TABLE association_villagoise ADD CONSTRAINT FK_F6B78433FE6EED44 FOREIGN KEY (besoin_id) REFERENCES besoin (id)');
        $this->addSql('ALTER TABLE association_villagoise ADD CONSTRAINT FK_F6B78433F22A89D3 FOREIGN KEY (bordereau_reg_id) REFERENCES bordereau_reg (id)');
        $this->addSql('ALTER TABLE association_villagoise ADD CONSTRAINT FK_F6B78433DC094D7B FOREIGN KEY (ticket_pesee_id) REFERENCES ticket_pesee (id)');
        $this->addSql('ALTER TABLE bordereau_liv ADD CONSTRAINT FK_49303E85FE6EED44 FOREIGN KEY (besoin_id) REFERENCES besoin (id)');
        $this->addSql('ALTER TABLE canton ADD CONSTRAINT FK_5B9EF92120E0773A FOREIGN KEY (centre_gest_int_id) REFERENCES centre_gest_int (id)');
        $this->addSql('ALTER TABLE centre_gest_int ADD CONSTRAINT FK_99E6E42A4A86E56F FOREIGN KEY (association_villagoise_id) REFERENCES association_villagoise (id)');
        $this->addSql('ALTER TABLE facture_liv_int ADD CONSTRAINT FK_B88A0F1CE6A337C3 FOREIGN KEY (bordereau_liv_id) REFERENCES bordereau_liv (id)');
        $this->addSql('ALTER TABLE facture_liv_int_bordereau_reg ADD CONSTRAINT FK_3252FF1CF988E96D FOREIGN KEY (facture_liv_int_id) REFERENCES facture_liv_int (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE facture_liv_int_bordereau_reg ADD CONSTRAINT FK_3252FF1CF22A89D3 FOREIGN KEY (bordereau_reg_id) REFERENCES bordereau_reg (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE saison ADD CONSTRAINT FK_C0D0D5869F8958B0 FOREIGN KEY (facture_globale_id) REFERENCES facture_globale (id)');
        $this->addSql('ALTER TABLE saison ADD CONSTRAINT FK_C0D0D586DC094D7B FOREIGN KEY (ticket_pesee_id) REFERENCES ticket_pesee (id)');
        $this->addSql('ALTER TABLE saison ADD CONSTRAINT FK_C0D0D586F22A89D3 FOREIGN KEY (bordereau_reg_id) REFERENCES bordereau_reg (id)');
        $this->addSql('ALTER TABLE saison_article ADD CONSTRAINT FK_E1F6BB50F965414C FOREIGN KEY (saison_id) REFERENCES saison (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE saison_article ADD CONSTRAINT FK_E1F6BB507294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ticket_pesee ADD CONSTRAINT FK_68DDAF546573E3BB FOREIGN KEY (facture_liv_cot_id) REFERENCES facture_liv_cot (id)');
        $this->addSql('ALTER TABLE transporteur ADD CONSTRAINT FK_A25649754A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE usine ADD CONSTRAINT FK_F3AB4814A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE usine ADD CONSTRAINT FK_F3AB481A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DDC094D7B FOREIGN KEY (ticket_pesee_id) REFERENCES ticket_pesee (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_besoin DROP FOREIGN KEY FK_EBDF7F917294869C');
        $this->addSql('ALTER TABLE saison_article DROP FOREIGN KEY FK_E1F6BB507294869C');
        $this->addSql('ALTER TABLE centre_gest_int DROP FOREIGN KEY FK_99E6E42A4A86E56F');
        $this->addSql('ALTER TABLE article_besoin DROP FOREIGN KEY FK_EBDF7F91FE6EED44');
        $this->addSql('ALTER TABLE association_villagoise DROP FOREIGN KEY FK_F6B78433FE6EED44');
        $this->addSql('ALTER TABLE bordereau_liv DROP FOREIGN KEY FK_49303E85FE6EED44');
        $this->addSql('ALTER TABLE facture_liv_int DROP FOREIGN KEY FK_B88A0F1CE6A337C3');
        $this->addSql('ALTER TABLE association_villagoise DROP FOREIGN KEY FK_F6B78433F22A89D3');
        $this->addSql('ALTER TABLE facture_liv_int_bordereau_reg DROP FOREIGN KEY FK_3252FF1CF22A89D3');
        $this->addSql('ALTER TABLE saison DROP FOREIGN KEY FK_C0D0D586F22A89D3');
        $this->addSql('ALTER TABLE canton DROP FOREIGN KEY FK_5B9EF92120E0773A');
        $this->addSql('ALTER TABLE association_villagoise DROP FOREIGN KEY FK_F6B784339F8958B0');
        $this->addSql('ALTER TABLE saison DROP FOREIGN KEY FK_C0D0D5869F8958B0');
        $this->addSql('ALTER TABLE ticket_pesee DROP FOREIGN KEY FK_68DDAF546573E3BB');
        $this->addSql('ALTER TABLE facture_liv_int_bordereau_reg DROP FOREIGN KEY FK_3252FF1CF988E96D');
        $this->addSql('ALTER TABLE saison_article DROP FOREIGN KEY FK_E1F6BB50F965414C');
        $this->addSql('ALTER TABLE association_villagoise DROP FOREIGN KEY FK_F6B78433DC094D7B');
        $this->addSql('ALTER TABLE saison DROP FOREIGN KEY FK_C0D0D586DC094D7B');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DDC094D7B');
        $this->addSql('ALTER TABLE usine DROP FOREIGN KEY FK_F3AB481A76ED395');
        $this->addSql('ALTER TABLE transporteur DROP FOREIGN KEY FK_A25649754A4A3511');
        $this->addSql('ALTER TABLE usine DROP FOREIGN KEY FK_F3AB4814A4A3511');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_besoin');
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
        $this->addSql('DROP TABLE facture_liv_int_bordereau_reg');
        $this->addSql('DROP TABLE prix_vente');
        $this->addSql('DROP TABLE saison');
        $this->addSql('DROP TABLE saison_article');
        $this->addSql('DROP TABLE ticket_pesee');
        $this->addSql('DROP TABLE transporteur');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE usine');
        $this->addSql('DROP TABLE vehicule');
    }
}
