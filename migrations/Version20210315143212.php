<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210315143212 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article_besoin (article_id INT NOT NULL, besoin_id INT NOT NULL, INDEX IDX_EBDF7F917294869C (article_id), INDEX IDX_EBDF7F91FE6EED44 (besoin_id), PRIMARY KEY(article_id, besoin_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture_liv_int_bordereau_reg (facture_liv_int_id INT NOT NULL, bordereau_reg_id INT NOT NULL, INDEX IDX_3252FF1CF988E96D (facture_liv_int_id), INDEX IDX_3252FF1CF22A89D3 (bordereau_reg_id), PRIMARY KEY(facture_liv_int_id, bordereau_reg_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saison_article (saison_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_E1F6BB50F965414C (saison_id), INDEX IDX_E1F6BB507294869C (article_id), PRIMARY KEY(saison_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_besoin ADD CONSTRAINT FK_EBDF7F917294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_besoin ADD CONSTRAINT FK_EBDF7F91FE6EED44 FOREIGN KEY (besoin_id) REFERENCES besoin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE facture_liv_int_bordereau_reg ADD CONSTRAINT FK_3252FF1CF988E96D FOREIGN KEY (facture_liv_int_id) REFERENCES facture_liv_int (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE facture_liv_int_bordereau_reg ADD CONSTRAINT FK_3252FF1CF22A89D3 FOREIGN KEY (bordereau_reg_id) REFERENCES bordereau_reg (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE saison_article ADD CONSTRAINT FK_E1F6BB50F965414C FOREIGN KEY (saison_id) REFERENCES saison (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE saison_article ADD CONSTRAINT FK_E1F6BB507294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE association_villagoise ADD facture_globale_id INT DEFAULT NULL, ADD besoin_id INT DEFAULT NULL, ADD bordereau_reg_id INT DEFAULT NULL, ADD ticket_pesee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE association_villagoise ADD CONSTRAINT FK_F6B784339F8958B0 FOREIGN KEY (facture_globale_id) REFERENCES facture_globale (id)');
        $this->addSql('ALTER TABLE association_villagoise ADD CONSTRAINT FK_F6B78433FE6EED44 FOREIGN KEY (besoin_id) REFERENCES besoin (id)');
        $this->addSql('ALTER TABLE association_villagoise ADD CONSTRAINT FK_F6B78433F22A89D3 FOREIGN KEY (bordereau_reg_id) REFERENCES bordereau_reg (id)');
        $this->addSql('ALTER TABLE association_villagoise ADD CONSTRAINT FK_F6B78433DC094D7B FOREIGN KEY (ticket_pesee_id) REFERENCES ticket_pesee (id)');
        $this->addSql('CREATE INDEX IDX_F6B784339F8958B0 ON association_villagoise (facture_globale_id)');
        $this->addSql('CREATE INDEX IDX_F6B78433FE6EED44 ON association_villagoise (besoin_id)');
        $this->addSql('CREATE INDEX IDX_F6B78433F22A89D3 ON association_villagoise (bordereau_reg_id)');
        $this->addSql('CREATE INDEX IDX_F6B78433DC094D7B ON association_villagoise (ticket_pesee_id)');
        $this->addSql('ALTER TABLE bordereau_liv ADD besoin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bordereau_liv ADD CONSTRAINT FK_49303E85FE6EED44 FOREIGN KEY (besoin_id) REFERENCES besoin (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_49303E85FE6EED44 ON bordereau_liv (besoin_id)');
        $this->addSql('ALTER TABLE canton ADD centre_gest_int_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE canton ADD CONSTRAINT FK_5B9EF92120E0773A FOREIGN KEY (centre_gest_int_id) REFERENCES centre_gest_int (id)');
        $this->addSql('CREATE INDEX IDX_5B9EF92120E0773A ON canton (centre_gest_int_id)');
        $this->addSql('ALTER TABLE centre_gest_int ADD association_villagoise_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE centre_gest_int ADD CONSTRAINT FK_99E6E42A4A86E56F FOREIGN KEY (association_villagoise_id) REFERENCES association_villagoise (id)');
        $this->addSql('CREATE INDEX IDX_99E6E42A4A86E56F ON centre_gest_int (association_villagoise_id)');
        $this->addSql('ALTER TABLE facture_liv_int ADD bordereau_liv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE facture_liv_int ADD CONSTRAINT FK_B88A0F1CE6A337C3 FOREIGN KEY (bordereau_liv_id) REFERENCES bordereau_liv (id)');
        $this->addSql('CREATE INDEX IDX_B88A0F1CE6A337C3 ON facture_liv_int (bordereau_liv_id)');
        $this->addSql('ALTER TABLE saison ADD facture_globale_id INT DEFAULT NULL, ADD ticket_pesee_id INT DEFAULT NULL, ADD bordereau_reg_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE saison ADD CONSTRAINT FK_C0D0D5869F8958B0 FOREIGN KEY (facture_globale_id) REFERENCES facture_globale (id)');
        $this->addSql('ALTER TABLE saison ADD CONSTRAINT FK_C0D0D586DC094D7B FOREIGN KEY (ticket_pesee_id) REFERENCES ticket_pesee (id)');
        $this->addSql('ALTER TABLE saison ADD CONSTRAINT FK_C0D0D586F22A89D3 FOREIGN KEY (bordereau_reg_id) REFERENCES bordereau_reg (id)');
        $this->addSql('CREATE INDEX IDX_C0D0D5869F8958B0 ON saison (facture_globale_id)');
        $this->addSql('CREATE INDEX IDX_C0D0D586DC094D7B ON saison (ticket_pesee_id)');
        $this->addSql('CREATE INDEX IDX_C0D0D586F22A89D3 ON saison (bordereau_reg_id)');
        $this->addSql('ALTER TABLE transporteur ADD vehicule_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE transporteur ADD CONSTRAINT FK_A25649754A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('CREATE INDEX IDX_A25649754A4A3511 ON transporteur (vehicule_id)');
        $this->addSql('ALTER TABLE usine ADD vehicule_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE usine ADD CONSTRAINT FK_F3AB4814A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE usine ADD CONSTRAINT FK_F3AB481A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_F3AB4814A4A3511 ON usine (vehicule_id)');
        $this->addSql('CREATE INDEX IDX_F3AB481A76ED395 ON usine (user_id)');
        $this->addSql('ALTER TABLE vehicule ADD ticket_pesee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DDC094D7B FOREIGN KEY (ticket_pesee_id) REFERENCES ticket_pesee (id)');
        $this->addSql('CREATE INDEX IDX_292FFF1DDC094D7B ON vehicule (ticket_pesee_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE article_besoin');
        $this->addSql('DROP TABLE facture_liv_int_bordereau_reg');
        $this->addSql('DROP TABLE saison_article');
        $this->addSql('ALTER TABLE association_villagoise DROP FOREIGN KEY FK_F6B784339F8958B0');
        $this->addSql('ALTER TABLE association_villagoise DROP FOREIGN KEY FK_F6B78433FE6EED44');
        $this->addSql('ALTER TABLE association_villagoise DROP FOREIGN KEY FK_F6B78433F22A89D3');
        $this->addSql('ALTER TABLE association_villagoise DROP FOREIGN KEY FK_F6B78433DC094D7B');
        $this->addSql('DROP INDEX IDX_F6B784339F8958B0 ON association_villagoise');
        $this->addSql('DROP INDEX IDX_F6B78433FE6EED44 ON association_villagoise');
        $this->addSql('DROP INDEX IDX_F6B78433F22A89D3 ON association_villagoise');
        $this->addSql('DROP INDEX IDX_F6B78433DC094D7B ON association_villagoise');
        $this->addSql('ALTER TABLE association_villagoise DROP facture_globale_id, DROP besoin_id, DROP bordereau_reg_id, DROP ticket_pesee_id');
        $this->addSql('ALTER TABLE bordereau_liv DROP FOREIGN KEY FK_49303E85FE6EED44');
        $this->addSql('DROP INDEX UNIQ_49303E85FE6EED44 ON bordereau_liv');
        $this->addSql('ALTER TABLE bordereau_liv DROP besoin_id');
        $this->addSql('ALTER TABLE canton DROP FOREIGN KEY FK_5B9EF92120E0773A');
        $this->addSql('DROP INDEX IDX_5B9EF92120E0773A ON canton');
        $this->addSql('ALTER TABLE canton DROP centre_gest_int_id');
        $this->addSql('ALTER TABLE centre_gest_int DROP FOREIGN KEY FK_99E6E42A4A86E56F');
        $this->addSql('DROP INDEX IDX_99E6E42A4A86E56F ON centre_gest_int');
        $this->addSql('ALTER TABLE centre_gest_int DROP association_villagoise_id');
        $this->addSql('ALTER TABLE facture_liv_int DROP FOREIGN KEY FK_B88A0F1CE6A337C3');
        $this->addSql('DROP INDEX IDX_B88A0F1CE6A337C3 ON facture_liv_int');
        $this->addSql('ALTER TABLE facture_liv_int DROP bordereau_liv_id');
        $this->addSql('ALTER TABLE saison DROP FOREIGN KEY FK_C0D0D5869F8958B0');
        $this->addSql('ALTER TABLE saison DROP FOREIGN KEY FK_C0D0D586DC094D7B');
        $this->addSql('ALTER TABLE saison DROP FOREIGN KEY FK_C0D0D586F22A89D3');
        $this->addSql('DROP INDEX IDX_C0D0D5869F8958B0 ON saison');
        $this->addSql('DROP INDEX IDX_C0D0D586DC094D7B ON saison');
        $this->addSql('DROP INDEX IDX_C0D0D586F22A89D3 ON saison');
        $this->addSql('ALTER TABLE saison DROP facture_globale_id, DROP ticket_pesee_id, DROP bordereau_reg_id');
        $this->addSql('ALTER TABLE transporteur DROP FOREIGN KEY FK_A25649754A4A3511');
        $this->addSql('DROP INDEX IDX_A25649754A4A3511 ON transporteur');
        $this->addSql('ALTER TABLE transporteur DROP vehicule_id');
        $this->addSql('ALTER TABLE usine DROP FOREIGN KEY FK_F3AB4814A4A3511');
        $this->addSql('ALTER TABLE usine DROP FOREIGN KEY FK_F3AB481A76ED395');
        $this->addSql('DROP INDEX IDX_F3AB4814A4A3511 ON usine');
        $this->addSql('DROP INDEX IDX_F3AB481A76ED395 ON usine');
        $this->addSql('ALTER TABLE usine DROP vehicule_id, DROP user_id');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DDC094D7B');
        $this->addSql('DROP INDEX IDX_292FFF1DDC094D7B ON vehicule');
        $this->addSql('ALTER TABLE vehicule DROP ticket_pesee_id');
    }
}
