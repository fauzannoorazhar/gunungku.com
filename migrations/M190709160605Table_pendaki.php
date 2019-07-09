<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class M190709160605Table_pendaki
 */
class M190709160605Table_pendaki extends Migration
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
        echo "M190709160605Table_pendaki cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%pendaki}}',[
            'id' => $this->primaryKey(),
            'nama' => $this->string(255)->notNull(),
            'nik' => $this->integer(20)->notNull(),
            'jenis_kelamin' => $this->integer(1)->notNull(),
            'tanggal_lahir' => $this->date()->notNull(),
            'nomor_telpon' => $this->integer(15)->notNull(),
            'nomor_kerabat' => $this->integer(15)->notNull(),
            'email' => $this->string(255),
            'alamat' => $this->text(),
            'id_provinsi' => $this->integer(11),
            'id_kabupaten' => $this->integer(11),
            'file_pengenal' => $this->string(255)
        ]);
    }

    public function down()
    {
        echo "M190709160605Table_pendaki cannot be reverted.\n";

        return false;
    }

}
