<?php

namespace app\modules\main\models\backend;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\main\models\backend\Articles;

/**
 * ArticlesSearch represents the model behind the search form about `app\modules\main\models\backend\Articles`.
 */
class ArticlesSearch extends Articles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'categories_id', 'type_id', 'created_at', 'updated_at', 'view', 'visible', 'comment', 'master_class'], 'integer'],
            [['title', 'alias', 'keywords', 'description', 'anons', 'text', 'author', 'img'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Articles::find()->joinWith(['categories', 'type']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
						'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
								'attributes' => [
									'id',
									'title',
									'alias',
									'categories_id' => [
										'asc' => ['{{%categories}}.name' => SORT_ASC],
										'desc' => ['{{%categories}}.name' => SORT_DESC],
									],
									'type_id' => [
										'asc' => ['{{%types}}.name' => SORT_ASC],
										'desc' => ['{{%types}}.name' => SORT_DESC],
									],
									'created_at',
									'updated_at',
									'img',
									'view',
									'visible',
									'comment',
									'master_class',
								]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'categories_id' => $this->categories_id,
            'type_id' => $this->type_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'view' => $this->view,
            'visible' => $this->visible,
            'comment' => $this->comment,
            'master_class' => $this->master_class,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'anons', $this->anons])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'img', $this->img]);

        return $dataProvider;
    }
}
