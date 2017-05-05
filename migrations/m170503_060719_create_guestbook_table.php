<?php

use yii\db\Migration;

/**
 * Handles the creation of table `guestbook`.
 */
class m170503_060719_create_guestbook_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%guestbook}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'url' => $this->string(),
            'created_at' => $this->integer(),
            'text' => $this->text()->notNull(),
            'visible' => $this->boolean()->defaultValue(1),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%guestbook}}');
    }
}
