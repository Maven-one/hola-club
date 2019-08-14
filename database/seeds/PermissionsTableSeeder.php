<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [[
            'id'         => '1',
            'title'      => 'user_management_access',
            'created_at' => '2019-08-14 13:19:24',
            'updated_at' => '2019-08-14 13:19:24',
        ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '17',
                'title'      => 'audit_log_show',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '18',
                'title'      => 'audit_log_access',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '19',
                'title'      => 'outlet_create',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '20',
                'title'      => 'outlet_edit',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '21',
                'title'      => 'outlet_show',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '22',
                'title'      => 'outlet_delete',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '23',
                'title'      => 'outlet_access',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '24',
                'title'      => 'outlet_management_access',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '25',
                'title'      => 'training_create',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '26',
                'title'      => 'training_edit',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '27',
                'title'      => 'training_show',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '28',
                'title'      => 'training_delete',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '29',
                'title'      => 'training_access',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '30',
                'title'      => 'training_module_create',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '31',
                'title'      => 'training_module_edit',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '32',
                'title'      => 'training_module_show',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '33',
                'title'      => 'training_module_delete',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '34',
                'title'      => 'training_module_access',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '35',
                'title'      => 'asset_verification_create',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '36',
                'title'      => 'asset_verification_edit',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '37',
                'title'      => 'asset_verification_show',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '38',
                'title'      => 'asset_verification_delete',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '39',
                'title'      => 'asset_verification_access',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '40',
                'title'      => 'audit_create',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '41',
                'title'      => 'audit_edit',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '42',
                'title'      => 'audit_show',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '43',
                'title'      => 'audit_delete',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '44',
                'title'      => 'audit_access',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '45',
                'title'      => 'field_ops_request_create',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '46',
                'title'      => 'field_ops_request_edit',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '47',
                'title'      => 'field_ops_request_show',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '48',
                'title'      => 'field_ops_request_delete',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '49',
                'title'      => 'field_ops_request_access',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '50',
                'title'      => 'schedule_management_access',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '51',
                'title'      => 'call_cycle_create',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '52',
                'title'      => 'call_cycle_edit',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '53',
                'title'      => 'call_cycle_show',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '54',
                'title'      => 'call_cycle_delete',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '55',
                'title'      => 'call_cycle_access',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '56',
                'title'      => 'why_laggard_create',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '57',
                'title'      => 'why_laggard_edit',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '58',
                'title'      => 'why_laggard_show',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '59',
                'title'      => 'why_laggard_delete',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '60',
                'title'      => 'why_laggard_access',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ],
            [
                'id'         => '61',
                'title'      => 'misc_item_management_access',
                'created_at' => '2019-08-14 13:19:24',
                'updated_at' => '2019-08-14 13:19:24',
            ]];

        Permission::insert($permissions);
    }
}
