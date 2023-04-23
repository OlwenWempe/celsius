<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230423143441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE search_criteria DROP FOREIGN KEY FK_A648303421FA03ED');
        $this->addSql('CREATE TABLE contractor (id INT AUTO_INCREMENT NOT NULL, search_criteria_id INT NOT NULL, reflex_entries_id INT NOT NULL, exception_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, serach_criteria VARCHAR(255) NOT NULL, INDEX IDX_437BD2EFE262778B (search_criteria_id), INDEX IDX_437BD2EF486EB9BD (reflex_entries_id), INDEX IDX_437BD2EF61F652ED (exception_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exception (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reflex_entries (id INT AUTO_INCREMENT NOT NULL, society_code VARCHAR(255) NOT NULL, agency_code VARCHAR(50) NOT NULL, service_code VARCHAR(50) NOT NULL, operator VARCHAR(50) NOT NULL, contractor VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contractor ADD CONSTRAINT FK_437BD2EFE262778B FOREIGN KEY (search_criteria_id) REFERENCES search_criteria (id)');
        $this->addSql('ALTER TABLE contractor ADD CONSTRAINT FK_437BD2EF486EB9BD FOREIGN KEY (reflex_entries_id) REFERENCES reflex_entries (id)');
        $this->addSql('ALTER TABLE contractor ADD CONSTRAINT FK_437BD2EF61F652ED FOREIGN KEY (exception_id) REFERENCES exception (id)');
        $this->addSql('ALTER TABLE edi DROP FOREIGN KEY FK_84A2A78621FA03ED');
        $this->addSql('ALTER TABLE edi DROP FOREIGN KEY FK_84A2A786A76ED395');
        $this->addSql('DROP TABLE donneur_dordre');
        $this->addSql('DROP TABLE edi');
        $this->addSql('DROP INDEX IDX_A648303421FA03ED ON search_criteria');
        $this->addSql('ALTER TABLE search_criteria ADD loading_location_position INT NOT NULL, ADD order_number_position INT NOT NULL, ADD delivery_location_position INT NOT NULL, ADD quantity_position INT NOT NULL, ADD weight_position INT NOT NULL, ADD palets_position INT NOT NULL, ADD delivery_date_position INT NOT NULL, ADD comment_position INT NOT NULL, ADD add_field1_position INT NOT NULL, ADD add_field2_position INT NOT NULL, DROP date_chargement, DROP chargeur, DROP numero_commande, DROP livreur, DROP colis, DROP poids, DROP nbr_pal, DROP date_livraison, DROP commentaire, DROP champ_opt_1, DROP champ_opt_2, CHANGE donneur_dordre_id charging_date_position INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE donneur_dordre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE edi (id INT AUTO_INCREMENT NOT NULL, donneur_dordre_id INT NOT NULL, user_id INT NOT NULL, name VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, numero_voyage VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, date_chargement DATE NOT NULL, date_livraison DATE NOT NULL, poids NUMERIC(15, 2) DEFAULT NULL, q_palettes INT DEFAULT NULL, colis INT DEFAULT NULL, facturation INT DEFAULT NULL, rdv_oblig TINYINT(1) DEFAULT NULL, commentaire VARCHAR(250) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, is_done TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_84A2A78621FA03ED (donneur_dordre_id), INDEX IDX_84A2A786A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE edi ADD CONSTRAINT FK_84A2A78621FA03ED FOREIGN KEY (donneur_dordre_id) REFERENCES donneur_dordre (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE edi ADD CONSTRAINT FK_84A2A786A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE contractor DROP FOREIGN KEY FK_437BD2EFE262778B');
        $this->addSql('ALTER TABLE contractor DROP FOREIGN KEY FK_437BD2EF486EB9BD');
        $this->addSql('ALTER TABLE contractor DROP FOREIGN KEY FK_437BD2EF61F652ED');
        $this->addSql('DROP TABLE contractor');
        $this->addSql('DROP TABLE exception');
        $this->addSql('DROP TABLE reflex_entries');
        $this->addSql('ALTER TABLE search_criteria ADD donneur_dordre_id INT NOT NULL, ADD date_chargement VARCHAR(255) NOT NULL, ADD chargeur VARCHAR(255) NOT NULL, ADD numero_commande VARCHAR(255) NOT NULL, ADD livreur VARCHAR(255) NOT NULL, ADD colis VARCHAR(255) NOT NULL, ADD poids VARCHAR(255) NOT NULL, ADD nbr_pal VARCHAR(255) NOT NULL, ADD date_livraison VARCHAR(255) NOT NULL, ADD commentaire VARCHAR(255) NOT NULL, ADD champ_opt_1 VARCHAR(255) DEFAULT NULL, ADD champ_opt_2 VARCHAR(255) DEFAULT NULL, DROP charging_date_position, DROP loading_location_position, DROP order_number_position, DROP delivery_location_position, DROP quantity_position, DROP weight_position, DROP palets_position, DROP delivery_date_position, DROP comment_position, DROP add_field1_position, DROP add_field2_position');
        $this->addSql('ALTER TABLE search_criteria ADD CONSTRAINT FK_A648303421FA03ED FOREIGN KEY (donneur_dordre_id) REFERENCES donneur_dordre (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_A648303421FA03ED ON search_criteria (donneur_dordre_id)');
    }
}
