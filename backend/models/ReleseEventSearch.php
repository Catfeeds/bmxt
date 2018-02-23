<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ReleseEventSearch represents the model behind the search form about `backend\models\ReleseEvent`.
 */
class ReleseEventSearch extends ReleseEvent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'addit', 'event_type', 'contact_phone', 'orgnize', 'extend_id', 'is_extends','is_end'], 'integer'],
            [['event_name', 'apply_time_start', 'apply_time_end', 'place', 'contact_name', 'contact_emaill', 'orgnize_name'], 'safe'],
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
        $query = ReleseEvent::find();

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
            'extend_id' => $this->extend_id,
            'is_extends' => $this->is_extends,
        ]);

        $query->andFilterWhere(['like', 'event_name', $this->event_name])
            ->andFilterWhere(['like', 'apply_time_start', $this->apply_time_start])
            ->andFilterWhere(['like', 'apply_time_end', $this->apply_time_end])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'contact_name', $this->contact_name])
            ->andFilterWhere(['like', 'contact_emaill', $this->contact_emaill])
            ->andFilterWhere(['like', 'orgnize_name', $this->orgnize_name]);

        return $dataProvider;
    }
    /**
     * 未审核赛事列表
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function unaddit($params)
    {
        $query = ReleseEvent::find();

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
            'addit' => 0,
            'event_type' => $this->event_type,
            'contact_phone' => $this->contact_phone,
            'orgnize' => $this->orgnize,
            'extend_id' => $this->extend_id,
            'is_extends' => $this->is_extends,
            'is_end' =>0,
        ]);

        $query->andFilterWhere(['like', 'event_name', $this->event_name])
            ->andFilterWhere(['like', 'apply_time_start', $this->apply_time_start])
            ->andFilterWhere(['like', 'apply_time_end', $this->apply_time_end])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'contact_name', $this->contact_name])
            ->andFilterWhere(['like', 'contact_emaill', $this->contact_emaill])
            ->andFilterWhere(['like', 'orgnize_name', $this->orgnize_name]);

        return $dataProvider;
    }
    /**
     * 进行中的赛事
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function addit($params)
    {
        $query = ReleseEvent::find();

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
            'addit' => 1,
            'event_type' => $this->event_type,
            'contact_phone' => $this->contact_phone,
            'orgnize' => $this->orgnize,
            'extend_id' => $this->extend_id,
            'is_extends' => $this->is_extends,
            'is_end' => 0,
        ]);

        $query->andFilterWhere(['like', 'event_name', $this->event_name])
            ->andFilterWhere(['like', 'apply_time_start', $this->apply_time_start])
            ->andFilterWhere(['like', 'apply_time_end', $this->apply_time_end])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'contact_name', $this->contact_name])
            ->andFilterWhere(['like', 'contact_emaill', $this->contact_emaill])
            ->andFilterWhere(['like', 'orgnize_name', $this->orgnize_name]);

        return $dataProvider;
    }

    /**
     * 已结束赛事
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function finish($params)
    {
        $query = ReleseEvent::find();

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
            'addit' => 1,
            'event_type' => $this->event_type,
            'contact_phone' => $this->contact_phone,
            'orgnize' => $this->orgnize,
            'extend_id' => $this->extend_id,
            'is_extends' => $this->is_extends,
            'is_end' => 1,
        ]);

        $query->andFilterWhere(['like', 'event_name', $this->event_name])
            ->andFilterWhere(['like', 'apply_time_start', $this->apply_time_start])
            ->andFilterWhere(['like', 'apply_time_end', $this->apply_time_end])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'contact_name', $this->contact_name])
            ->andFilterWhere(['like', 'contact_emaill', $this->contact_emaill])
            ->andFilterWhere(['like', 'orgnize_name', $this->orgnize_name]);

        return $dataProvider;
    }
}
