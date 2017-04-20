<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%types}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%types}}`
 */
class m170411_083556_create_types_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%types}}', [
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
            'idx-types-parent_id',
            '{{%types}}',
            'parent_id'
        );

        // add foreign key for table `{{%types}}`
        $this->addForeignKey(
            'fk-types-parent_id',
            '{{%types}}',
            'parent_id',
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
        // drops foreign key for table `{{%types}}`
        $this->dropForeignKey(
            'fk-types-parent_id',
            '{{%types}}'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            'idx-types-parent_id',
            '{{%types}}'
        );

        $this->dropTable('{{%types}}');
    }
}
