<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190425083908 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, nomfr VARCHAR(45) NOT NULL, nomen VARCHAR(45) NOT NULL, slugfr VARCHAR(45) NOT NULL, slugen VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, titrefr VARCHAR(45) NOT NULL, titreen VARCHAR(45) NOT NULL, slugfr VARCHAR(45) NOT NULL, slugen VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, nomfr VARCHAR(45) NOT NULL, nomen VARCHAR(45) NOT NULL, titre_onefr VARCHAR(45) NOT NULL, titre_oneen VARCHAR(45) NOT NULL, titre_twofr VARCHAR(45) NOT NULL, titre_twoen VARCHAR(45) NOT NULL, texte_onefr LONGTEXT NOT NULL, texte_twoen LONGTEXT NOT NULL, date DATETIME NOT NULL, texte_oneen LONGTEXT NOT NULL, texte_twofr LONGTEXT NOT NULL, image VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_category (post_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_B9A190604B89032C (post_id), INDEX IDX_B9A1906012469DE2 (category_id), PRIMARY KEY(post_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, nomfr VARCHAR(45) NOT NULL, nomen VARCHAR(45) NOT NULL, slugfr VARCHAR(45) NOT NULL, slugen VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, nomfr VARCHAR(45) NOT NULL, nomen VARCHAR(45) NOT NULL, textefr LONGTEXT NOT NULL, texteen LONGTEXT NOT NULL, date DATETIME NOT NULL, image VARCHAR(45) DEFAULT NULL, INDEX IDX_534E688019EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work_tag (work_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_79E7E01FBB3453DB (work_id), INDEX IDX_79E7E01FBAD26311 (tag_id), PRIMARY KEY(work_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE post_category ADD CONSTRAINT FK_B9A190604B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_category ADD CONSTRAINT FK_B9A1906012469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE work ADD CONSTRAINT FK_534E688019EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE work_tag ADD CONSTRAINT FK_79E7E01FBB3453DB FOREIGN KEY (work_id) REFERENCES work (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE work_tag ADD CONSTRAINT FK_79E7E01FBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE post_category DROP FOREIGN KEY FK_B9A1906012469DE2');
        $this->addSql('ALTER TABLE work DROP FOREIGN KEY FK_534E688019EB6921');
        $this->addSql('ALTER TABLE post_category DROP FOREIGN KEY FK_B9A190604B89032C');
        $this->addSql('ALTER TABLE work_tag DROP FOREIGN KEY FK_79E7E01FBAD26311');
        $this->addSql('ALTER TABLE work_tag DROP FOREIGN KEY FK_79E7E01FBB3453DB');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE post_category');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE work');
        $this->addSql('DROP TABLE work_tag');
    }
}
