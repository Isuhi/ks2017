<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%staticpages}}`.
 */
class m170418_073915_create_staticpages_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%staticpages}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'alias' => $this->string(),
            'keywords' => $this->text(),
            'description' => $this->text(),
            'text' => $this->text(),
            'visible' => $this->boolean(),
            'position' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%staticpages}}');
    }
}
