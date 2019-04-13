<?php

use Illuminate\Database\Seeder;
use App\UserCategory;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserCategory::create(['name' => 'kepala daerah','slug' => 'kepala-daerah',
            'permissions' => json_encode([
                //dashboard
                'show-dashboard' => true,
                //VISI & MISI
                'browse-visi_misi' => true,
                'add-visi_misi' => true,
                'edit-visi_misi' => true,
                'delete-visi_misi' => true,
                //TUJUAN
                'browse-tujuan' => false,
                'add-tujuan' => false,
                'edit-tujuan' => false,
                'delete-tujuan' => false,
                //USER
                'browse-user' => false,
                'add-user' => false,
                'edit-user' => false,
                'delete-user' => false,
            ]),
        ]);

        UserCategory::create(['name' => 'bappeda','slug' => 'bappeda',
            'permissions' => json_encode([
                //dashboard
                'show-dashboard' => true,
                //VISI & MISI
                'browse-visi_misi' => false,
                'add-visi_misi' => false,
                'edit-visi_misi' => false,
                'delete-visi_misi' => false,
                //TUJUAN
                'browse-tujuan' => true,
                'add-tujuan' => true,
                'edit-tujuan' => true,
                'delete-tujuan' => true,
                //USER
                'browse-user' => false,
                'add-user' => false,
                'edit-user' => false,
                'delete-user' => false,
            ]),
        ]);

        UserCategory::create(['name' => 'kepala opd','slug' => 'kepala-opd',
            'permissions' => json_encode([
                //dashboard
                'show-dashboard' => true,
                //VISI & MISI
                'browse-visi_misi' => false,
                'add-visi_misi' => false,
                'edit-visi_misi' => false,
                'delete-visi_misi' => false,
                //TUJUAN
                'browse-tujuan' => false,
                'add-tujuan' => false,
                'edit-tujuan' => false,
                'delete-tujuan' => false,
                //USER
                'browse-user' => false,
                'add-user' => false,
                'edit-user' => false,
                'delete-user' => false,
            ]),
        ]);

        UserCategory::create(['name' => 'opd','slug' => 'opd',
            'permissions' => json_encode([
                //dashboard
                'show-dashboard' => true,
                //VISI & MISI
                'browse-visi_misi' => false,
                'add-visi_misi' => false,
                'edit-visi_misi' => false,
                'delete-visi_misi' => false,
                //TUJUAN
                'browse-tujuan' => false,
                'add-tujuan' => false,
                'edit-tujuan' => false,
                'delete-tujuan' => false,
                //USER
                'browse-user' => false,
                'add-user' => false,
                'edit-user' => false,
                'delete-user' => false,
            ]),
        ]);

        UserCategory::create(['name' => 'tim ahli','slug' => 'tim-ahli',
            'permissions' => json_encode([
                //dashboard
                'show-dashboard' => false,
                //VISI & MISI
                'browse-visi_misi' => false,
                'add-visi_misi' => false,
                'edit-visi_misi' => false,
                'delete-visi_misi' => false,
                //TUJUAN
                'browse-tujuan' => false,
                'add-tujuan' => false,
                'edit-tujuan' => false,
                'delete-tujuan' => false,
                //USER
                'browse-user' => false,
                'add-user' => false,
                'edit-user' => false,
                'delete-user' => false,
            ]),
        ]);

        UserCategory::create(['name' => 'admin','slug' => 'admin',
            'permissions' => json_encode([
                //dashboard
                'show-dashboard' => true,
                //VISI & MISI
                'browse-visi_misi' => true,
                'add-visi_misi' => true,
                'edit-visi_misi' => true,
                'delete-visi_misi' => true,
                //TUJUAN
                'browse-tujuan' => true,
                'add-tujuan' => true,
                'edit-tujuan' => true,
                'delete-tujuan' => true,
                //USER
                'browse-user' => true,
                'add-user' => true,
                'edit-user' => true,
                'delete-user' => true,
            ]),
        ]);
    }
}
