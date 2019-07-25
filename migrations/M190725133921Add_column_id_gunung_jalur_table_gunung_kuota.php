<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class M190725133921Add_column_id_gunung_jalur_table_gunung_kuota
 */
class M190725133921Add_column_id_gunung_jalur_table_gunung_kuota extends Migration
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
        echo "M190725133921Add_column_id_gunung_jalur_table_gunung_kuota cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->dropColumn('gunung_kuota','id_gunung');
        $this->addColumn('gunung_kuota','id_gunung_jalur' ,$this->integer());
    }

    public function down()
    {
        echo "M190725133921Add_column_id_gunung_jalur_table_gunung_kuota cannot be reverted.\n";

        return false;
    }

}
