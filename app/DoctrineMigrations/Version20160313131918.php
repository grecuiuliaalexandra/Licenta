<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160313131918 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bonuses ADD id_employee INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bonuses ADD CONSTRAINT FK_8535CFD2D449934 FOREIGN KEY (id_employee) REFERENCES fos_user (id)');
        $this->addSql('CREATE INDEX IDX_8535CFD2D449934 ON bonuses (id_employee)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bonuses DROP FOREIGN KEY FK_8535CFD2D449934');
        $this->addSql('DROP INDEX IDX_8535CFD2D449934 ON bonuses');
        $this->addSql('ALTER TABLE bonuses DROP id_employee');
    }
}
