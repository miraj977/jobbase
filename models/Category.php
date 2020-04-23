<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_category}}".
 *
 * @property int $id
 * @property string $name
 * @property string $summary
 * @property int $user_id
 * @property string $create_date
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tbl_category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'summary', 'user_id'], 'required'],
            [['summary'], 'string'],
            [['user_id'], 'integer'],
            [['create_date'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'summary' => 'Summary',
            'user_id' => 'User ID',
            'create_date' => 'Create Date',
        ];
    }
}
