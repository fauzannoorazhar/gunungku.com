<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class M190803095326Add_column_slug
 */
class M190803095326Add_column_slug extends Migration
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
        echo "M190803095326Add_column_slug cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('gunung','slug',$this->string(255));
        $this->addColumn('gunung_jalur','slug',$this->string(255));
        $this->addColumn('gunung_jalur_pos','slug',$this->string(255));
        $this->addColumn('pendaki','slug',$this->string(255));
    }

    public function down()
    {
        echo "M190803095326Add_column_slug cannot be reverted.\n";

        return false;
    }

}
