<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PostJob;

/**
 * PostJobsearch represents the model behind the search form about `app\models\PostJob`.
 */
class PostJobsearch extends PostJob
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'payment_id', 'worker', 'price_range', 'number_family'], 'integer'],
            [['mobile', 'topic', 'job_status', 'service_type', 'intro', 'view_time', 'week', 'period', 'city', 'province', 'district', 'address', 'create_time', 'term_period', 'cleaning_type', 'cleaning_pet_type', 'work_times', 'workingdays_perweek', 'cleaning_time_estimate', 'estimated_date', 'cleaning_size', 'beginning_date', 'end_date', 'beginning_time', 'end_time', 'stay_type', 'sex_type', 'cure_type', 'baby_age_type', 'food_type', 'baby_type', 'longitude', 'latitude'], 'safe'],
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
        $query = PostJob::find();

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
            'user_id' => $this->user_id,
            'payment_id' => $this->payment_id,
            'create_time' => $this->create_time,
            'beginning_date' => $this->beginning_date,
            'end_date' => $this->end_date,
            'worker' => $this->worker,
            'price_range' => $this->price_range,
            'number_family' => $this->number_family,
        ]);

        $query->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'topic', $this->topic])
            ->andFilterWhere(['like', 'job_status', $this->job_status])
            ->andFilterWhere(['like', 'service_type', $this->service_type])
            ->andFilterWhere(['like', 'intro', $this->intro])
            ->andFilterWhere(['like', 'view_time', $this->view_time])
            ->andFilterWhere(['like', 'week', $this->week])
            ->andFilterWhere(['like', 'period', $this->period])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'term_period', $this->term_period])
            ->andFilterWhere(['like', 'cleaning_type', $this->cleaning_type])
            ->andFilterWhere(['like', 'cleaning_pet_type', $this->cleaning_pet_type])
            ->andFilterWhere(['like', 'work_times', $this->work_times])
            ->andFilterWhere(['like', 'workingdays_perweek', $this->workingdays_perweek])
            ->andFilterWhere(['like', 'cleaning_time_estimate', $this->cleaning_time_estimate])
            ->andFilterWhere(['like', 'estimated_date', $this->estimated_date])
            ->andFilterWhere(['like', 'cleaning_size', $this->cleaning_size])
            ->andFilterWhere(['like', 'beginning_time', $this->beginning_time])
            ->andFilterWhere(['like', 'end_time', $this->end_time])
            ->andFilterWhere(['like', 'stay_type', $this->stay_type])
            ->andFilterWhere(['like', 'sex_type', $this->sex_type])
            ->andFilterWhere(['like', 'cure_type', $this->cure_type])
            ->andFilterWhere(['like', 'baby_age_type', $this->baby_age_type])
            ->andFilterWhere(['like', 'food_type', $this->food_type])
            ->andFilterWhere(['like', 'baby_type', $this->baby_type])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'latitude', $this->latitude]);

        return $dataProvider;
    }
}
