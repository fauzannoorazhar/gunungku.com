<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class M190726145810Add_column_status_table_gunung_kuota
 */
class M190726145810Add_column_status_table_gunung_kuota extends Migration
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
        echo "M190726145810Add_column_status_table_gunung_kuota cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('gunung_kuota', 'status',$this->boolean()->defaultValue(1));
    }

    public function down()
    {
        echo "M190726145810Add_column_status_table_gunung_kuota cannot be reverted.\n";

        return false;
    }

}
