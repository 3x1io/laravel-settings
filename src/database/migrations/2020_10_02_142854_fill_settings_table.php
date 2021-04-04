<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class FillSettingsTable extends Migration
{
    /**
     * @var array
     */
    protected $settings;

    /**
     * @var string
     */
    protected $table = 'settings';

    public function __construct()
    {
        $this->settings = [
            [
                "key" => "admin.$",
                "group" => "admin",
                "value" =>"EGP",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "key" => "site.name",
                "group" => "site",
                "value" => "",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "key" => "site.description",
                "group" => "site",
                "value" => "",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "key" => "site.keywords",
                "group" => "site",
                "value" => "",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "key" => "contact.hours",
                "group" => "site",
                "value" => "",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "key" => "contact.email",
                "group" => "site",
                "value" => "",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "key" => "contact.phone",
                "group" => "site",
                "value" => "",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "key" => "contact.address",
                "group" => "site",
                "value" => "",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "key" => "site.logo",
                "group" => "site",
                "value" => "placeholder.webp",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "key" => "admin.logo",
                "group" => "admin",
                "value" => "svg/logo.svg",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "key" => "social.facebook",
                "group" => "social",
                "value" => "#",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "key" => "social.twitter",
                "group" => "social",
                "value" => "#",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "key" => "social.instagram",
                "group" => "social",
                "value" => "#",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "key" => "social.snapchat",
                "group" => "social",
                "value" => "#",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "key" => "social.youtube",
                "group" => "social",
                "value" => "#",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "key" => "site.profile",
                "group" => "site",
                "value" => "placeholder.webp",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "key" => "site.menu",
                "group" => "site",
                "value" => '[{"title":"\u0627\u0644\u0631\u0626\u064a\u0633\u064a\u0629","url":"\/","target":"0"},{"title":"\u0627\u0644\u0645\u062a\u062c\u0631","url":"\/store","target":"0"}]',
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "key" => "admin.country",
                "group" => "admin",
                "value" => "Egypt",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],

        ];
    }

    public function up()
    {
        $table = $this->table;
        DB::transaction(function () use($table) {
            foreach ($this->settings as $setting){
                $settingItem = DB::table($table)->where([
                    'key' => $setting['key']
                ])->first();
                if ($settingItem === null) {
                    DB::table($table)->insert($setting);
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table = $this->table;
        DB::transaction(function () use($table) {
            foreach ($this->settings as $setting){
                $settingItem = DB::table($table)->where([
                    'key' => $setting['key']
                ])->first();
                if ($settingItem !== null) {
                    DB::table($table)->where([
                        'key' => $setting['key']
                    ])->delete();
                }
            }
        });
    }
}
