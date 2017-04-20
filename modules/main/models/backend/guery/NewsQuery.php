<?php

namespace app\modules\main\models\backend\guery;

/**
 * This is the ActiveQuery class for [[\app\modules\main\models\backend\News]].
 *
 * @see \app\modules\main\models\backend\News
 */
class NewsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\main\models\backend\News[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\main\models\backend\News|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
