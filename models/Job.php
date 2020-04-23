<?php

namespace app\models;

/**
 * This is the model class for table "{{%tbl_job}}".
 *
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property string $type
 * @property string $requirements
 * @property string $salary range
 * @property string $city
 * @property string $state
 * @property string $zipcode
 * @property string $contact_phone
 * @property string $contact_email
 * @property int $is_published
 * @property string $create_date
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tbl_job}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'user_id', 'title', 'description', 'type', 'requirements', 'salary_range', 'city', 'state', 'zipcode', 'contact_phone', 'contact_email'], 'required'],
            [['category_id', 'user_id', 'is_published'], 'integer'],
            [['description', 'requirements'], 'string'],
            [['create_date'], 'safe'],
            [['title', 'type', 'salary_range', 'city', 'state', 'zipcode', 'contact_phone', 'contact_email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'description' => 'Description',
            'type' => 'Type',
            'requirements' => 'Requirements',
            'salary range' => 'Salary Range',
            'city' => 'City',
            'state' => 'State',
            'zipcode' => 'Zipcode',
            'contact_phone' => 'Contact Phone',
            'contact_email' => 'Contact Email',
            'is_published' => 'Is Published',
            'create_date' => 'Create Date',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getJob()
    {
        return $this->hasMany(Job::className(), ['id' => 'user_id']);
    }
}
