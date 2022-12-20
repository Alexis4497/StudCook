<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221201115644 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE marques ADD filename_marque VARCHAR(255) NOT NULL, CHANGE lien_image_marque lien_image_marque VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bons_plans CHANGE nom_bon_plan nom_bon_plan VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lien_bon_plan lien_bon_plan VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lien_image_bon_plan lien_image_bon_plan VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE marques DROP filename_marque, CHANGE nom_marque nom_marque VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lien_image_marque lien_image_marque VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE recettes CHANGE filename filename VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE titre_recette titre_recette VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description_recette description_recette LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE lien_video lien_video VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE users CHANGE login login VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}