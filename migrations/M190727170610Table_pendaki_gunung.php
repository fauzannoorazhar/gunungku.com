<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class M190727170610Table_pendaki_gunung
 */
class M190727170610Table_pendaki_gunung extends Migration
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
        echo "M190727170610Table_pendaki_gunung cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%pendaki_gunung}}',[
            'id' => $this->primaryKey(),
            'id_pendaki' => $this->integer(11)->notNull(),
            'id_gunung_jalur_masuk' => $this->integer(11)->notNull(),
            'id_gunung_jalur_keluar' => $this->integer(11)->notNull(),
            'tanggal_masuk' => $this->date(),
            'tanggal_keluar' => $this->date(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull()
        ]);
    }

    public function down()
    {
        echo "M190727170610Table_pendaki_gunung cannot be reverted.\n";

        return false;
    }

}
