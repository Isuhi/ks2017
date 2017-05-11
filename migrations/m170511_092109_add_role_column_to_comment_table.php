<?php

use yii\db\Migration;

/**
 * Handles adding role to table `comments`.
 */
class m170511_092109_add_role_column_to_comment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%comments}}', 'role', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('{{%comments}}', 'role');
    }
}
