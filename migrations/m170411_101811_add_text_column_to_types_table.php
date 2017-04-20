<?php

use yii\db\Migration;

/**
 * Handles adding text to table `{{%types}}`.
 */
class m170411_101811_add_text_column_to_types_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%types}}', 'text', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('{{%types}}', 'text');
    }
}
