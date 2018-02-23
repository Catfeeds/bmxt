<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ReleseTeamEvent;

/**
 * ReleseTeamEventSerch represents the model behind the search form about `backend\models\ReleseTeamEvent`.
 */
class ReleseTeamEventSerch extends ReleseTeamEvent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'addit', 'event_type', 'contact_phone', 'orgnize', 'user_id', 'is_end', 'is_top', 'collocation', 'people'], 'integer'],
            [['event_name', 'apply_time_start', 'apply_time_end', 'place', 'contact_name', 'contact_emaill', 'orgnize_name', 'event_img', 'wenzhang', 'jianjie', 'detailed', 'begin', 'leixing'], 'safe'],
            [['apply_money'], 'number'],
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
        $query = ReleseTeamEvent::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'addit' => $this->addit,
            'event_type' => $this->event_type,
            'contact_phone' => $this->contact_phone,
            'orgnize' => $this->orgnize,
            'apply_money' => $this->apply_money,
            'user_id' => $this->user_id,
            'is_end' => $this->is_end,
            'is_top' => $this->is_top,
            'collocation' => $this->collocation,
            'people' => $this->people,
        ]);

        $query->andFilterWhere(['like', 'event_name', $this->event_name])
            ->andFilterWhere(['like', 'apply_time_start', $this->apply_time_start])
            ->andFilterWhere(['like', 'apply_time_end', $this->apply_time_end])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'contact_name', $this->contact_name])
            ->andFilterWhere(['like', 'contact_emaill', $this->contact_emaill])
            ->andFilterWhere(['like', 'orgnize_name', $this->orgnize_name])
            ->andFilterWhere(['like', 'event_img', $this->event_img])
            ->andFilterWhere(['like', 'wenzhang', $this->wenzhang])
            ->andFilterWhere(['like', 'jianjie', $this->jianjie])
            ->andFilterWhere(['like', 'detailed', $this->detailed])
            ->andFilterWhere(['like', 'begin', $this->begin])
            ->andFilterWhere(['like', 'leixing', $this->leixing]);

        return $dataProvider;
    }
}
