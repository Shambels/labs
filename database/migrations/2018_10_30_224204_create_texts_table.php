<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('texts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('homesection');
            $table->string('servicessection');
            $table->string('blogsection');
            $table->string('contactsection');
            $table->string('carouseltext');
            $table->string('discovertitle');
            $table->mediumText('discoverleft');
            $table->mediumText('discoverright');
            $table->string('browseblog');
            $table->string('browseservices');
            $table->string('browsestandout');
            $table->string('browseservices2');
            $table->string('newstitle');
            $table->string('newsplaceholder');
            $table->string('newsbtn');
            $table->string('video');
            $table->string('testimonial');
            $table->string('services');
            $table->string('team');
            $table->string('standouttitle');
            $table->string('standouttext');
            $table->string('services2');
            $table->string('categories');
            $table->string('instagram');
            $table->string('tags');
            $table->string('quote');
            $table->string('ad');
            $table->string('leavecom');
            $table->string('sendbtn');
            $table->string('readmorebtn');
            $table->string('contacttitle');
            $table->mediumText('contacttext');
            $table->string('contactoffice');
            $table->string('contactaddress');
            $table->string('contacttown');
            $table->string('contactphone');
            $table->string('contactemail');
            $table->string('contactformbtn');
            $table->string('copyright');
            $table->string('copyrightlink')->nullable();
            $table->string('copyrighturl')->nullable();
            $table->softDeletes();


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
        Schema::dropIfExists('texts');
    }
}
