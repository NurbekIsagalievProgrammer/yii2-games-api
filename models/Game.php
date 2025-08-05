<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "games".
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property string|null $description
 * @property string|null $released
 * @property string|null $poster
 * @property float|null $rating
 */
class Game extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'games';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'released'], 'default', 'value' => null],
            [['poster'], 'default', 'value' => '/images/game.jpg'],
            [['rating'], 'default', 'value' => 0.0],
            [['slug', 'name'], 'required'],
            [['description'], 'string'],
            [['released'], 'safe'],
            [['rating'], 'number'],
            [['slug', 'name', 'poster'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'name' => 'Name',
            'description' => 'Description',
            'released' => 'Released',
            'poster' => 'Poster',
            'rating' => 'Rating',
        ];
    }

}
