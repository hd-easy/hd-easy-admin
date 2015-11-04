<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Agency]].
 *
 * @see Agency
 */
class AgencyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Agency[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Agency|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}