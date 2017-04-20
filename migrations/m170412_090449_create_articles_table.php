<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%articles}}`.
 * Has foreign keys to the tables:
 *
 * - `categories`
 * - `types`
 */
class m170412_090449_create_articles_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%articles}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'alias' => $this->string()->notNull(),
            'categories_id' => $this->integer(),
            'type_id' => $this->integer(),
            'keywords' => $this->text(),
            'description' => $this->text(),
            'anons' => $this->text(),
            'text' => $this->text(),
            'author' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'img' => $this->string(),
            'view' => $this->integer(),
            'visible' => $this->boolean()->defaultValue(0),
            'comment' => $this->boolean()->defaultValue(0),
            'master_class' => $this->boolean()->defaultValue(0),
        ]);

        // creates index for column `title`
        $this->createIndex(
            'idx-articles-title',
            '{{%articles}}',
            'title'
        );

        // creates index for column `categories_id`
        $this->createIndex(
            'idx-articles-categories_id',
            '{{%articles}}',
            'categories_id'
        );

        // add foreign key for table `categories`
        $this->addForeignKey(
            'fk-articles-categories_id',
            '{{%articles}}',
            'categories_id',
            '{{%categories}}',
            'id',
            'SET NULL',
						'RESTRICT'
        );

        // creates index for column `type_id`
        $this->createIndex(
            'idx-articles-type_id',
            '{{%articles}}',
            'type_id'
        );

        // add foreign key for table `types`
        $this->addForeignKey(
            'fk-articles-type_id',
            '{{%articles}}',
            'type_id',
            '{{%types}}',
            'id',
            'SET NULL',
						'RESTRICT'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `categories`
        $this->dropForeignKey(
            'fk-articles-categories_id',
            '{{%articles}}'
        );

        // drops index for column `categories_id`
        $this->dropIndex(
            'idx-articles-categories_id',
            '{{%articles}}'
        );

        // drops foreign key for table `types`
        $this->dropForeignKey(
            'fk-articles-type_id',
            '{{%articles}}'
        );

        // drops index for column `type_id`
        $this->dropIndex(
            'idx-articles-type_id',
            '{{%articles}}'
        );

        $this->dropTable('{{%articles}}');
    }
}
