<?php

namespace app\modules\main\models;

use Yii;
use app\modules\main\models\BaseModel;

/**
 * This is the model class for table "portfolios".
 *
 * @property integer $id
 * @property string $name
 * @property string $text
 * @property string $images
 * @property string $filter
 * @property string $created_at
 * @property string $updated_at
 */
class Portfolios extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'text', 'images', 'filter'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['text', 'images'], 'string', 'max' => 100],
            [['filter'], 'string', 'max' => 30],
            [['filter'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'text' => 'Описание',
            'images' => 'Картинка',
            'filter' => 'Фильтр',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
        ];
    }
}
