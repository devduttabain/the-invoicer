<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'client_create',
            ],
            [
                'id'    => 18,
                'title' => 'client_edit',
            ],
            [
                'id'    => 19,
                'title' => 'client_show',
            ],
            [
                'id'    => 20,
                'title' => 'client_delete',
            ],
            [
                'id'    => 21,
                'title' => 'client_access',
            ],
            [
                'id'    => 22,
                'title' => 'service_create',
            ],
            [
                'id'    => 23,
                'title' => 'service_edit',
            ],
            [
                'id'    => 24,
                'title' => 'service_show',
            ],
            [
                'id'    => 25,
                'title' => 'service_delete',
            ],
            [
                'id'    => 26,
                'title' => 'service_access',
            ],
            [
                'id'    => 27,
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 28,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 29,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 30,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 31,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 32,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 33,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 34,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 35,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 36,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 37,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 38,
                'title' => 'service_job_access',
            ],
            [
                'id'    => 39,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 40,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 41,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 42,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 43,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 44,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 45,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 46,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 47,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 48,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 49,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 50,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 51,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 52,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 53,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 54,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 55,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 56,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 57,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 58,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 59,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 60,
                'title' => 'service_item_create',
            ],
            [
                'id'    => 61,
                'title' => 'service_item_edit',
            ],
            [
                'id'    => 62,
                'title' => 'service_item_show',
            ],
            [
                'id'    => 63,
                'title' => 'service_item_delete',
            ],
            [
                'id'    => 64,
                'title' => 'service_item_access',
            ],
            [
                'id'    => 65,
                'title' => 'client_custom_data_create',
            ],
            [
                'id'    => 66,
                'title' => 'client_custom_data_edit',
            ],
            [
                'id'    => 67,
                'title' => 'client_custom_data_show',
            ],
            [
                'id'    => 68,
                'title' => 'client_custom_data_delete',
            ],
            [
                'id'    => 69,
                'title' => 'client_custom_data_access',
            ],
            [
                'id'    => 70,
                'title' => 'client_management_access',
            ],
            [
                'id'    => 71,
                'title' => 'invoice_create',
            ],
            [
                'id'    => 72,
                'title' => 'invoice_edit',
            ],
            [
                'id'    => 73,
                'title' => 'invoice_show',
            ],
            [
                'id'    => 74,
                'title' => 'invoice_delete',
            ],
            [
                'id'    => 75,
                'title' => 'invoice_access',
            ],
            [
                'id'    => 76,
                'title' => 'invoice_item_create',
            ],
            [
                'id'    => 77,
                'title' => 'invoice_item_edit',
            ],
            [
                'id'    => 78,
                'title' => 'invoice_item_show',
            ],
            [
                'id'    => 79,
                'title' => 'invoice_item_delete',
            ],
            [
                'id'    => 80,
                'title' => 'invoice_item_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
