<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240515114142 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, num_tel VARCHAR(255) DEFAULT NULL, date_naiss DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flight (id INT AUTO_INCREMENT NOT NULL, date_dep DATE DEFAULT NULL, date_ar DATE DEFAULT NULL, prix NUMERIC(10, 3) DEFAULT NULL, compagnie VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotel (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, date_arr DATE DEFAULT NULL, date_sorti DATE DEFAULT NULL, prix NUMERIC(10, 3) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement (id INT AUTO_INCREMENT NOT NULL, nom_prenom VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, tel VARCHAR(255) DEFAULT NULL, methode_paiement VARCHAR(255) DEFAULT NULL, num_carte INT DEFAULT NULL, code_securite INT DEFAULT NULL, paiement_totale INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, nom_prenom VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) DEFAULT NULL, mdp VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_flight (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, flight_id INT DEFAULT NULL, paiement_id INT DEFAULT NULL, INDEX IDX_8AA6AF9519EB6921 (client_id), INDEX IDX_8AA6AF9591F478C5 (flight_id), UNIQUE INDEX UNIQ_8AA6AF952A4C4478 (paiement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_tour (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, tour_package_id INT DEFAULT NULL, paiement_id INT DEFAULT NULL, INDEX IDX_7CE8340119EB6921 (client_id), INDEX IDX_7CE834011290BD60 (tour_package_id), UNIQUE INDEX UNIQ_7CE834012A4C4478 (paiement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resrvation_hotel (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, hotel_id INT DEFAULT NULL, paiement_id INT DEFAULT NULL, INDEX IDX_36C690AE19EB6921 (client_id), INDEX IDX_36C690AE3243BB18 (hotel_id), UNIQUE INDEX UNIQ_36C690AE2A4C4478 (paiement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, commentaire VARCHAR(255) DEFAULT NULL, nom_client VARCHAR(255) DEFAULT NULL, INDEX IDX_794381C619EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tour_package (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, prix NUMERIC(10, 3) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation_flight ADD CONSTRAINT FK_8AA6AF9519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reservation_flight ADD CONSTRAINT FK_8AA6AF9591F478C5 FOREIGN KEY (flight_id) REFERENCES flight (id)');
        $this->addSql('ALTER TABLE reservation_flight ADD CONSTRAINT FK_8AA6AF952A4C4478 FOREIGN KEY (paiement_id) REFERENCES paiement (id)');
        $this->addSql('ALTER TABLE reservation_tour ADD CONSTRAINT FK_7CE8340119EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reservation_tour ADD CONSTRAINT FK_7CE834011290BD60 FOREIGN KEY (tour_package_id) REFERENCES tour_package (id)');
        $this->addSql('ALTER TABLE reservation_tour ADD CONSTRAINT FK_7CE834012A4C4478 FOREIGN KEY (paiement_id) REFERENCES paiement (id)');
        $this->addSql('ALTER TABLE resrvation_hotel ADD CONSTRAINT FK_36C690AE19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE resrvation_hotel ADD CONSTRAINT FK_36C690AE3243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE resrvation_hotel ADD CONSTRAINT FK_36C690AE2A4C4478 FOREIGN KEY (paiement_id) REFERENCES paiement (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C619EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_flight DROP FOREIGN KEY FK_8AA6AF9519EB6921');
        $this->addSql('ALTER TABLE reservation_flight DROP FOREIGN KEY FK_8AA6AF9591F478C5');
        $this->addSql('ALTER TABLE reservation_flight DROP FOREIGN KEY FK_8AA6AF952A4C4478');
        $this->addSql('ALTER TABLE reservation_tour DROP FOREIGN KEY FK_7CE8340119EB6921');
        $this->addSql('ALTER TABLE reservation_tour DROP FOREIGN KEY FK_7CE834011290BD60');
        $this->addSql('ALTER TABLE reservation_tour DROP FOREIGN KEY FK_7CE834012A4C4478');
        $this->addSql('ALTER TABLE resrvation_hotel DROP FOREIGN KEY FK_36C690AE19EB6921');
        $this->addSql('ALTER TABLE resrvation_hotel DROP FOREIGN KEY FK_36C690AE3243BB18');
        $this->addSql('ALTER TABLE resrvation_hotel DROP FOREIGN KEY FK_36C690AE2A4C4478');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C619EB6921');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE flight');
        $this->addSql('DROP TABLE hotel');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE reservation_flight');
        $this->addSql('DROP TABLE reservation_tour');
        $this->addSql('DROP TABLE resrvation_hotel');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE tour_package');
    }
}
