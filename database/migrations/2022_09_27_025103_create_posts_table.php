<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained();
            $table->string('title');
            $table->integer('views')->default(0);
            $table->enum('status', ['draft', 'public']);
            $table->boolean('is_feature')->default(false);

            // tạo field `owner` link tới email ở bảng users
            // khi users.email thay đổi, thì cập nhật lại field `owner`
            // nếu user bị xóa, thì bản ghi ở bảng này sẽ bị xóa
            $table->string('owner')->nullable();
            $table->foreign('owner')->references('email')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
