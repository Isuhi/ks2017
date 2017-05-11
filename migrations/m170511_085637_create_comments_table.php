<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 * Has foreign keys to the tables:
 *
 * - `comments`
 * - `articles`
 */
class m170511_085637_create_comments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->defaultValue(0),
            'article_id' => $this->integer(),
            'username' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'url' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'text' => $this->text()->notNull(),
            'visible' => $this->boolean()->defaultValue(1),
        ]);

        // creates index for column `parent_id`
        $this->createIndex(
            'idx-comments-parent_id',
            '{{%comments}}',
            'parent_id'
        );

        // add foreign key for table `comments`
        $this->addForeignKey(
            'fk-comments-parent_id',
            '{{%comments}}',
            'parent_id',
            '{{%comments}}',
            'id',
            'SET NULL',
						'RESTRICT'
        );

        // creates index for column `article_id`
        $this->createIndex(
            'idx-comments-article_id',
            '{{%comments}}',
            'article_id'
        );

        // add foreign key for table `articles`
        $this->addForeignKey(
            'fk-comments-article_id',
            '{{%comments}}',
            'article_id',
            '{{%articles}}',
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
        // drops foreign key for table `comments`
        $this->dropForeignKey(
            'fk-comments-parent_id',
            '{{%comments}}'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            'idx-comments-parent_id',
            '{{%comments}}'
        );

        // drops foreign key for table `articles`
        $this->dropForeignKey(
            'fk-comments-article_id',
            '{{%comments}}'
        );

        // drops index for column `article_id`
        $this->dropIndex(
            'idx-comments-article_id',
            '{{%comments}}'
        );

        $this->dropTable('{{%comments}}');
    }
}
