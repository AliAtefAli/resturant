<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    private $settings = [
        [
            'key' => 'site_ar_name',
            'value' =>  'الديناصور النباتي',
        ],
        [
            'key' => 'site_en_name',
            'value' =>  'dinosaur',
        ],
        [
            'key' => 'site_email',
            'value' =>  'admin@admin.com',
        ],
        [
            'key' => 'site_en_description',
            'value' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ],
        [
            'key' => 'site_ar_policies',
            'value' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص',
        ],
        [
            'key' => 'site_en_policies',
            'value' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ],
        [
            'key' => 'site_ar_about',
            'value' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص',
        ],
        [
            'key' => 'site_en_about',
            'value' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
        ],
        [
            'key' => 'site_ar_currency',
            'value' => 'ر.س',
        ],
        [
            'key' => 'site_en_currency',
            'value' => 'RAS',
        ],
        [
            'key' => 'site_ar_description',
            'value' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص',
        ],
        [
            'key' => 'delivery_price',
            'value' => 'Mon - Sat: 9:00 - 18:00',
        ],
        [
            'key' => 'site_phone',
            'value' => '1215454545',
        ],
        [
            'key' => 'site_logo',
            'value' => '5454545487.png',
        ],
        [
            'key' => 'site_favicon',
            'value' => '5454545487.png',
        ],
        [
            'key' => 'company_location',
            'value' => 'السعودية - الرياض',
        ],
        [
            'key' => 'company_latitude',
            'value' => '25.197197',
        ],
        [
            'key' => 'company_longitude',
            'value' => '55.27437639999994',
        ],
        [
            'key' => 'social_facebook',
            'value' => 'https://www.facebook.com/',
        ],
        [
            'key' => 'social_twitter',
            'value' => 'https://www.twitter.com/',
        ],
        [
            'key' => 'social_instagram',
            'value' => 'https://www.instagram.com/',
        ],
        [
            'key' => 'social_whatsapp',
            'value' => '5441254245421',
        ],
        [
            'key' => 'social_snapchat',
            'value' => 'https://www.snapchat.com/',
        ],
        [
            'key' => 'social_linkedin',
            'value' => 'https://www.linkedin.com/',
        ],

    ];

    public function run()
    {
        Setting::create($this->settings);
    }
}
