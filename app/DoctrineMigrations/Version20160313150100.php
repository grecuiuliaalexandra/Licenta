<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160313150100 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE results (id INT AUTO_INCREMENT NOT NULL, id_assigned_form INT DEFAULT NULL, id_competence INT DEFAULT NULL, INDEX IDX_9FA3E4145D8D6D3 (id_assigned_form), UNIQUE INDEX UNIQ_9FA3E414315EE8A8 (id_competence), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE results ADD CONSTRAINT FK_9FA3E4145D8D6D3 FOREIGN KEY (id_assigned_form) REFERENCES assigned_forms (id)');
        $this->addSql('ALTER TABLE results ADD CONSTRAINT FK_9FA3E414315EE8A8 FOREIGN KEY (id_competence) REFERENCES competences (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE results');
    }
}
