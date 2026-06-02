<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('gs_user_object_quota_transactions')) {
            return;
        }

        Schema::table('gs_user_object_quota_transactions', function (Blueprint $table) {
            if (! Schema::hasColumn('gs_user_object_quota_transactions', 'quota_before')) {
                $table->unsignedInteger('quota_before')->nullable()->after('quota_limit');
            }
            if (! Schema::hasColumn('gs_user_object_quota_transactions', 'quota_after')) {
                $table->unsignedInteger('quota_after')->nullable()->after('quota_before');
            }
            if (! Schema::hasColumn('gs_user_object_quota_transactions', 'billing_transaction_id')) {
                $table->unsignedInteger('billing_transaction_id')->nullable()->index()->after('quota_after');
            }
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('gs_user_object_quota_transactions')) {
            return;
        }

        Schema::table('gs_user_object_quota_transactions', function (Blueprint $table) {
            $columns = ['billing_transaction_id', 'quota_after', 'quota_before'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('gs_user_object_quota_transactions', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
