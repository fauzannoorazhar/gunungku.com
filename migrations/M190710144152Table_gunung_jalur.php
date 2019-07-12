<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class M190710144152Table_gunung_jalur
 */
class M190710144152Table_gunung_jalur extends Migration
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
        echo "M190710144152Table_gunung_jalur cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%gunung_jalur}}',[
            'id' => $this->primaryKey(),
            'id_gunung' => $this->integer()->notNull(),
            'nama' => $this->string(255)->notNull(),
            'jarak_puncak' => $this->decimal(3,1),
            'jam_perjalanan' => $this->decimal(3,1),
        ]);
    }

    public function down()
    {
        echo "M190710144152Table_gunung_jalur cannot be reverted.\n";

        return false;
    }

}
