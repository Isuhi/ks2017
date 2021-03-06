<?php

namespace app\modules\user\forms\backend\search;

use app\modules\user\Module;
use app\modules\user\models\backend\User;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * UserSearch represents the model behind the search form about `app\modules\user\models\User`.
 */
class UserSearch extends Model
{
		public $id;
    public $username;
    public $email;
    public $status;
		public $date_from;
    public $date_to;
		
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['username', 'email'], 'safe'],
						[['date_from', 'date_to'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }
		
		    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => Module::t('module', 'USER_CREATED'),
            'updated_at' => Module::t('module', 'USER_UPDATED'),
            'username' => Module::t('module', 'USER_USERNAME'),
            'email' => Module::t('module', 'USER_EMAIL'),
            'status' => Module::t('module', 'USER_STATUS'),
						'date_from' => Module::t('module', 'USER_DATE_FROM'),
            'date_to' => Module::t('module', 'USER_DATE_TO'),
        ];
    }

    /**
     * @inheritdoc
     */
//    public function scenarios()
//    {
//        // bypass scenarios() implementation in the parent class
//        return Model::scenarios();
//    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = User::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
						'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
//            'created_at' => $this->created_at,
//            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
//            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
//            ->andFilterWhere(['like', 'email_confirm_token', $this->email_confirm_token])
//            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
//            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
						->andFilterWhere(['>=', 'created_at', $this->date_from ? strtotime($this->date_from . ' 00:00:00') : null])
            ->andFilterWhere(['<=', 'created_at', $this->date_to ? strtotime($this->date_to . ' 23:59:59') : null]);

        return $dataProvider;
    }
}
