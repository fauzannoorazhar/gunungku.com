<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class M190710144836Table_gunung_jalur_pos
 */
class M190710144836Table_gunung_jalur_pos extends Migration
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
        echo "M190710144836Table_gunung_jalur_pos cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%gunung_jalur_pos}}',[
            'id' => $this->primaryKey(),
            'id_gunung_jalur' => $this->integer()->notNull(),
            'nama' => $this->string(255)->notNull(),
            'status_kemah' => $this->boolean()->defaultValue(0),
            'sumber_air' => $this->boolean()->defaultValue(0),
        ]);
    }

    public function down()
    {
        echo "M190710144836Table_gunung_jalur_pos cannot be reverted.\n";

        return false;
    }

}
