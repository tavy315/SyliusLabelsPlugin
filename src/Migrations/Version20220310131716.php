<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220310131716 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Initialize SyliusLabelsPlugin';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE tavy315_sylius_product_labels (product_id INT NOT NULL, label_id INT NOT NULL, INDEX IDX_3F9CBA6E4584665A (product_id), INDEX IDX_3F9CBA6E33B92F39 (label_id), PRIMARY KEY(product_id, label_id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tavy315_sylius_product_label (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(64) NOT NULL, UNIQUE INDEX UNIQ_26D6C3F377153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tavy315_sylius_product_label_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, locale VARCHAR(255) NOT NULL, INDEX IDX_426885232C2AC5D3 (translatable_id), UNIQUE INDEX tavy315_sylius_product_label_translation_uniq_trans (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tavy315_sylius_product_labels ADD CONSTRAINT FK_3F9CBA6E4584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tavy315_sylius_product_labels ADD CONSTRAINT FK_3F9CBA6E33B92F39 FOREIGN KEY (label_id) REFERENCES tavy315_sylius_product_label (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tavy315_sylius_product_label_translation ADD CONSTRAINT FK_426885232C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES tavy315_sylius_product_label (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE tavy315_sylius_product_labels DROP FOREIGN KEY FK_3F9CBA6E33B92F39');
        $this->addSql('ALTER TABLE tavy315_sylius_product_label_translation DROP FOREIGN KEY FK_426885232C2AC5D3');
        $this->addSql('DROP TABLE tavy315_sylius_product_labels');
        $this->addSql('DROP TABLE tavy315_sylius_product_label');
        $this->addSql('DROP TABLE tavy315_sylius_product_label_translation');
    }
}
