<?php

namespace app\modules\admin\guery\models;

/**
 * This is the ActiveQuery class for [[\app\modules\admin\models\Categories]].
 *
 * @see \app\modules\admin\models\Categories
 */
class CategoriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\modules\admin\models\Categories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\admin\models\Categories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
