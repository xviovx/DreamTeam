<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211022214844 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE friendship (send_id INT NOT NULL, received_id INT NOT NULL, INDEX IDX_7234A45F13933E7B (send_id), INDEX IDX_7234A45FB821E5F5 (received_id), PRIMARY KEY(send_id, received_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE friendship ADD CONSTRAINT FK_7234A45F13933E7B FOREIGN KEY (send_id) REFERENCES user_profile (id)');
        $this->addSql('ALTER TABLE friendship ADD CONSTRAINT FK_7234A45FB821E5F5 FOREIGN KEY (received_id) REFERENCES user_profile (id)');
        $this->addSql('ALTER TABLE user_profile CHANGE email email VARCHAR(255) NOT NULL, CHANGE username username VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE friendship');
        $this->addSql('ALTER TABLE user_profile CHANGE username username VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
