<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181210133749 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE aritcles_tags (article_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_8272D0F57294869C (article_id), INDEX IDX_8272D0F5BAD26311 (tag_id), PRIMARY KEY(article_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aritcles_tags ADD CONSTRAINT FK_8272D0F57294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE aritcles_tags ADD CONSTRAINT FK_8272D0F5BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id)');
        $this->addSql('ALTER TABLE article DROP tags');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE aritcles_tags');
        $this->addSql('ALTER TABLE article ADD tags LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
