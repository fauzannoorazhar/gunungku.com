<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class M190712231800Add_column_urutan_gunung_jalur_pos
 */
class M190712231800Add_column_urutan_gunung_jalur_pos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "M190712231800Add_column_urutan_gunung_jalur_pos cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('gunung_jalur_pos','urutan' ,$this->integer()->notNull());
    }

    public function down()
    {
        echo "M190712231800Add_column_urutan_gunung_jalur_pos cannot be reverted.\n";

        return false;
    }

}
