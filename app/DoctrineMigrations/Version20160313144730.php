<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160313144730 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE assigned_forms (id INT AUTO_INCREMENT NOT NULL, id_evaluation INT DEFAULT NULL, id_form INT DEFAULT NULL, id_evaluatee INT DEFAULT NULL, id_evaluator INT DEFAULT NULL, INDEX IDX_39B729B5B6A925A2 (id_evaluation), INDEX IDX_39B729B5D9A8E14D (id_form), INDEX IDX_39B729B58C024965 (id_evaluatee), INDEX IDX_39B729B5F53E2428 (id_evaluator), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE assigned_forms ADD CONSTRAINT FK_39B729B5B6A925A2 FOREIGN KEY (id_evaluation) REFERENCES evaluations (id)');
        $this->addSql('ALTER TABLE assigned_forms ADD CONSTRAINT FK_39B729B5D9A8E14D FOREIGN KEY (id_form) REFERENCES forms (id)');
        $this->addSql('ALTER TABLE assigned_forms ADD CONSTRAINT FK_39B729B58C024965 FOREIGN KEY (id_evaluatee) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE assigned_forms ADD CONSTRAINT FK_39B729B5F53E2428 FOREIGN KEY (id_evaluator) REFERENCES fos_user (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE assigned_forms');
    }
}
