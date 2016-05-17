<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160315102733 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE assigned_forms ADD CONSTRAINT FK_39B729B5D9A8E14D FOREIGN KEY (id_form) REFERENCES competences_group (id)');
        $this->addSql('ALTER TABLE competences ADD CONSTRAINT FK_DB2077CED9A8E14D FOREIGN KEY (id_form) REFERENCES competences_group (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE assigned_forms DROP FOREIGN KEY FK_39B729B5D9A8E14D');
        $this->addSql('ALTER TABLE competences DROP FOREIGN KEY FK_DB2077CED9A8E14D');
    }
}
