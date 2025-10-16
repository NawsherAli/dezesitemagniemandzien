<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPostExcerptToPosts extends Migration
{
    public function up()
    {
        $this->forge->addColumn('posts', [
            'post_excerpt' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'body', // will appear after 'body' column
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('posts', 'post_excerpt');
    }
}
