<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categories}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%categories}}`
 */
class m170409_113926_create_categories_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->defaultValue(0),
            'name' => $this->string()->notNull(),
            'alias' => $this->string()->notNull(),
            'keywords' => $this->text(),
            'description' => $this->text(),
            'visible' => $this->boolean()->defaultValue(0),
        ]);

        // creates index for column `parent_id`
        $this->createIndex(
            'idx-categories-parent_id',
            '{{%categories}}',
            'parent_id'
        );

        // add foreign key for table `{{%categories}}`
        $this->addForeignKey(
            'fk-categories-parent_id',
            '{{%categories}}',
            'parent_id',
            '{{%categories}}',
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
        // drops foreign key for table `{{%categories}}`
        $this->dropForeignKey(
            'fk-categories-parent_id',
            '{{%categories}}'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            'idx-categories-parent_id',
            '{{%categories}}'
        );

        $this->dropTable('{{%categories}}');
    }
}
