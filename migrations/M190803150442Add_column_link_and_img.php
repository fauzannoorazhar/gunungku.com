<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class M190803150442Add_column_link_and_img
 */
class M190803150442Add_column_link_and_img extends Migration
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
        echo "M190803150442Add_column_link_and_img cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('gunung','link_website', $this->string(255));
        $this->addColumn('gunung','link_map', $this->string(255));
        $this->addColumn('gunung','lokasi', $this->string(255));
        $this->addColumn('gunung','gambar', $this->string(255));
    }

    public function down()
    {
        echo "M190803150442Add_column_link_and_img cannot be reverted.\n";

        return false;
    }

}
