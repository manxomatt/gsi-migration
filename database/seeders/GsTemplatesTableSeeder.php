<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GsTemplatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('gs_templates')->delete();

        DB::table('gs_templates')->insert(array(
            0 =>
            array(
                'template_id' => 1,
                'name' => 'account_registration',
                'language' => 'english',
                'subject' => 'Registration at %SERVER_NAME%',
                'message' => 'Hello,

Thank you for registering at %SERVER_NAME%.

Access to GPS server: %URL_LOGIN%

Username: %USERNAME%
Password: %PASSWORD%',
            ),
            1 =>
            array(
                'template_id' => 2,
                'name' => 'account_registration_au',
                'language' => 'english',
                'subject' => 'Registration at %SERVER_NAME%',
                'message' => 'Hello,

Thank you for registering at %SERVER_NAME%.

Desktop access:
%URL_AU%

Mobile access:
%URL_AU_MOBILE%',
            ),
            2 =>
            array(
                'template_id' => 3,
                'name' => 'account_recover_url',
                'language' => 'english',
                'subject' => 'Lost login recovery to %SERVER_NAME%',
                'message' => 'Hello,

A request has been made to recover account on %SERVER_NAME%.

Use the link to complete the process: %URL_RECOVER%',
            ),
            3 =>
            array(
                'template_id' => 4,
                'name' => 'account_recover',
                'language' => 'english',
                'subject' => 'Lost login recovery to %SERVER_NAME%',
                'message' => 'Hello,

Access to GPS server: %URL_LOGIN%

Username: %USERNAME%
Password: %PASSWORD%',
            ),
            4 =>
            array(
                'template_id' => 5,
                'name' => 'expiring_objects',
                'language' => 'english',
                'subject' => 'Expiring objects',
                'message' => 'Hello,

Some of your objects activation will expire soon. Please login into account for more details.

If you would like to continue using our service, please purchase access to %SERVER_NAME% at our shop:
%URL_SHOP%',
            ),
            5 =>
            array(
                'template_id' => 6,
                'name' => 'event_email',
                'language' => 'english',
                'subject' => '%NAME% - %EVENT%',
                'message' => 'Hello,

This is event message, please do not reply to this message.

Object: %NAME%
Event: %EVENT%
Position: %G_MAP%
Speed: %SPEED%
Time (position): %DT_POS%',
            ),
            6 =>
            array(
                'template_id' => 7,
                'name' => 'event_sms',
                'language' => 'english',
                'subject' => '%NAME% - %EVENT%',
                'message' => 'Hello,
Object: %NAME%
Event: %EVENT%
Position: %G_MAP%
Address: %ADDRESS%
Speed: %SPEED%
Time (position): %DT_POS%',
            ),
            7 =>
            array(
                'template_id' => 8,
                'name' => 'expiring_account',
                'language' => 'english',
                'subject' => 'Expiring account',
                'message' => 'Hello,

Your account will expire soon. Please contact us for more details.',
            ),
            8 =>
            array(
                'template_id' => 9,
                'name' => 'database_backup',
                'language' => 'english',
                'subject' => 'Database backup',
                'message' => 'Hello,

This is database backup, please do not reply to this e-mail.',
            ),
            9 =>
            array(
                'template_id' => 10,
                'name' => 'schedule_reports',
                'language' => 'english',
                'subject' => 'Schedule reports',
                'message' => 'Hello,

This is schedule report message, please do not reply to this e-mail.',
            ),
            10 =>
            array(
                'template_id' => 11,
                'name' => 'share_position_su_email',
                'language' => 'english',
                'subject' => 'Share position (%NAME%)',
                'message' => 'Hello,

%USER_EMAIL% has shared with you position of object %NAME%.

Desktop access:
%URL_SU%

Mobile access:
%URL_SU_MOBILE%',
            ),
            11 =>
            array(
                'template_id' => 12,
                'name' => 'share_position_su_sms',
                'language' => 'english',
                'subject' => 'Share position (%NAME%)',
                'message' => '%USER_EMAIL% has shared position: %URL_SU_MOBILE%',
            ),
        ));
    }
}
