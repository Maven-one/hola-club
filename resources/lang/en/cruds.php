<?php

return [
    'userManagement'     => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'         => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'               => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'               => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
            'code'                     => 'Code',
            'code_helper'              => '',
            'mobile'                   => 'Mobile number',
            'mobile_helper'            => '',
        ],
    ],
    'auditLog'           => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'description'         => 'Description',
            'description_helper'  => '',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => '',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => '',
            'user_id'             => 'User ID',
            'user_id_helper'      => '',
            'properties'          => 'Properties',
            'properties_helper'   => '',
            'host'                => 'Host',
            'host_helper'         => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
        ],
    ],
    'outlet'             => [
        'title'          => 'Outlets',
        'title_singular' => 'Outlet',
        'fields'         => [
            'id'                                        => 'ID',
            'id_helper'                                 => '',
            'id_external'                               => 'Id External',
            'id_external_helper'                        => '',
            'sitecode'                                  => 'Site Code',
            'sitecode_helper'                           => '',
            'site_name'                                 => 'Site Name',
            'site_name_helper'                          => '',
            'correct_outlet_name'                       => 'Correct Outlet Name',
            'correct_outlet_name_helper'                => '',
            'installation_date'                         => 'Installation Date',
            'installation_date_helper'                  => '',
            'wave'                                      => 'Wave',
            'wave_helper'                               => '',
            'status'                                    => 'Status',
            'status_helper'                             => '',
            'outlet_feedback'                           => 'Outlet Feedback',
            'outlet_feedback_helper'                    => '',
            'created_at'                                => 'Created at',
            'created_at_helper'                         => '',
            'updated_at'                                => 'Updated at',
            'updated_at_helper'                         => '',
            'deleted_at'                                => 'Deleted at',
            'deleted_at_helper'                         => '',
            'gps'                                       => 'GPS',
            'gps_helper'                                => '',
            'w_3_w'                                     => 'W3W',
            'w_3_w_helper'                              => 'What 3 Words location',
            'area'                                      => 'Area',
            'area_helper'                               => '',
            'province'                                  => 'Province',
            'province_helper'                           => '',
            'css_role'                                  => 'CSS Role',
            'css_role_helper'                           => '',
            'css_user'                                  => 'CSS User',
            'css_user_helper'                           => '',
            'csr_role'                                  => 'CSR Role',
            'csr_role_helper'                           => '',
            'csr_user'                                  => 'CSR User',
            'csr_user_helper'                           => '',
            'field_ops_role'                            => 'Field Ops Role',
            'field_ops_role_helper'                     => '',
            'field_ops_user'                            => 'Field Ops User',
            'field_ops_user_helper'                     => '',
            'owner_role'                                => 'Owner Role',
            'owner_role_helper'                         => '',
            'owner_user'                                => 'Owner User',
            'owner_user_helper'                         => '',
            'heineken_rep_role'                         => 'Heineken Rep Role',
            'heineken_rep_role_helper'                  => '',
            'heineken_rep_user'                         => 'Heineken Rep User',
            'heineken_rep_user_helper'                  => '',
            'rebate_option'                             => 'Rebate Option',
            'rebate_option_helper'                      => '',
            'account_number'                            => 'Account Number',
            'account_number_helper'                     => '',
            'balance'                                   => 'Balance',
            'balance_helper'                            => '',
            'baskets_this_month'                        => 'Baskets This Month',
            'baskets_this_month_helper'                 => '',
            'baskets_last_90_days'                      => 'Baskets Last 90 Days',
            'baskets_last_90_days_helper'               => '',
            'baskets_last_2_weeks'                      => 'Baskets Last 2 Weeks',
            'baskets_last_2_weeks_helper'               => '',
            'qty_last_2_weeks'                          => 'Qty Last 2 Weeks',
            'qty_last_2_weeks_helper'                   => '',
            'no_of_active_shoppers_this_month'          => 'No Of Active Shoppers This Month',
            'no_of_active_shoppers_this_month_helper'   => '',
            'no_of_active_shoppers_last_2_weeks'        => 'No Of Active Shoppers Last 2 Weeks',
            'no_of_active_shoppers_last_2_weeks_helper' => '',
            'no_of_active_shoppers_all_time'            => 'No Of Active Shoppers All Time',
            'no_of_active_shoppers_all_time_helper'     => '',
            'no_of_unique_taps_this_month'              => 'No Of Unique Taps This Month',
            'no_of_unique_taps_this_month_helper'       => '',
            'no_of_unique_taps_last_2_weeks'            => 'No Of Unique Taps Last 2 Weeks',
            'no_of_unique_taps_last_2_weeks_helper'     => '',
            'caselot_performance'                       => 'Caselot Performance',
            'caselot_performance_helper'                => '',
            'how_do_i_improve_this_outlet'              => 'How Do I Improve This Outlet',
            'how_do_i_improve_this_outlet_helper'       => '',
        ],
    ],
    'outletManagement'   => [
        'title'          => 'Outlet Management',
        'title_singular' => 'Outlet Management',
    ],
    'training'           => [
        'title'          => 'Training',
        'title_singular' => 'Training',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => '',
            'outlet'                  => 'Outlet',
            'outlet_helper'           => '',
            'date'                    => 'Date',
            'date_helper'             => '',
            'start_time'              => 'Start Time',
            'start_time_helper'       => '',
            'end_time'                => 'End Time',
            'end_time_helper'         => '',
            'created_at'              => 'Created at',
            'created_at_helper'       => '',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => '',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => '',
            'training_modules'        => 'Training Modules',
            'training_modules_helper' => '',
            'person_trained'          => 'Person Trained',
            'person_trained_helper'   => '',
            'feedback'                => 'Feedback',
            'feedback_helper'         => '',
        ],
    ],
    'trainingModule'     => [
        'title'          => 'Training Modules',
        'title_singular' => 'Training Module',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'order'             => 'Order',
            'order_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'assetVerification'  => [
        'title'          => 'Asset Verification',
        'title_singular' => 'Asset Verification',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'date'               => 'Date',
            'date_helper'        => '',
            'start_time'         => 'Start Time',
            'start_time_helper'  => '',
            'end_time'           => 'End Time',
            'end_time_helper'    => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
            't_1_mini_1'         => 'T1 Mini 1',
            't_1_mini_1_helper'  => '',
            't_1_mini_2'         => 'T 1 Mini 2',
            't_1_mini_2_helper'  => '',
            'till_drawer'        => 'Till Drawer',
            'till_drawer_helper' => '',
            'scanner'            => 'Scanner',
            'scanner_helper'     => '',
            'ups'                => 'Ups',
            'ups_helper'         => '',
            'outlet'             => 'Outlet',
            'outlet_helper'      => '',
        ],
    ],
    'audit'              => [
        'title'          => 'Audit',
        'title_singular' => 'Audit',
        'fields'         => [
            'id'                                            => 'ID',
            'id_helper'                                     => '',
            'outlet'                                        => 'Outlet',
            'outlet_helper'                                 => '',
            'date'                                          => 'Date',
            'date_helper'                                   => '',
            'start_time'                                    => 'Start Time',
            'start_time_helper'                             => '',
            'end_time'                                      => 'End Time',
            'end_time_helper'                               => '',
            'at_least_2_spare_till_rolls'                   => 'At Least 2 Spare Till Rolls',
            'at_least_2_spare_till_rolls_helper'            => '',
            'more_than_20_hola_club_cards_available'        => 'More Than 20 Hola Club Cards Available',
            'more_than_20_hola_club_cards_available_helper' => '',
            'kazang_poster_visible'                         => 'Kazang Poster Visible',
            'kazang_poster_visible_helper'                  => '',
            'promo_poster_visible'                          => 'Promo Poster Visible',
            'promo_poster_visible_helper'                   => '',
            'hola_club_poster_available'                    => 'Hola Club Poster Available',
            'hola_club_poster_available_helper'             => '',
            'promotions_displayed_on_device'                => 'Promotions Displayed On Device',
            'promotions_displayed_on_device_helper'         => '',
            'wholesaler_1'                                  => 'Wholesaler 1',
            'wholesaler_1_helper'                           => '',
            'wholesaler_2'                                  => 'Wholesaler 2',
            'wholesaler_2_helper'                           => '',
            'wholesaler_3'                                  => 'Wholesaler 3',
            'wholesaler_3_helper'                           => '',
            'created_at'                                    => 'Created at',
            'created_at_helper'                             => '',
            'updated_at'                                    => 'Updated at',
            'updated_at_helper'                             => '',
            'deleted_at'                                    => 'Deleted at',
            'deleted_at_helper'                             => '',
            'device_in_correct_position'                    => 'Device In Correct Position',
            'device_in_correct_position_helper'             => '',
        ],
    ],
    'fieldOpsRequest'    => [
        'title'          => 'Field Ops Request',
        'title_singular' => 'Field Ops Request',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'outlet'                   => 'Outlet',
            'outlet_helper'            => '',
            'device'                   => 'Device',
            'device_helper'            => '',
            'fault_reason'             => 'Fault Reason',
            'fault_reason_helper'      => '',
            'fault_description'        => 'Fault Description',
            'fault_description_helper' => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],
    'scheduleManagement' => [
        'title'          => 'Schedule Management',
        'title_singular' => 'Schedule Management',
    ],
    'callCycle'          => [
        'title'          => 'Call Cycles',
        'title_singular' => 'Call Cycle',
        'fields'         => [
            'id'                               => 'ID',
            'id_helper'                        => '',
            'outlet'                           => 'Outlet',
            'outlet_helper'                    => '',
            'scheduled_visit_date_time'        => 'Scheduled Visit Date & Time',
            'scheduled_visit_date_time_helper' => '',
            'created_at'                       => 'Created at',
            'created_at_helper'                => '',
            'updated_at'                       => 'Updated at',
            'updated_at_helper'                => '',
            'deleted_at'                       => 'Deleted at',
            'deleted_at_helper'                => '',
            'csr_role'                         => 'CSR Role',
            'csr_role_helper'                  => '',
            'csr_user'                         => 'CSR User',
            'csr_user_helper'                  => '',
        ],
    ],
    'whyLaggard'         => [
        'title'          => 'Why Laggard or not using the device',
        'title_singular' => 'Why Laggard or not using the device',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'miscItemManagement' => [
        'title'          => 'Misc Item Management',
        'title_singular' => 'Misc Item Management',
    ],
];
