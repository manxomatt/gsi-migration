<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Table: ci_secure
        if (! Schema::hasTable('ci_secure')) {
            Schema::create('ci_secure', function (Blueprint $table) {
                $table->integer('id_sesi')->autoIncrement();
                $table->timestamp('sesi_time')->nullable()->default('current_timestamp()');
                $table->string('sesi_key', 64)->nullable();
                $table->string('sesi_device', 64)->nullable();
                $table->text('sesi_token_fcm')->nullable();
                $table->integer('id_user')->nullable();
                $table->string('id_app', 20)->nullable();
                $table->timestamp('sesi_logout')->default('0000-00-00 00:00:00');
                $table->tinyInteger('sesi_status')->nullable()->default(1);
                $table->dateTime('last_activity')->default('current_timestamp()');
                $table->index(['id_user']);
            });
        }

        // Table: ci_sessions
        if (! Schema::hasTable('ci_sessions')) {
            Schema::create('ci_sessions', function (Blueprint $table) {
                $table->string('id', 128);
                $table->string('ip_address', 45);
                $table->integer('timestamp')->unsigned()->default(0);
                $table->binary('data');
                $table->index(['timestamp']);
            });
        }

        // Table: databasechangelog
        if (! Schema::hasTable('databasechangelog')) {
            Schema::create('databasechangelog', function (Blueprint $table) {
                $table->string('ID', 255);
                $table->string('AUTHOR', 255);
                $table->string('FILENAME', 255);
                $table->dateTime('DATEEXECUTED');
                $table->integer('ORDEREXECUTED');
                $table->string('EXECTYPE', 10);
                $table->string('MD5SUM', 35)->nullable();
                $table->string('DESCRIPTION', 255)->nullable();
                $table->string('COMMENTS', 255)->nullable();
                $table->string('TAG', 255)->nullable();
                $table->string('LIQUIBASE', 20)->nullable();
                $table->string('CONTEXTS', 255)->nullable();
                $table->string('LABELS', 255)->nullable();
                $table->string('DEPLOYMENT_ID', 10)->nullable();
            });
        }

        // Table: databasechangeloglock
        if (! Schema::hasTable('databasechangeloglock')) {
            Schema::create('databasechangeloglock', function (Blueprint $table) {
                $table->integer('ID');
                $table->tinyInteger('LOCKED');
                $table->dateTime('LOCKGRANTED')->nullable();
                $table->string('LOCKEDBY', 255)->nullable();
            });
        }

        // Table: gs_api_kemenhub
        if (! Schema::hasTable('gs_api_kemenhub')) {
            Schema::create('gs_api_kemenhub', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->integer('user_id');
                $table->text('api_token');
                $table->integer('is_active')->default(0);
                $table->dateTime('last_update')->nullable();
                $table->text('last_update_notes')->nullable();
                $table->dateTime('updated_at')->default('current_timestamp()');
                $table->timestamp('updated_at')->useCurrent();
            });
        }

        // Table: gs_app
        if (! Schema::hasTable('gs_app')) {
            Schema::create('gs_app', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('appName', 255);
                $table->integer('versionCode');
                $table->string('versionName', 5);
                $table->text('updateInfo');
                $table->integer('isActive');
            });
        }

        // Table: gs_billing_plans
        if (! Schema::hasTable('gs_billing_plans')) {
            Schema::create('gs_billing_plans', function (Blueprint $table) {
                $table->integer('plan_id')->autoIncrement();
                $table->string('name', 50);
                $table->string('active', 5);
                $table->integer('objects');
                $table->integer('period');
                $table->string('period_type', 10);
                $table->double('price');
            });
        }

        // Table: gs_device_cmd_type
        if (! Schema::hasTable('gs_device_cmd_type')) {
            Schema::create('gs_device_cmd_type', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('type_name', 25);
                $table->dateTime('created_at')->default('current_timestamp()');
                $table->dateTime('updated_at')->default('current_timestamp()');
                $table->timestamps();
            });
        }

        // Table: gs_device_commands
        if (! Schema::hasTable('gs_device_commands')) {
            Schema::create('gs_device_commands', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->integer('device_id');
                $table->text('command');
                $table->integer('type_setting')->nullable();
                $table->integer('type_name');
                $table->string('provider', 50)->nullable();
                $table->string('type', 255)->nullable();
                $table->integer('sort')->nullable();
                $table->timestamps();
            });
        }

        // Table: gs_devices
        if (! Schema::hasTable('gs_devices')) {
            Schema::create('gs_devices', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('name', 200);
                $table->string('protocol', 50);
                $table->text('description');
                $table->timestamps();
            });
        }

        // Table: gs_dtc_data
        if (! Schema::hasTable('gs_dtc_data')) {
            Schema::create('gs_dtc_data', function (Blueprint $table) {
                $table->integer('dtc_id')->autoIncrement();
                $table->dateTime('dt_server');
                $table->dateTime('dt_tracker');
                $table->string('imei', 20);
                $table->string('code', 20);
                $table->double('lat');
                $table->double('lng');
                $table->string('address', 256);
                $table->index(['imei']);
            });
        }

        // Table: gs_email_queue
        if (! Schema::hasTable('gs_email_queue')) {
            Schema::create('gs_email_queue', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->dateTime('dt_email');
                $table->string('email', 512);
                $table->string('subject', 512);
                $table->string('message', 4096);
                $table->integer('no_reply');
                $table->index(['dt_email']);
            });
        }

        // Table: gs_geocoder_cache
        if (! Schema::hasTable('gs_geocoder_cache')) {
            Schema::create('gs_geocoder_cache', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->double('lat');
                $table->double('lng');
                $table->string('address', 256);
                $table->index(['lat']);
                $table->index(['lng']);
            });
        }

        // Table: gs_icons
        if (! Schema::hasTable('gs_icons')) {
            Schema::create('gs_icons', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('iconName', 255);
            });
        }

        // Table: gs_maps
        if (! Schema::hasTable('gs_maps')) {
            Schema::create('gs_maps', function (Blueprint $table) {
                $table->integer('map_id')->autoIncrement();
                $table->string('name', 50);
                $table->string('active', 5);
                $table->string('type', 5);
                $table->string('url', 2048);
                $table->string('layers', 256);
            });
        }

        // Table: gs_object_chat
        if (! Schema::hasTable('gs_object_chat')) {
            Schema::create('gs_object_chat', function (Blueprint $table) {
                $table->integer('msg_id')->autoIncrement();
                $table->dateTime('dt_server');
                $table->string('imei', 20);
                $table->string('side', 1);
                $table->string('msg', 2048);
                $table->integer('status');
                $table->index(['imei']);
            });
        }

        // Table: gs_object_cmd_exec
        if (! Schema::hasTable('gs_object_cmd_exec')) {
            Schema::create('gs_object_cmd_exec', function (Blueprint $table) {
                $table->integer('cmd_id')->autoIncrement();
                $table->integer('user_id');
                $table->dateTime('dt_cmd');
                $table->string('imei', 20);
                $table->string('name', 50);
                $table->string('gateway', 5);
                $table->string('type', 5);
                $table->string('cmd', 256);
                $table->integer('status');
                $table->string('re_hex', 1024);
                $table->index(['user_id']);
                $table->index(['imei']);
            });
        }

        // Table: gs_object_custom_fields
        if (! Schema::hasTable('gs_object_custom_fields')) {
            Schema::create('gs_object_custom_fields', function (Blueprint $table) {
                $table->integer('field_id')->autoIncrement();
                $table->string('imei', 20);
                $table->string('name', 50);
                $table->string('value', 100);
                $table->string('data_list', 5);
                $table->string('popup', 5);
                $table->index(['imei']);
            });
        }

        // Table: gs_object_data
        if (! Schema::hasTable('gs_object_data')) {
            Schema::create('gs_object_data', function (Blueprint $table) {
                $table->bigInteger('id')->unsigned()->autoIncrement();
                $table->string('imei', 20);
                $table->dateTime('dt_server');
                $table->dateTime('dt_tracker');
                $table->double('lat')->nullable();
                $table->double('lng')->nullable();
                $table->double('altitude')->nullable();
                $table->double('angle')->nullable();
                $table->double('speed')->nullable();
                $table->string('params', 2048);
                $table->index(['imei']);
                $table->index(['dt_tracker']);
                $table->timestamps();
            });
        }

        // Table: gs_object_img
        if (! Schema::hasTable('gs_object_img')) {
            Schema::create('gs_object_img', function (Blueprint $table) {
                $table->integer('img_id')->autoIncrement();
                $table->string('img_file', 50);
                $table->string('imei', 20);
                $table->dateTime('dt_server');
                $table->dateTime('dt_tracker');
                $table->double('lat');
                $table->double('lng');
                $table->double('altitude');
                $table->double('angle');
                $table->double('speed');
                $table->string('params', 2048);
                $table->index(['imei']);
            });
        }

        // Table: gs_object_sensors
        if (! Schema::hasTable('gs_object_sensors')) {
            Schema::create('gs_object_sensors', function (Blueprint $table) {
                $table->integer('sensor_id')->autoIncrement();
                $table->string('imei', 20);
                $table->string('name', 50);
                $table->string('type', 10)->nullable();
                $table->string('param', 20)->nullable();
                $table->string('data_list', 5)->nullable();
                $table->string('popup', 5)->nullable();
                $table->string('result_type', 10)->nullable();
                $table->string('text_1', 50)->nullable();
                $table->string('text_0', 50)->nullable();
                $table->string('units', 10)->nullable();
                $table->double('lv')->nullable();
                $table->double('hv')->nullable();
                $table->string('acc_ignore', 5)->nullable();
                $table->string('formula', 50)->nullable();
                $table->string('calibration', 4096)->nullable();
                $table->string('dictionary', 4096)->nullable();
                $table->index(['imei']);
            });
        }

        // Table: gs_object_services
        if (! Schema::hasTable('gs_object_services')) {
            Schema::create('gs_object_services', function (Blueprint $table) {
                $table->integer('service_id')->autoIncrement();
                $table->string('imei', 20);
                $table->string('name', 100)->nullable();
                $table->string('data_list', 5)->nullable();
                $table->string('popup', 5)->nullable();
                $table->string('odo', 5)->nullable();
                $table->double('odo_interval')->nullable();
                $table->double('odo_last')->nullable();
                $table->string('engh', 5)->nullable();
                $table->integer('engh_interval')->nullable();
                $table->integer('engh_last')->nullable();
                $table->string('days', 5)->nullable();
                $table->integer('days_interval')->nullable();
                $table->date('days_last')->nullable();
                $table->string('odo_left', 5)->nullable();
                $table->integer('odo_left_num')->nullable();
                $table->string('engh_left', 5)->nullable();
                $table->integer('engh_left_num')->nullable();
                $table->string('days_left', 5)->nullable();
                $table->integer('days_left_num')->nullable();
                $table->string('update_last', 5)->nullable();
                $table->string('notify_service_expire', 5)->nullable();
                $table->index(['imei']);
            });
        }

        // Table: gs_object_tasks
        if (! Schema::hasTable('gs_object_tasks')) {
            Schema::create('gs_object_tasks', function (Blueprint $table) {
                $table->integer('task_id')->autoIncrement();
                $table->integer('delivered');
                $table->dateTime('dt_task');
                $table->string('name', 50);
                $table->string('imei', 20);
                $table->string('priority', 10);
                $table->integer('status');
                $table->string('desc', 1024);
                $table->double('start_lat');
                $table->double('start_lng');
                $table->string('start_address', 256);
                $table->dateTime('start_from_dt');
                $table->dateTime('start_to_dt');
                $table->double('end_lat');
                $table->double('end_lng');
                $table->string('end_address', 256);
                $table->dateTime('end_from_dt');
                $table->dateTime('end_to_dt');
                $table->index(['imei']);
            });
        }

        // Table: gs_objects
        if (! Schema::hasTable('gs_objects')) {
            Schema::create('gs_objects', function (Blueprint $table) {
                $table->string('imei', 20);
                $table->string('protocol', 50);
                $table->string('net_protocol', 3);
                $table->string('ip', 50);
                $table->string('port', 10);
                $table->string('active', 5);
                $table->string('object_expire', 5);
                $table->date('object_expire_dt');
                $table->string('trial', 10)->default('false')->comment('Trial status: true/false');
                $table->integer('manager_id');
                $table->dateTime('dt_server');
                $table->dateTime('dt_tracker');
                $table->double('lat');
                $table->double('lng');
                $table->double('altitude');
                $table->double('angle');
                $table->double('speed');
                $table->integer('loc_valid');
                $table->string('params', 2048);
                $table->dateTime('dt_last_params_ble')->nullable();
                $table->dateTime('dt_last_stop')->nullable();
                $table->dateTime('dt_last_idle')->nullable();
                $table->dateTime('dt_last_move')->nullable();
                $table->string('name', 50);
                $table->string('icon', 256);
                $table->string('map_arrows', 512);
                $table->string('map_icon', 5);
                $table->string('tail_color', 7);
                $table->integer('tail_points');
                $table->string('device', 30);
                $table->string('sim_number', 50);
                $table->string('model', 50);
                $table->string('vin', 50);
                $table->string('plate_number', 50);
                $table->string('odometer_type', 10);
                $table->string('engine_hours_type', 10);
                $table->double('odometer')->nullable();
                $table->integer('engine_hours')->nullable();
                $table->string('fcr', 512)->nullable();
                $table->string('time_adj', 30)->nullable();
                $table->string('accuracy', 1024)->nullable();
                $table->string('unassign_driver', 5)->nullable();
                $table->string('accvirt', 5)->nullable();
                $table->string('accvirt_cn', 128)->nullable();
                $table->string('forward_loc_data', 5)->nullable();
                $table->string('forward_loc_data_imei', 20)->nullable();
                $table->dateTime('dt_chat')->nullable();
                $table->double('mileage_1')->nullable();
                $table->double('mileage_2')->nullable();
                $table->double('mileage_3')->nullable();
                $table->double('mileage_4')->nullable();
                $table->double('mileage_5')->nullable();
                $table->dateTime('dt_mileage')->nullable();
                $table->string('last_img_file', 50)->nullable();
                $table->dateTime('created_at')->nullable();
                $table->string('updated_by', 25)->nullable();
                $table->dateTime('updated_at')->nullable()->default('current_timestamp()');
                $table->string('sadap', 10)->nullable();
                $table->date('sim_number_expired_dt')->nullable();
                $table->integer('isSendSMS')->nullable()->default(0);
                $table->integer('isEngineOff')->nullable()->default(1);
                $table->integer('isOptimize')->nullable()->default(0);
                $table->index(['manager_id']);
                $table->timestamps();
            });
        }

        // Table: gs_objects_unused
        if (! Schema::hasTable('gs_objects_unused')) {
            Schema::create('gs_objects_unused', function (Blueprint $table) {
                $table->string('imei', 20);
                $table->string('protocol', 50);
                $table->string('net_protocol', 3);
                $table->string('ip', 50);
                $table->string('port', 10);
                $table->dateTime('dt_server');
                $table->integer('count');
            });
        }

        // Table: gs_push_queue
        if (! Schema::hasTable('gs_push_queue')) {
            Schema::create('gs_push_queue', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->dateTime('dt_push');
                $table->string('identifier', 20);
                $table->string('type', 10);
                $table->string('message', 256);
                $table->index(['dt_push']);
            });
        }

        // Table: gs_rilogbook_data
        if (! Schema::hasTable('gs_rilogbook_data')) {
            Schema::create('gs_rilogbook_data', function (Blueprint $table) {
                $table->integer('rilogbook_id')->autoIncrement();
                $table->dateTime('dt_server');
                $table->dateTime('dt_tracker');
                $table->string('imei', 20);
                $table->string('group', 2);
                $table->string('assign_id', 50);
                $table->double('lat');
                $table->double('lng');
                $table->string('address', 256);
                $table->index(['imei']);
            });
        }

        // Table: gs_sms_gateway_app
        if (! Schema::hasTable('gs_sms_gateway_app')) {
            Schema::create('gs_sms_gateway_app', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->dateTime('dt_sms');
                $table->string('identifier', 20);
                $table->string('number', 50);
                $table->string('message', 1024);
                $table->index(['dt_sms']);
            });
        }

        // Table: gs_sms_queue
        if (! Schema::hasTable('gs_sms_queue')) {
            Schema::create('gs_sms_queue', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->dateTime('dt_sms');
                $table->string('gateway_url', 2048);
                $table->string('filter', 10);
                $table->string('number', 512);
                $table->string('message', 1024);
                $table->index(['dt_sms']);
            });
        }

        // Table: gs_system
        if (! Schema::hasTable('gs_system')) {
            Schema::create('gs_system', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('key', 32);
                $table->string('value', 1024);
            });
        }

        // Table: gs_templates
        if (! Schema::hasTable('gs_templates')) {
            Schema::create('gs_templates', function (Blueprint $table) {
                $table->integer('template_id')->autoIncrement();
                $table->string('name', 100);
                $table->string('language', 20);
                $table->string('subject', 512);
                $table->string('message', 4096);
            });
        }

        // Table: gs_themes
        if (! Schema::hasTable('gs_themes')) {
            Schema::create('gs_themes', function (Blueprint $table) {
                $table->integer('theme_id')->autoIncrement();
                $table->string('name', 50);
                $table->string('active', 5);
                $table->string('theme', 2048);
            });
        }

        // Table: gs_user_account_recover
        if (! Schema::hasTable('gs_user_account_recover')) {
            Schema::create('gs_user_account_recover', function (Blueprint $table) {
                $table->integer('recover_id')->autoIncrement();
                $table->string('token', 100);
                $table->string('email', 100);
                $table->dateTime('dt_recover');
                $table->index(['token']);
            });
        }

        // Table: gs_user_billing_plans
        if (! Schema::hasTable('gs_user_billing_plans')) {
            Schema::create('gs_user_billing_plans', function (Blueprint $table) {
                $table->integer('plan_id')->autoIncrement();
                $table->integer('user_id');
                $table->dateTime('dt_purchase');
                $table->string('name', 50);
                $table->integer('objects');
                $table->integer('period');
                $table->string('period_type', 10);
                $table->double('price');
                $table->index(['user_id']);
            });
        }

        // Table: gs_user_cmd
        if (! Schema::hasTable('gs_user_cmd')) {
            Schema::create('gs_user_cmd', function (Blueprint $table) {
                $table->integer('cmd_id')->autoIncrement();
                $table->integer('user_id');
                $table->string('name', 50);
                $table->string('protocol', 50);
                $table->string('gateway', 5);
                $table->string('type', 5);
                $table->string('cmd', 256);
                $table->index(['user_id']);
            });
        }

        // Table: gs_user_cmd_schedule
        if (! Schema::hasTable('gs_user_cmd_schedule')) {
            Schema::create('gs_user_cmd_schedule', function (Blueprint $table) {
                $table->integer('cmd_id')->autoIncrement();
                $table->integer('user_id');
                $table->string('name', 50);
                $table->string('active', 5);
                $table->string('exact_time', 5);
                $table->dateTime('exact_time_dt');
                $table->string('day_time', 512);
                $table->string('protocol', 50);
                $table->text('imei');
                $table->string('gateway', 5);
                $table->string('type', 5);
                $table->string('cmd', 256);
                $table->dateTime('dt_schedule_e');
                $table->dateTime('dt_schedule_d');
                $table->index(['user_id']);
            });
        }

        // Table: gs_user_events
        if (! Schema::hasTable('gs_user_events')) {
            Schema::create('gs_user_events', function (Blueprint $table) {
                $table->integer('event_id')->autoIncrement();
                $table->integer('user_id');
                $table->string('type', 10)->nullable();
                $table->string('name', 50)->nullable();
                $table->string('active', 5)->nullable();
                $table->string('duration_from_last_event', 5)->nullable();
                $table->integer('duration_from_last_event_minutes')->nullable();
                $table->string('week_days', 50)->nullable();
                $table->string('day_time', 512)->nullable();
                $table->text('imei')->nullable();
                $table->string('checked_value', 1024)->nullable();
                $table->string('route_trigger', 5)->nullable();
                $table->string('zone_trigger', 5)->nullable();
                $table->string('routes', 4096)->nullable();
                $table->string('zones', 4096)->nullable();
                $table->string('notify_system', 40)->nullable();
                $table->string('notify_push', 5)->nullable();
                $table->string('notify_email', 5)->nullable();
                $table->string('notify_email_address', 500)->nullable();
                $table->string('notify_sms', 5)->nullable();
                $table->string('notify_sms_number', 500)->nullable();
                $table->string('notify_arrow', 5)->nullable();
                $table->string('notify_arrow_color', 20)->nullable();
                $table->string('notify_ohc', 5)->nullable();
                $table->string('notify_ohc_color', 7)->nullable();
                $table->integer('email_template_id')->nullable();
                $table->integer('sms_template_id')->nullable();
                $table->string('webhook_send', 5)->nullable();
                $table->string('webhook_url', 2048)->nullable();
                $table->string('cmd_send', 5)->nullable();
                $table->string('cmd_gateway', 5)->nullable();
                $table->string('cmd_type', 5)->nullable();
                $table->string('cmd_string', 256)->nullable();
                $table->index(['user_id']);
            });
        }

        // Table: gs_user_events_data
        if (! Schema::hasTable('gs_user_events_data')) {
            Schema::create('gs_user_events_data', function (Blueprint $table) {
                $table->integer('event_id')->autoIncrement();
                $table->integer('user_id');
                $table->string('type', 10)->nullable();
                $table->string('event_desc', 512)->nullable();
                $table->string('imei', 20);
                $table->string('name', 50)->nullable();
                $table->dateTime('dt_server')->nullable();
                $table->dateTime('dt_tracker')->nullable();
                $table->double('lat')->nullable();
                $table->double('lng')->nullable();
                $table->double('altitude')->nullable();
                $table->double('angle')->nullable();
                $table->double('speed')->nullable();
                $table->string('params', 2048)->nullable();
                $table->index(['user_id']);
                $table->index(['imei']);
            });
        }

        // Table: gs_user_events_status
        if (! Schema::hasTable('gs_user_events_status')) {
            Schema::create('gs_user_events_status', function (Blueprint $table) {
                $table->integer('status_id')->autoIncrement();
                $table->integer('event_id');
                $table->dateTime('dt_server');
                $table->string('imei', 20);
                $table->integer('event_status');
                $table->index(['event_id']);
                $table->index(['imei']);
            });
        }

        // Table: gs_user_expenses
        if (! Schema::hasTable('gs_user_expenses')) {
            Schema::create('gs_user_expenses', function (Blueprint $table) {
                $table->integer('expense_id')->autoIncrement();
                $table->integer('user_id');
                $table->date('dt_expense');
                $table->string('name', 50);
                $table->string('imei', 20);
                $table->double('quantity');
                $table->double('cost');
                $table->string('supplier', 64);
                $table->string('buyer', 64);
                $table->double('odometer');
                $table->integer('engine_hours');
                $table->string('desc', 2048);
                $table->index(['user_id']);
                $table->index(['imei']);
            });
        }

        // Table: gs_user_failed_logins
        if (! Schema::hasTable('gs_user_failed_logins')) {
            Schema::create('gs_user_failed_logins', function (Blueprint $table) {
                $table->integer('fail_id')->autoIncrement();
                $table->string('ip', 100);
                $table->dateTime('dt_login');
                $table->index(['ip']);
            });
        }

        // Table: gs_user_fcm_tokens
        if (! Schema::hasTable('gs_user_fcm_tokens')) {
            Schema::create('gs_user_fcm_tokens', function (Blueprint $table) {
                $table->bigInteger('token_id')->unsigned()->autoIncrement();
                $table->integer('user_id');
                $table->string('fcm_token', 255);
                $table->string('device_type', 50)->default('android');
                $table->string('device_id', 255)->nullable();
                $table->tinyInteger('active')->default(1);
                $table->timestamp('last_used_at')->nullable();
                $table->unique(['fcm_token']);
                $table->index(['user_id', 'active']);
                $table->index(['user_id']);
                $table->timestamps();
            });
        }

        // Table: gs_user_kml
        if (! Schema::hasTable('gs_user_kml')) {
            Schema::create('gs_user_kml', function (Blueprint $table) {
                $table->integer('kml_id')->autoIncrement();
                $table->integer('user_id');
                $table->string('name', 50);
                $table->string('active', 5);
                $table->string('desc', 1024);
                $table->string('kml_file', 256);
                $table->string('file_name', 256);
                $table->double('file_size');
                $table->index(['user_id']);
            });
        }

        // Table: gs_user_last_events_data
        if (! Schema::hasTable('gs_user_last_events_data')) {
            Schema::create('gs_user_last_events_data', function (Blueprint $table) {
                $table->integer('event_id')->autoIncrement();
                $table->integer('user_id');
                $table->string('type', 10);
                $table->string('event_desc', 512);
                $table->string('notify_system', 40)->nullable();
                $table->string('notify_push', 5)->nullable();
                $table->string('notify_arrow', 5)->nullable();
                $table->string('notify_arrow_color', 20)->nullable();
                $table->string('notify_ohc', 5)->nullable();
                $table->string('notify_ohc_color', 7)->nullable();
                $table->string('imei', 20)->nullable();
                $table->string('name', 50)->nullable();
                $table->dateTime('dt_server')->nullable();
                $table->dateTime('dt_tracker')->nullable();
                $table->double('lat')->nullable();
                $table->double('lng')->nullable();
                $table->double('altitude')->nullable();
                $table->double('angle')->nullable();
                $table->double('speed')->nullable();
                $table->string('params', 2048)->nullable();
                $table->integer('is_send')->default(0);
                $table->integer('is_send_sam')->default(0);
                $table->index(['user_id']);
                $table->index(['imei']);
            });
        }

        // Table: gs_user_markers
        if (! Schema::hasTable('gs_user_markers')) {
            Schema::create('gs_user_markers', function (Blueprint $table) {
                $table->integer('marker_id')->autoIncrement();
                $table->integer('user_id');
                $table->integer('group_id');
                $table->string('marker_name', 50);
                $table->string('marker_desc', 1024);
                $table->string('marker_icon', 256);
                $table->string('marker_visible', 5);
                $table->double('marker_lat');
                $table->double('marker_lng');
                $table->double('marker_radius');
                $table->index(['user_id']);
            });
        }

        // Table: gs_user_object_drivers
        if (! Schema::hasTable('gs_user_object_drivers')) {
            Schema::create('gs_user_object_drivers', function (Blueprint $table) {
                $table->integer('driver_id')->autoIncrement();
                $table->integer('user_id');
                $table->string('driver_name', 100);
                $table->string('driver_assign_id', 50);
                $table->string('driver_idn', 100);
                $table->string('driver_address', 200);
                $table->string('driver_phone', 50);
                $table->string('driver_email', 100);
                $table->string('driver_desc', 1024);
                $table->string('driver_img_file', 512);
                $table->index(['user_id']);
            });
        }

        // Table: gs_user_object_groups
        if (! Schema::hasTable('gs_user_object_groups')) {
            Schema::create('gs_user_object_groups', function (Blueprint $table) {
                $table->integer('group_id')->autoIncrement();
                $table->integer('user_id');
                $table->string('group_name', 50);
                $table->string('group_desc', 1024);
                $table->index(['user_id']);
            });
        }

        // Table: gs_user_object_passengers
        if (! Schema::hasTable('gs_user_object_passengers')) {
            Schema::create('gs_user_object_passengers', function (Blueprint $table) {
                $table->integer('passenger_id')->autoIncrement();
                $table->integer('user_id');
                $table->string('passenger_name', 100);
                $table->string('passenger_assign_id', 50);
                $table->string('passenger_idn', 100);
                $table->string('passenger_address', 200);
                $table->string('passenger_phone', 50);
                $table->string('passenger_email', 100);
                $table->string('passenger_desc', 1024);
                $table->index(['user_id']);
            });
        }

        // Table: gs_user_object_trailers
        if (! Schema::hasTable('gs_user_object_trailers')) {
            Schema::create('gs_user_object_trailers', function (Blueprint $table) {
                $table->integer('trailer_id')->autoIncrement();
                $table->integer('user_id');
                $table->string('trailer_name', 100);
                $table->string('trailer_assign_id', 50);
                $table->string('trailer_model', 50);
                $table->string('trailer_vin', 50);
                $table->string('trailer_plate_number', 50);
                $table->string('trailer_desc', 1024);
                $table->index(['user_id']);
            });
        }

        // Table: gs_user_objects
        if (! Schema::hasTable('gs_user_objects')) {
            Schema::create('gs_user_objects', function (Blueprint $table) {
                $table->integer('object_id')->autoIncrement();
                $table->integer('user_id');
                $table->string('imei', 20);
                $table->integer('group_id');
                $table->integer('driver_id');
                $table->integer('trailer_id');
                $table->index(['user_id']);
                $table->index(['imei']);
            });
        }

        // Table: gs_user_places_groups
        if (! Schema::hasTable('gs_user_places_groups')) {
            Schema::create('gs_user_places_groups', function (Blueprint $table) {
                $table->integer('group_id')->autoIncrement();
                $table->integer('user_id');
                $table->string('group_name', 50);
                $table->string('group_desc', 1024);
                $table->index(['user_id']);
            });
        }

        // Table: gs_user_reports
        if (! Schema::hasTable('gs_user_reports')) {
            Schema::create('gs_user_reports', function (Blueprint $table) {
                $table->integer('report_id')->autoIncrement();
                $table->integer('user_id');
                $table->string('name', 50);
                $table->string('type', 20);
                $table->string('ignore_empty_reports', 5);
                $table->string('format', 4);
                $table->string('show_coordinates', 5);
                $table->string('show_addresses', 5);
                $table->string('markers_addresses', 5);
                $table->string('zones_addresses', 5);
                $table->integer('stop_duration');
                $table->integer('speed_limit');
                $table->text('imei');
                $table->text('marker_ids');
                $table->text('zone_ids');
                $table->text('sensor_names');
                $table->text('data_items');
                $table->string('other', 4096);
                $table->string('schedule_period', 10);
                $table->string('schedule_email_address', 1024);
                $table->dateTime('dt_schedule_d');
                $table->dateTime('dt_schedule_w');
                $table->index(['user_id']);
            });
        }

        // Table: gs_user_reports_generated
        if (! Schema::hasTable('gs_user_reports_generated')) {
            Schema::create('gs_user_reports_generated', function (Blueprint $table) {
                $table->integer('report_id')->autoIncrement();
                $table->integer('user_id');
                $table->dateTime('dt_report');
                $table->string('name', 50);
                $table->string('type', 20);
                $table->string('format', 4);
                $table->integer('objects');
                $table->integer('markers');
                $table->integer('zones');
                $table->integer('sensors');
                $table->string('schedule', 5);
                $table->string('filename', 100);
                $table->string('report_file', 50);
                $table->index(['user_id']);
            });
        }

        // Table: gs_user_routes
        if (! Schema::hasTable('gs_user_routes')) {
            Schema::create('gs_user_routes', function (Blueprint $table) {
                $table->integer('route_id')->autoIncrement();
                $table->integer('user_id');
                $table->integer('group_id');
                $table->string('route_name', 50);
                $table->string('route_color', 7);
                $table->string('route_visible', 5);
                $table->string('route_name_visible', 5);
                $table->double('route_deviation');
                $table->string('route_points', 5120);
                $table->index(['user_id']);
            });
        }

        // Table: gs_user_share_position
        if (! Schema::hasTable('gs_user_share_position')) {
            Schema::create('gs_user_share_position', function (Blueprint $table) {
                $table->integer('share_id')->autoIncrement();
                $table->integer('user_id');
                $table->string('active', 5);
                $table->string('expire', 5);
                $table->date('expire_dt')->nullable();
                $table->string('delete_expired', 5);
                $table->string('name', 50);
                $table->string('email', 100);
                $table->string('phone', 100)->nullable();
                $table->text('imei');
                $table->string('su', 50);
                $table->index(['user_id']);
            });
        }

        // Table: gs_user_templates
        if (! Schema::hasTable('gs_user_templates')) {
            Schema::create('gs_user_templates', function (Blueprint $table) {
                $table->integer('template_id')->autoIncrement();
                $table->integer('user_id');
                $table->string('name', 100);
                $table->string('desc', 1024);
                $table->string('subject', 512);
                $table->string('message', 4096);
                $table->index(['user_id']);
            });
        }

        // Table: gs_user_usage
        if (! Schema::hasTable('gs_user_usage')) {
            Schema::create('gs_user_usage', function (Blueprint $table) {
                $table->integer('usage_id')->autoIncrement();
                $table->integer('user_id');
                $table->date('dt_usage');
                $table->integer('login');
                $table->integer('email');
                $table->integer('sms');
                $table->integer('webhook');
                $table->integer('api');
                $table->index(['user_id']);
            });
        }

        // Table: gs_user_zones
        if (! Schema::hasTable('gs_user_zones')) {
            Schema::create('gs_user_zones', function (Blueprint $table) {
                $table->integer('zone_id')->autoIncrement();
                $table->integer('user_id');
                $table->integer('group_id');
                $table->string('zone_name', 50);
                $table->string('zone_color', 7);
                $table->string('zone_visible', 5);
                $table->string('zone_name_visible', 5);
                $table->integer('zone_area');
                $table->string('zone_vertices', 2048);
                $table->index(['user_id']);
            });
        }

        // Table: gs_users
        if (! Schema::hasTable('gs_users')) {
            Schema::create('gs_users', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('active', 5);
                $table->string('account_expire', 5);
                $table->date('account_expire_dt')->nullable();
                $table->text('privileges');
                $table->integer('manager_id')->nullable();
                $table->string('manager_billing', 5)->nullable();
                $table->string('username', 100);
                $table->string('password', 100);
                $table->string('sess_hash', 100)->nullable();
                $table->string('email', 100);
                $table->string('api', 5)->nullable();
                $table->string('api_key', 100)->nullable();
                $table->dateTime('dt_reg')->nullable();
                $table->dateTime('dt_login')->nullable();
                $table->string('ip', 100)->nullable();
                $table->string('notify_account_expire', 5)->nullable();
                $table->string('notify_object_expire', 5)->nullable();
                $table->string('info', 1024)->nullable();
                $table->string('comment', 2048)->nullable();
                $table->string('obj_add', 5)->nullable();
                $table->string('obj_limit', 5)->nullable();
                $table->integer('obj_limit_num')->nullable();
                $table->string('obj_days', 5)->nullable();
                $table->date('obj_days_dt')->nullable();
                $table->string('obj_edit', 5)->nullable();
                $table->string('obj_delete', 5)->nullable();
                $table->string('obj_history_clear', 5)->nullable();
                $table->string('currency', 3)->nullable();
                $table->string('timezone', 30)->nullable();
                $table->string('dst', 5)->nullable();
                $table->string('dst_start', 20)->nullable();
                $table->string('dst_end', 20)->nullable();
                $table->string('startup_tab', 20)->nullable();
                $table->string('language', 20)->nullable();
                $table->string('units', 6)->nullable();
                $table->string('dashboard', 2048)->nullable();
                $table->string('map_sp', 7)->nullable();
                $table->double('map_is')->nullable();
                $table->string('map_rc', 7)->nullable();
                $table->string('map_rhc', 7)->nullable();
                $table->string('map_ocp', 7)->nullable();
                $table->string('groups_collapsed', 100)->nullable();
                $table->string('od', 10)->nullable();
                $table->string('ohc', 256)->nullable();
                $table->string('datalist', 20)->nullable();
                $table->string('datalist_items', 1024)->nullable();
                $table->string('push_notify_identifier', 20)->nullable();
                $table->string('push_notify_desktop', 5)->nullable();
                $table->string('push_notify_mobile', 5)->nullable();
                $table->integer('push_notify_mobile_interval')->nullable();
                $table->string('chat_notify', 40)->nullable();
                $table->string('sms_gateway_server', 5)->nullable()->default('true');
                $table->string('sms_gateway', 5)->nullable();
                $table->string('sms_gateway_type', 5)->nullable();
                $table->string('sms_gateway_url', 2048)->nullable();
                $table->string('sms_gateway_identifier', 20)->nullable();
                $table->string('places_markers', 5)->nullable();
                $table->string('places_routes', 5)->nullable();
                $table->string('places_zones', 5)->nullable();
                $table->string('usage_email_daily', 8)->nullable();
                $table->string('usage_sms_daily', 8)->nullable();
                $table->string('usage_webhook_daily', 8)->nullable();
                $table->string('usage_api_daily', 8)->nullable();
                $table->integer('usage_email_daily_cnt')->nullable();
                $table->integer('usage_sms_daily_cnt')->nullable();
                $table->integer('usage_webhook_daily_cnt')->nullable();
                $table->integer('usage_api_daily_cnt')->nullable();
                $table->date('dt_usage_d')->nullable();
                $table->integer('can_edit_obj_active')->nullable()->default(0);
                $table->index(['manager_id']);
            });
        }

        // Table: gs_webhook_queue
        if (! Schema::hasTable('gs_webhook_queue')) {
            Schema::create('gs_webhook_queue', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->dateTime('dt_webhook');
                $table->string('webhook_url', 2048);
                $table->string('post_data', 4096);
                $table->index(['dt_webhook']);
            });
        }

        // Table: password_reset_logs
        if (! Schema::hasTable('password_reset_logs')) {
            Schema::create('password_reset_logs', function (Blueprint $table) {
                $table->bigInteger('id')->unsigned()->autoIncrement();
                $table->bigInteger('admin_user_id')->unsigned()->comment('ID of admin who performed the reset');
                $table->bigInteger('target_user_id')->unsigned()->comment('ID of user whose password was reset');
                $table->timestamp('reset_at')->default('current_timestamp()')->comment('Timestamp of password reset');
                $table->string('ip_address', 45)->nullable()->comment('IP address of admin');
                $table->text('user_agent')->nullable()->comment('User agent of admin browser');
                $table->index(['admin_user_id']);
                $table->index(['target_user_id']);
                $table->index(['reset_at']);
            });
        }

        // Table: personal_access_tokens
        if (! Schema::hasTable('personal_access_tokens')) {
            Schema::create('personal_access_tokens', function (Blueprint $table) {
                $table->bigInteger('id')->unsigned()->autoIncrement();
                $table->string('tokenable_type', 255);
                $table->bigInteger('tokenable_id')->unsigned();
                $table->string('name', 255);
                $table->string('token', 64);
                $table->text('abilities')->nullable();
                $table->timestamp('last_used_at')->nullable();
                $table->timestamp('expires_at')->nullable();
                $table->unique(['token']);
                $table->index(['tokenable_type', 'tokenable_id']);
                $table->timestamps();
            });
        }

        // Table: tc_actions
        if (! Schema::hasTable('tc_actions')) {
            Schema::create('tc_actions', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->timestamp('actiontime');
                $table->string('address', 48)->nullable();
                $table->integer('userid')->nullable();
                $table->string('actiontype', 32);
                $table->string('objecttype', 32)->nullable();
                $table->integer('objectid')->nullable();
                $table->string('attributes', 4000);
                $table->index(['actiontime']);
            });
        }

        // Table: tc_attributes
        if (! Schema::hasTable('tc_attributes')) {
            Schema::create('tc_attributes', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('description', 4000);
                $table->string('type', 128);
                $table->string('attribute', 128);
                $table->string('expression', 4000);
                $table->integer('priority')->default(0);
            });
        }

        // Table: tc_calendars
        if (! Schema::hasTable('tc_calendars')) {
            Schema::create('tc_calendars', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('name', 128);
                $table->binary('data');
                $table->string('attributes', 4000);
            });
        }

        // Table: tc_commands
        if (! Schema::hasTable('tc_commands')) {
            Schema::create('tc_commands', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('description', 4000);
                $table->string('type', 128);
                $table->tinyInteger('textchannel')->default(0);
                $table->string('attributes', 4000);
            });
        }

        // Table: tc_commands_queue
        if (! Schema::hasTable('tc_commands_queue')) {
            Schema::create('tc_commands_queue', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->integer('deviceid');
                $table->string('type', 128);
                $table->tinyInteger('textchannel')->default(0);
                $table->string('attributes', 4000);
                $table->index(['deviceid']);
            });
        }

        // Table: tc_device_attribute
        if (! Schema::hasTable('tc_device_attribute')) {
            Schema::create('tc_device_attribute', function (Blueprint $table) {
                $table->integer('deviceid');
                $table->integer('attributeid');
                $table->index(['deviceid']);
                $table->index(['attributeid']);
            });
        }

        // Table: tc_device_command
        if (! Schema::hasTable('tc_device_command')) {
            Schema::create('tc_device_command', function (Blueprint $table) {
                $table->integer('deviceid');
                $table->integer('commandid');
                $table->index(['deviceid']);
                $table->index(['commandid']);
            });
        }

        // Table: tc_device_driver
        if (! Schema::hasTable('tc_device_driver')) {
            Schema::create('tc_device_driver', function (Blueprint $table) {
                $table->integer('deviceid');
                $table->integer('driverid');
                $table->index(['deviceid']);
                $table->index(['driverid']);
            });
        }

        // Table: tc_device_geofence
        if (! Schema::hasTable('tc_device_geofence')) {
            Schema::create('tc_device_geofence', function (Blueprint $table) {
                $table->integer('deviceid');
                $table->integer('geofenceid');
                $table->index(['deviceid']);
                $table->index(['geofenceid']);
            });
        }

        // Table: tc_device_maintenance
        if (! Schema::hasTable('tc_device_maintenance')) {
            Schema::create('tc_device_maintenance', function (Blueprint $table) {
                $table->integer('deviceid');
                $table->integer('maintenanceid');
                $table->index(['deviceid']);
                $table->index(['maintenanceid']);
            });
        }

        // Table: tc_device_notification
        if (! Schema::hasTable('tc_device_notification')) {
            Schema::create('tc_device_notification', function (Blueprint $table) {
                $table->integer('deviceid');
                $table->integer('notificationid');
                $table->index(['deviceid']);
                $table->index(['notificationid']);
            });
        }

        // Table: tc_device_order
        if (! Schema::hasTable('tc_device_order')) {
            Schema::create('tc_device_order', function (Blueprint $table) {
                $table->integer('deviceid');
                $table->integer('orderid');
                $table->index(['deviceid']);
                $table->index(['orderid']);
            });
        }

        // Table: tc_device_report
        if (! Schema::hasTable('tc_device_report')) {
            Schema::create('tc_device_report', function (Blueprint $table) {
                $table->integer('deviceid');
                $table->integer('reportid');
                $table->index(['deviceid']);
                $table->index(['reportid']);
            });
        }

        // Table: tc_devices
        if (! Schema::hasTable('tc_devices')) {
            Schema::create('tc_devices', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('name', 128);
                $table->string('uniqueid', 128);
                $table->timestamp('lastupdate')->nullable();
                $table->integer('positionid')->nullable();
                $table->integer('groupid')->nullable();
                $table->string('attributes', 4000)->nullable();
                $table->string('phone', 128)->nullable();
                $table->string('model', 128)->nullable();
                $table->string('contact', 512)->nullable();
                $table->string('category', 128)->nullable();
                $table->tinyInteger('disabled')->nullable()->default(0);
                $table->char('status', 8)->nullable();
                $table->timestamp('expirationtime')->nullable();
                $table->tinyInteger('motionstate')->nullable()->default(0);
                $table->timestamp('motiontime')->nullable();
                $table->double('motiondistance')->nullable()->default(0);
                $table->tinyInteger('overspeedstate')->nullable()->default(0);
                $table->timestamp('overspeedtime')->nullable();
                $table->integer('overspeedgeofenceid')->nullable()->default(0);
                $table->tinyInteger('motionstreak')->nullable()->default(0);
                $table->integer('calendarid')->nullable();
                $table->integer('motionpositionid')->nullable();
                $table->tinyInteger('isstop')->nullable()->comment('Indicates if device is in stopped state');
                $table->double('stopspeed')->nullable()->comment('Speed at which device stopped (km/h)');
                $table->unique(['uniqueid']);
                $table->index(['uniqueid']);
                $table->index(['groupid']);
                $table->index(['calendarid']);
            });
        }

        // Table: tc_drivers
        if (! Schema::hasTable('tc_drivers')) {
            Schema::create('tc_drivers', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('name', 128);
                $table->string('uniqueid', 128);
                $table->string('attributes', 4000);
                $table->unique(['uniqueid']);
                $table->index(['uniqueid']);
            });
        }

        // Table: tc_events
        if (! Schema::hasTable('tc_events')) {
            Schema::create('tc_events', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('type', 128);
                $table->timestamp('eventtime');
                $table->integer('deviceid')->nullable();
                $table->integer('positionid')->nullable();
                $table->integer('geofenceid')->nullable();
                $table->string('attributes', 4000)->nullable();
                $table->integer('maintenanceid')->nullable();
                $table->index(['deviceid', 'eventtime']);
            });
        }

        // Table: tc_geofences
        if (! Schema::hasTable('tc_geofences')) {
            Schema::create('tc_geofences', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('name', 128);
                $table->string('description', 128)->nullable();
                $table->string('area', 4096);
                $table->string('attributes', 4000)->nullable();
                $table->integer('calendarid')->nullable();
                $table->index(['calendarid']);
            });
        }

        // Table: tc_group_attribute
        if (! Schema::hasTable('tc_group_attribute')) {
            Schema::create('tc_group_attribute', function (Blueprint $table) {
                $table->integer('groupid');
                $table->integer('attributeid');
                $table->index(['groupid']);
                $table->index(['attributeid']);
            });
        }

        // Table: tc_group_command
        if (! Schema::hasTable('tc_group_command')) {
            Schema::create('tc_group_command', function (Blueprint $table) {
                $table->integer('groupid');
                $table->integer('commandid');
                $table->index(['groupid']);
                $table->index(['commandid']);
            });
        }

        // Table: tc_group_driver
        if (! Schema::hasTable('tc_group_driver')) {
            Schema::create('tc_group_driver', function (Blueprint $table) {
                $table->integer('groupid');
                $table->integer('driverid');
                $table->index(['groupid']);
                $table->index(['driverid']);
            });
        }

        // Table: tc_group_geofence
        if (! Schema::hasTable('tc_group_geofence')) {
            Schema::create('tc_group_geofence', function (Blueprint $table) {
                $table->integer('groupid');
                $table->integer('geofenceid');
                $table->index(['groupid']);
                $table->index(['geofenceid']);
            });
        }

        // Table: tc_group_maintenance
        if (! Schema::hasTable('tc_group_maintenance')) {
            Schema::create('tc_group_maintenance', function (Blueprint $table) {
                $table->integer('groupid');
                $table->integer('maintenanceid');
                $table->index(['groupid']);
                $table->index(['maintenanceid']);
            });
        }

        // Table: tc_group_notification
        if (! Schema::hasTable('tc_group_notification')) {
            Schema::create('tc_group_notification', function (Blueprint $table) {
                $table->integer('groupid');
                $table->integer('notificationid');
                $table->index(['groupid']);
                $table->index(['notificationid']);
            });
        }

        // Table: tc_group_order
        if (! Schema::hasTable('tc_group_order')) {
            Schema::create('tc_group_order', function (Blueprint $table) {
                $table->integer('groupid');
                $table->integer('orderid');
                $table->index(['groupid']);
                $table->index(['orderid']);
            });
        }

        // Table: tc_group_report
        if (! Schema::hasTable('tc_group_report')) {
            Schema::create('tc_group_report', function (Blueprint $table) {
                $table->integer('groupid');
                $table->integer('reportid');
                $table->index(['groupid']);
                $table->index(['reportid']);
            });
        }

        // Table: tc_groups
        if (! Schema::hasTable('tc_groups')) {
            Schema::create('tc_groups', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('name', 128);
                $table->integer('groupid')->nullable();
                $table->string('attributes', 4000)->nullable();
                $table->index(['groupid']);
            });
        }

        // Table: tc_keystore
        if (! Schema::hasTable('tc_keystore')) {
            Schema::create('tc_keystore', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->binary('publickey');
                $table->binary('privatekey');
            });
        }

        // Table: tc_maintenances
        if (! Schema::hasTable('tc_maintenances')) {
            Schema::create('tc_maintenances', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('name', 4000);
                $table->string('type', 128);
                $table->double('start')->default(0);
                $table->double('period')->default(0);
                $table->string('attributes', 4000);
            });
        }

        // Table: tc_notifications
        if (! Schema::hasTable('tc_notifications')) {
            Schema::create('tc_notifications', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('type', 128);
                $table->string('attributes', 4000)->nullable();
                $table->tinyInteger('always')->default(0);
                $table->integer('calendarid')->nullable();
                $table->string('notificators', 128)->nullable();
                $table->integer('commandid')->nullable();
                $table->string('description', 4000)->nullable();
                $table->index(['calendarid']);
                $table->index(['commandid']);
            });
        }

        // Table: tc_orders
        if (! Schema::hasTable('tc_orders')) {
            Schema::create('tc_orders', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('uniqueid', 128);
                $table->string('description', 512)->nullable();
                $table->string('fromaddress', 512)->nullable();
                $table->string('toaddress', 512)->nullable();
                $table->string('attributes', 4000);
            });
        }

        // Table: tc_positions
        if (! Schema::hasTable('tc_positions')) {
            Schema::create('tc_positions', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('protocol', 128)->nullable();
                $table->integer('deviceid');
                $table->timestamp('servertime')->default('current_timestamp()');
                $table->timestamp('devicetime');
                $table->timestamp('fixtime');
                $table->tinyInteger('valid');
                $table->double('latitude');
                $table->double('longitude');
                $table->double('altitude');
                $table->double('speed');
                $table->double('course');
                $table->string('address', 512)->nullable();
                $table->string('attributes', 4000)->nullable();
                $table->double('accuracy')->default(0);
                $table->string('network', 4000)->nullable();
                $table->string('geofenceids', 128)->nullable();
                $table->index(['deviceid', 'fixtime']);
            });
        }

        // Table: tc_reports
        if (! Schema::hasTable('tc_reports')) {
            Schema::create('tc_reports', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('type', 32);
                $table->string('description', 128);
                $table->integer('calendarid');
                $table->string('attributes', 4000);
                $table->index(['calendarid']);
            });
        }

        // Table: tc_revoked_tokens
        if (! Schema::hasTable('tc_revoked_tokens')) {
            Schema::create('tc_revoked_tokens', function (Blueprint $table) {
                $table->bigInteger('id');
            });
        }

        // Table: tc_servers
        if (! Schema::hasTable('tc_servers')) {
            Schema::create('tc_servers', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->tinyInteger('registration')->default(0);
                $table->double('latitude')->default(0);
                $table->double('longitude')->default(0);
                $table->integer('zoom')->default(0);
                $table->string('map', 128)->nullable();
                $table->string('bingkey', 128)->nullable();
                $table->string('mapurl', 512)->nullable();
                $table->tinyInteger('readonly')->default(0);
                $table->string('attributes', 4000)->nullable();
                $table->tinyInteger('forcesettings')->default(0);
                $table->string('coordinateformat', 128)->nullable();
                $table->tinyInteger('devicereadonly')->nullable()->default(0);
                $table->tinyInteger('limitcommands')->nullable()->default(0);
                $table->string('poilayer', 512)->nullable();
                $table->string('announcement', 4000)->nullable();
                $table->tinyInteger('disablereports')->nullable()->default(0);
                $table->string('overlayurl', 512)->nullable();
                $table->tinyInteger('fixedemail')->nullable()->default(0);
            });
        }

        // Table: tc_statistics
        if (! Schema::hasTable('tc_statistics')) {
            Schema::create('tc_statistics', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->timestamp('capturetime');
                $table->integer('activeusers')->default(0);
                $table->integer('activedevices')->default(0);
                $table->integer('requests')->default(0);
                $table->integer('messagesreceived')->default(0);
                $table->integer('messagesstored')->default(0);
                $table->string('attributes', 4096);
                $table->integer('mailsent')->default(0);
                $table->integer('smssent')->default(0);
                $table->integer('geocoderrequests')->default(0);
                $table->integer('geolocationrequests')->default(0);
                $table->string('protocols', 4096)->nullable();
            });
        }

        // Table: tc_user_attribute
        if (! Schema::hasTable('tc_user_attribute')) {
            Schema::create('tc_user_attribute', function (Blueprint $table) {
                $table->integer('userid');
                $table->integer('attributeid');
                $table->index(['userid']);
                $table->index(['attributeid']);
            });
        }

        // Table: tc_user_calendar
        if (! Schema::hasTable('tc_user_calendar')) {
            Schema::create('tc_user_calendar', function (Blueprint $table) {
                $table->integer('userid');
                $table->integer('calendarid');
                $table->index(['userid']);
                $table->index(['calendarid']);
            });
        }

        // Table: tc_user_command
        if (! Schema::hasTable('tc_user_command')) {
            Schema::create('tc_user_command', function (Blueprint $table) {
                $table->integer('userid');
                $table->integer('commandid');
                $table->index(['userid']);
                $table->index(['commandid']);
            });
        }

        // Table: tc_user_device
        if (! Schema::hasTable('tc_user_device')) {
            Schema::create('tc_user_device', function (Blueprint $table) {
                $table->integer('userid');
                $table->integer('deviceid');
                $table->index(['userid']);
                $table->index(['deviceid']);
            });
        }

        // Table: tc_user_driver
        if (! Schema::hasTable('tc_user_driver')) {
            Schema::create('tc_user_driver', function (Blueprint $table) {
                $table->integer('userid');
                $table->integer('driverid');
                $table->index(['userid']);
                $table->index(['driverid']);
            });
        }

        // Table: tc_user_geofence
        if (! Schema::hasTable('tc_user_geofence')) {
            Schema::create('tc_user_geofence', function (Blueprint $table) {
                $table->integer('userid');
                $table->integer('geofenceid');
                $table->index(['userid']);
                $table->index(['geofenceid']);
            });
        }

        // Table: tc_user_group
        if (! Schema::hasTable('tc_user_group')) {
            Schema::create('tc_user_group', function (Blueprint $table) {
                $table->integer('userid');
                $table->integer('groupid');
                $table->index(['userid']);
                $table->index(['groupid']);
            });
        }

        // Table: tc_user_maintenance
        if (! Schema::hasTable('tc_user_maintenance')) {
            Schema::create('tc_user_maintenance', function (Blueprint $table) {
                $table->integer('userid');
                $table->integer('maintenanceid');
                $table->index(['userid']);
                $table->index(['maintenanceid']);
            });
        }

        // Table: tc_user_notification
        if (! Schema::hasTable('tc_user_notification')) {
            Schema::create('tc_user_notification', function (Blueprint $table) {
                $table->integer('userid');
                $table->integer('notificationid');
                $table->index(['userid']);
                $table->index(['notificationid']);
            });
        }

        // Table: tc_user_order
        if (! Schema::hasTable('tc_user_order')) {
            Schema::create('tc_user_order', function (Blueprint $table) {
                $table->integer('userid');
                $table->integer('orderid');
                $table->index(['userid']);
                $table->index(['orderid']);
            });
        }

        // Table: tc_user_report
        if (! Schema::hasTable('tc_user_report')) {
            Schema::create('tc_user_report', function (Blueprint $table) {
                $table->integer('userid');
                $table->integer('reportid');
                $table->index(['userid']);
                $table->index(['reportid']);
            });
        }

        // Table: tc_user_user
        if (! Schema::hasTable('tc_user_user')) {
            Schema::create('tc_user_user', function (Blueprint $table) {
                $table->integer('userid');
                $table->integer('manageduserid');
                $table->index(['userid']);
                $table->index(['manageduserid']);
            });
        }

        // Table: tc_users
        if (! Schema::hasTable('tc_users')) {
            Schema::create('tc_users', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('name', 128);
                $table->string('email', 128);
                $table->string('hashedpassword', 128)->nullable();
                $table->string('salt', 128)->nullable();
                $table->tinyInteger('readonly')->default(0);
                $table->tinyInteger('administrator')->nullable();
                $table->string('map', 128)->nullable();
                $table->double('latitude')->default(0);
                $table->double('longitude')->default(0);
                $table->integer('zoom')->default(0);
                $table->string('attributes', 4000)->nullable();
                $table->string('coordinateformat', 128)->nullable();
                $table->tinyInteger('disabled')->nullable()->default(0);
                $table->timestamp('expirationtime')->nullable();
                $table->integer('devicelimit')->nullable()->default(-1);
                $table->integer('userlimit')->nullable()->default(0);
                $table->tinyInteger('devicereadonly')->nullable()->default(0);
                $table->string('phone', 128)->nullable();
                $table->tinyInteger('limitcommands')->nullable()->default(0);
                $table->string('login', 128)->nullable();
                $table->string('poilayer', 512)->nullable();
                $table->tinyInteger('disablereports')->nullable()->default(0);
                $table->tinyInteger('fixedemail')->nullable()->default(0);
                $table->string('totpkey', 64)->nullable();
                $table->tinyInteger('temporary')->nullable()->default(0);
                $table->unique(['email']);
                $table->index(['email']);
                $table->index(['login']);
            });
        }

        // Table: user_activation_tokens
        if (! Schema::hasTable('user_activation_tokens')) {
            Schema::create('user_activation_tokens', function (Blueprint $table) {
                $table->bigInteger('id')->unsigned()->autoIncrement();
                $table->bigInteger('user_id')->unsigned();
                $table->string('token', 64);
                $table->string('email', 255);
                $table->timestamp('expires_at');
                $table->timestamp('used_at')->nullable();
                $table->unique(['token']);
                $table->index(['token']);
                $table->index(['user_id']);
                $table->index(['email']);
                $table->timestamp('created_at')->useCurrent();
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_activation_tokens');
        Schema::dropIfExists('tc_users');
        Schema::dropIfExists('tc_user_user');
        Schema::dropIfExists('tc_user_report');
        Schema::dropIfExists('tc_user_order');
        Schema::dropIfExists('tc_user_notification');
        Schema::dropIfExists('tc_user_maintenance');
        Schema::dropIfExists('tc_user_group');
        Schema::dropIfExists('tc_user_geofence');
        Schema::dropIfExists('tc_user_driver');
        Schema::dropIfExists('tc_user_device');
        Schema::dropIfExists('tc_user_command');
        Schema::dropIfExists('tc_user_calendar');
        Schema::dropIfExists('tc_user_attribute');
        Schema::dropIfExists('tc_statistics');
        Schema::dropIfExists('tc_servers');
        Schema::dropIfExists('tc_revoked_tokens');
        Schema::dropIfExists('tc_reports');
        Schema::dropIfExists('tc_positions');
        Schema::dropIfExists('tc_orders');
        Schema::dropIfExists('tc_notifications');
        Schema::dropIfExists('tc_maintenances');
        Schema::dropIfExists('tc_keystore');
        Schema::dropIfExists('tc_groups');
        Schema::dropIfExists('tc_group_report');
        Schema::dropIfExists('tc_group_order');
        Schema::dropIfExists('tc_group_notification');
        Schema::dropIfExists('tc_group_maintenance');
        Schema::dropIfExists('tc_group_geofence');
        Schema::dropIfExists('tc_group_driver');
        Schema::dropIfExists('tc_group_command');
        Schema::dropIfExists('tc_group_attribute');
        Schema::dropIfExists('tc_geofences');
        Schema::dropIfExists('tc_events');
        Schema::dropIfExists('tc_drivers');
        Schema::dropIfExists('tc_devices');
        Schema::dropIfExists('tc_device_report');
        Schema::dropIfExists('tc_device_order');
        Schema::dropIfExists('tc_device_notification');
        Schema::dropIfExists('tc_device_maintenance');
        Schema::dropIfExists('tc_device_geofence');
        Schema::dropIfExists('tc_device_driver');
        Schema::dropIfExists('tc_device_command');
        Schema::dropIfExists('tc_device_attribute');
        Schema::dropIfExists('tc_commands_queue');
        Schema::dropIfExists('tc_commands');
        Schema::dropIfExists('tc_calendars');
        Schema::dropIfExists('tc_attributes');
        Schema::dropIfExists('tc_actions');
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('password_reset_logs');
        Schema::dropIfExists('gs_webhook_queue');
        Schema::dropIfExists('gs_users');
        Schema::dropIfExists('gs_user_zones');
        Schema::dropIfExists('gs_user_usage');
        Schema::dropIfExists('gs_user_templates');
        Schema::dropIfExists('gs_user_share_position');
        Schema::dropIfExists('gs_user_routes');
        Schema::dropIfExists('gs_user_reports_generated');
        Schema::dropIfExists('gs_user_reports');
        Schema::dropIfExists('gs_user_places_groups');
        Schema::dropIfExists('gs_user_objects');
        Schema::dropIfExists('gs_user_object_trailers');
        Schema::dropIfExists('gs_user_object_passengers');
        Schema::dropIfExists('gs_user_object_groups');
        Schema::dropIfExists('gs_user_object_drivers');
        Schema::dropIfExists('gs_user_markers');
        Schema::dropIfExists('gs_user_last_events_data');
        Schema::dropIfExists('gs_user_kml');
        Schema::dropIfExists('gs_user_fcm_tokens');
        Schema::dropIfExists('gs_user_failed_logins');
        Schema::dropIfExists('gs_user_expenses');
        Schema::dropIfExists('gs_user_events_status');
        Schema::dropIfExists('gs_user_events_data');
        Schema::dropIfExists('gs_user_events');
        Schema::dropIfExists('gs_user_cmd_schedule');
        Schema::dropIfExists('gs_user_cmd');
        Schema::dropIfExists('gs_user_billing_plans');
        Schema::dropIfExists('gs_user_account_recover');
        Schema::dropIfExists('gs_themes');
        Schema::dropIfExists('gs_templates');
        Schema::dropIfExists('gs_system');
        Schema::dropIfExists('gs_sms_queue');
        Schema::dropIfExists('gs_sms_gateway_app');
        Schema::dropIfExists('gs_rilogbook_data');
        Schema::dropIfExists('gs_push_queue');
        Schema::dropIfExists('gs_objects_unused');
        Schema::dropIfExists('gs_objects');
        Schema::dropIfExists('gs_object_tasks');
        Schema::dropIfExists('gs_object_services');
        Schema::dropIfExists('gs_object_sensors');
        Schema::dropIfExists('gs_object_img');
        Schema::dropIfExists('gs_object_data');
        Schema::dropIfExists('gs_object_custom_fields');
        Schema::dropIfExists('gs_object_cmd_exec');
        Schema::dropIfExists('gs_object_chat');
        Schema::dropIfExists('gs_maps');
        Schema::dropIfExists('gs_icons');
        Schema::dropIfExists('gs_geocoder_cache');
        Schema::dropIfExists('gs_email_queue');
        Schema::dropIfExists('gs_dtc_data');
        Schema::dropIfExists('gs_devices');
        Schema::dropIfExists('gs_device_commands');
        Schema::dropIfExists('gs_device_cmd_type');
        Schema::dropIfExists('gs_billing_plans');
        Schema::dropIfExists('gs_app');
        Schema::dropIfExists('gs_api_kemenhub');
        Schema::dropIfExists('databasechangeloglock');
        Schema::dropIfExists('databasechangelog');
        Schema::dropIfExists('ci_sessions');
        Schema::dropIfExists('ci_secure');
    }
};
