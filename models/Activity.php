<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $start_date
 * @property int $end_date
 * @property int $author_id
 * @property int $cycle
 * @property int $main
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Users $author
 * @property Useractivity[] $useractivities
 */
class Activity extends \yii\db\ActiveRecord
{
    const TIME_BEHAVIOR_NAME = 'timeBehavior';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'start_date', 'end_date', 'author_id'], 'required'],
            [['body'], 'string'],
            [['start_date', 'end_date', 'author_id', 'cycle', 'main', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            self::TIME_BEHAVIOR_NAME => [
                'class' => \yii\behaviors\TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    'value' => time(),
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'author_id' => 'Author ID',
            'cycle' => 'Cycle',
            'main' => 'Main',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUseractivities()
    {
        return $this->hasMany(Useractivity::className(), ['activity_id' => 'id']);
    }

    public function checkEndDate($attr, $value)
    {
        $startDate = Yii::$app->formatter->asTimestamp($this->start_date);
        $endDate = Yii::$app->formatter->asTimestamp($this->end_date);

        if ($startDate > $endDate) {
            $this->addError($attr, 'Дата конца события, не может быть больше даты начала');
        }
    }


    public function beforeSave($insert)
    {
        $this->start_date = Yii::$app->formatter->asTimestamp($this->start_date);

        if (!isset($this->end_date)) {
            $this->end_date = $this->start_date;
        } else {
            $this->end_date = Yii::$app->formatter->asTimestamp($this->end_date);

        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function getUsers()
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])
            ->via('calendarRecords');
    }

    public function getCalendarRecords()
    {
        return $this->hasMany(Calendar::class, ['activity_id' => 'id']);
    }
    public static function findOne($condition)
    {
        if (Yii::$app->cache->exists(self::tableName().'_'.$condition) === false) {
            Yii::info('В кеше по этому ключу ничего нет');
            $result = parent::findOne($condition);
            Yii::$app->cache->set(self::tableName().'_'.$condition, $result);
        } else {
            Yii::info('Кеш найден');
            $result = Yii::$app->cache->get(self::tableName().'_'.$condition);
        }

        return $result;

    }
}
