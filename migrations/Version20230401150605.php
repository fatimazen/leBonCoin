<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230401150605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce_user DROP FOREIGN KEY FK_B7E60AD78805AB2F');
        $this->addSql('ALTER TABLE annonce_user DROP FOREIGN KEY FK_B7E60AD7A76ED395');
        $this->addSql('DROP TABLE annonce_user');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce_user (annonce_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_B7E60AD7A76ED395 (user_id), INDEX IDX_B7E60AD78805AB2F (annonce_id), PRIMARY KEY(annonce_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE annonce_user ADD CONSTRAINT FK_B7E60AD78805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annonce_user ADD CONSTRAINT FK_B7E60AD7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
    }
}
