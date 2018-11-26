<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181126201637 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE professeur_skill (professeur_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_CF638F09BAB22EE9 (professeur_id), INDEX IDX_CF638F095585C142 (skill_id), PRIMARY KEY(professeur_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE professeur_skill ADD CONSTRAINT FK_CF638F09BAB22EE9 FOREIGN KEY (professeur_id) REFERENCES professeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE professeur_skill ADD CONSTRAINT FK_CF638F095585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE skill_professeur');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE skill_professeur (skill_id INT NOT NULL, professeur_id INT NOT NULL, INDEX IDX_22C8EEB5585C142 (skill_id), INDEX IDX_22C8EEBBAB22EE9 (professeur_id), PRIMARY KEY(skill_id, professeur_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skill_professeur ADD CONSTRAINT FK_22C8EEB5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_professeur ADD CONSTRAINT FK_22C8EEBBAB22EE9 FOREIGN KEY (professeur_id) REFERENCES professeur (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE professeur_skill');
    }
}
