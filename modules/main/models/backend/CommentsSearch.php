<?php

namespace app\modules\main\models\backend;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\main\models\backend\Comments;

/**
 * CommentsSearch represents the model behind the search form about `app\modules\main\models\backend\Comments`.
 */
class CommentsSearch extends Comments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'article_id', 'created_at', 'updated_at', 'visible'], 'integer'],
            [['username', 'email', 'url', 'text', 'role'], 'safe'],
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
        $query = Comments::find()->joinWith(['article']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
					'sort'=> ['defaultOrder' => ['id' => SORT_DESC],],
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
            'parent_id' => $this->parent_id,
            'article_id' => $this->article_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'visible' => $this->visible,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'role', $this->role]);

        return $dataProvider;
    }
}
