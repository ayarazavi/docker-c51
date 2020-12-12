<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201212161427 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(510) NOT NULL, image_url VARCHAR(510) NOT NULL, cash_back NUMERIC(15, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $content = file_get_contents('data/c51.json');
        $content = json_decode($content, true);
        $records = [];

        foreach ($content['offers'] as $offer) {
            $records[] = '(' . $offer['offer_id'] . ',"' . $offer['name'] . '","' . $offer['image_url'] . '",' . $offer['cash_back'] . ')';
        }

        $this->addSql('INSERT INTO offer (id, name,image_url,cash_back) VALUES' . implode($records, ', '));
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE offer');
    }
}
