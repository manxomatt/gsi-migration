<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class GsUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        DB::table('gs_users')->delete();

        DB::table('gs_users')->insert(array(
            0 => array(
                'id' => 1,
                'active' => 'true',
                'account_expire' => 'false',
                'account_expire_dt' => null,
                'privileges' => '{"type":"super_admin","map_osm":true,"map_bing":false,"map_google":false,"map_google_street_view":false,"map_google_traffic":false,"map_mapbox":false,"map_arcgis":false,"map_yandex":false,"kml":true,"dashboard":true,"history":true,"reports":true,"tachograph":true,"tasks":true,"rilogbook":true,"dtc":true,"maintenance":true,"expenses":true,"object_control":true,"image_gallery":true,"chat":true,"subaccounts":true}',
                'manager_id' => 0,
                'manager_billing' => 'false',
                'username' => 'admin',
                'password' => 'e10adc3949ba59abbe56e057f20f883e',
                'sess_hash' => '',
                'email' => 'admin@admin.com',
                'api' => 'false',
                'api_key' => '31DCD6C65B82FC7827D0CA0CBF872F75',
                'dt_reg' => '2023-10-06 12:06:01',
                'dt_login' => '2023-10-06 23:55:42',
                'ip' => '127.0.0.1',
                'notify_account_expire' => '',
                'notify_object_expire' => 'false',
                'info' => '{"name":"","company":"","address":"","post_code":"","city":"","country":"","phone1":"","phone2":"","email":""}',
                'comment' => '',
                'obj_add' => 'trial',
                'obj_limit' => 'false',
                'obj_limit_num' => 0,
                'obj_days' => 'false',
                'obj_days_dt' => null,
                'obj_edit' => 'true',
                'obj_delete' => 'true',
                'obj_history_clear' => 'true',
                'currency' => 'EUR',
                'timezone' => '+ 2 hour',
                'dst' => 'false',
                'dst_start' => '',
                'dst_end' => '',
                'startup_tab' => '',
                'language' => 'english',
                'units' => 'km,l,c',
                'dashboard' => '',
                'map_sp' => 'last',
                'map_is' => 1.0,
                'map_rc' => '#FF0000',
                'map_rhc' => '#0600B8',
                'map_ocp' => '',
                'groups_collapsed' => '',
                'od' => '',
                'ohc' => '',
                'datalist' => '',
                'datalist_items' => '',
                'push_notify_identifier' => '11245882377588177586',
                'push_notify_desktop' => '',
                'push_notify_mobile' => '',
                'push_notify_mobile_interval' => 0,
                'chat_notify' => '',
                'sms_gateway_server' => 'false',
                'sms_gateway' => '',
                'sms_gateway_type' => '',
                'sms_gateway_url' => '',
                'sms_gateway_identifier' => '07560119754317632508',
                'places_markers' => '100',
                'places_routes' => '100',
                'places_zones' => '100',
                'usage_email_daily' => '',
                'usage_sms_daily' => '',
                'usage_webhook_daily' => '',
                'usage_api_daily' => '',
                'usage_email_daily_cnt' => 0,
                'usage_sms_daily_cnt' => 0,
                'usage_webhook_daily_cnt' => 0,
                'usage_api_daily_cnt' => 0,
                'dt_usage_d' => '2023-10-07',
            ),

        ));
    }
}
