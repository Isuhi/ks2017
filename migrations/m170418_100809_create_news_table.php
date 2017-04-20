<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m170418_100809_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'alias' => $this->string()->notNull(),
            'keywords' => $this->text(),
            'description' => $this->text(),
            'anons' => $this->text(),
            'text' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'visible' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%news}}');
    }
}
