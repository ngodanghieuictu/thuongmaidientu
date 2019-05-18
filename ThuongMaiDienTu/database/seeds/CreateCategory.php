<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryTranslation;
class CreateCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        $root = [
            [
                'name' => 'Thời trang',
                'status' => 1,
                'trans' => [
                    [
                        'lang' => 'vi',
                        'name' => 'Thời trang',
                    ],
                    [
                        'lang' => 'en',
                        'name' => 'Fashion',
                    ]
                ],
            ],
            [
                'name' => 'Mẹ & Bé',
                'status' => 1,
                'trans' => [
                    [
                        'lang' => 'vi',
                        'name' => 'Mẹ & Bé',
                    ],
                    [
                        'lang' => 'en',
                        'name' => 'Mother & baby',
                    ]
                ],
            ],
            [
                'name' => 'Thiết bị gia dụng',
                'status' => 1,
                'trans' => [
                    [
                        'lang' => 'vi',
                        'name' => 'Thiết bị gia dụng',
                    ],
                    [
                        'lang' => 'en',
                        'name' => 'Appliances',
                    ]
                ],
            ],
            [
                'name' => 'Điện Thoại & Phụ kiện',
                'status' => 1,
                'trans' => [
                    [
                        'lang' => 'vi',
                        'name' => 'Điện Thoại & Phụ kiện',
                    ],
                    [
                        'lang' => 'en',
                        'name' => 'Phone & Accessories',
                    ]
                ],
            ],
            [
                'name' => 'Bách Hoá Online',
                'status' => 1,
                'trans' => [
                    [
                        'lang' => 'vi',
                        'name' => 'Bách Hoá Online',
                    ],
                    [
                        'lang' => 'en',
                        'name' => 'Online Encyclopedia',
                    ]
                ],
            ],
            [
                'name' => 'Máy tính & Laptop',
                'status' => 1,
                'trans' => [
                    [
                        'lang' => 'vi',
                        'name' => 'Máy tính & Laptop',
                    ],
                    [
                        'lang' => 'en',
                        'name' => 'PC & Laptop',
                    ]
                ],
            ],
            [
                'name' => 'Máy ảnh - Máy quay phim',
                'status' => 1,
                'trans' => [
                    [
                        'lang' => 'vi',
                        'name' => 'Máy ảnh - Máy quay phim',
                    ],
                    [
                        'lang' => 'en',
                        'name' => 'Camera Camcorder',
                    ]
                ],
            ],
            [
                'name' => 'Thời trang nam',
                'parent_id' => 1,
                'status' => 1,
                'trans' => [
                    [
                        'lang' => 'vi',
                        'name' => 'Thời trang nam',
                    ],
                    [
                        'lang' => 'en',
                        'name' => 'MAn',
                    ]
                ],
            ],
            [
                'name' => 'Thời trang nữ',
                'parent_id' => 1,
                'status' => 1,
                'trans' => [
                    [
                        'lang' => 'vi',
                        'name' => 'Thời trang nữ',
                    ],
                    [
                        'lang' => 'en',
                        'name' => 'Girl',
                    ]
                ],
            ],
        ];

        foreach ($root as $r){
            $trans = $r['trans'];
            unset($r['trans']);
            $node = new Category($r);
            $node->save();
            foreach ($trans as $t){
                $nt = new CategoryTranslation();
                $nt->category_id = $node->id;
                $nt->lang = $t['lang'];
                $nt->name = $t['name'];
                $nt->save();
            }
        }

        echo "create category root is finish\n";
    
    }
}
