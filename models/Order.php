<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $order_sn
 * @property int $pay_ts
 * @property int $status
 * @property int $create_ts
 * @property int $update_ts
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_sn', 'pay_ts', 'status', 'create_ts', 'update_ts'], 'required'],
            [['pay_ts', 'status', 'create_ts', 'update_ts'], 'integer'],
            [['order_sn'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_sn' => 'Order Sn',
            'pay_ts' => 'Pay Ts',
            'status' => 'Status',
            'create_ts' => 'Create Ts',
            'update_ts' => 'Update Ts',
        ];
    }
}
