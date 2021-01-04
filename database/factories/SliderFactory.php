<?php

use App\Models\Setting;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Models\Slider::class, function (Faker $faker) {
    return [
        'ar' => [
            'header' => 'عنوان النص',
            'body' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد',
        ],
        'en' => [
            'header' => $faker->name,
            'body' => $faker->paragraph(1),
        ],
        'image' => 'slider.jpg',
    ];
});
