<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages.
    |
    */

    'accepted' => 'يجب قبول :attribute',
    'active_url' => ':attribute لا يُمثّل رابطًا صحيحًا',
    'after' => 'يجب على :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal' => ':attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha' => 'يجب أن لا يحتوي :attribute سوى على حروف',
    'alpha_dash' => 'يجب أن لا يحتوي :attribute على حروف، أرقام ومطّات.',
    'alpha_num' => 'يجب أن يحتوي :attribute على حروفٍ وأرقامٍ فقط',
    'array' => 'يجب أن يكون :attribute ًمصفوفة',
    'before' => 'يجب على :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal' => ':attribute يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date',
    'between' => [
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'file' => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'string' => 'يجب أن يكون عدد حروف النّص :attribute بين :min و :max',
        'array' => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max',
    ],
    'boolean' => 'يجب أن تكون قيمة :attribute إما true أو false ',
    'confirmed' => 'حقل التأكيد غير مُطابق للحقل :attribute',
    'date' => ':attribute ليس تاريخًا صحيحًا',
    'date_format' => 'لا يتوافق :attribute مع الشكل :format.',
    'different' => 'يجب أن يكون الحقلان :attribute و :other مُختلفان',
    'digits' => 'يجب أن يحتوي :attribute على :digits رقمًا/أرقام',
    'digits_between' => 'يجب أن يحتوي :attribute بين :min و :max رقمًا/أرقام ',
    'dimensions' => 'الـ :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'للحقل :attribute قيمة مُكرّرة.',
    'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صحيح البُنية',
    'exists' => 'القيمة المحددة :attribute غير موجودة',
    'file' => 'الـ :attribute يجب أن يكون ملفا.',
    'filled' => ':attribute إجباري',
    'image' => 'يجب أن يكون :attribute صورةً',
    'in' => ':attribute لاغٍ',
    'in_array' => ':attribute غير موجود في :other.',
    'integer' => 'يجب أن يكون :attribute عددًا صحيحًا',
    'ip' => 'يجب أن يكون :attribute عنوان IP صحيحًا',
    'ipv4' => 'يجب أن يكون :attribute عنوان IPv4 صحيحًا.',
    'ipv6' => 'يجب أن يكون :attribute عنوان IPv6 صحيحًا.',
    'json' => 'يجب أن يكون :attribute نصآ من نوع JSON.',
    'max' => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر لـ :max.',
        'file' => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت',
        'string' => 'يجب أن لا يتجاوز طول النّص :attribute :max حروفٍ/حرفًا',
        'array' => 'يجب أن لا يحتوي :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'mimes' => 'يجب أن يكون ملفًا من نوع : :values.',
    'mimetypes' => 'يجب أن يكون ملفًا من نوع : :values.',
    'min' => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر لـ :min.',
        'file' => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت',
        'string' => 'يجب أن يكون طول النص :attribute على الأقل :min حروفٍ/حرفًا',
        'array' => 'يجب أن يحتوي :attribute على الأقل على :min عُنصرًا/عناصر',
    ],
    'not_in' => ':attribute لاغٍ',
    'numeric' => 'يجب على :attribute أن يكون رقمًا',
    'present' => 'يجب تقديم :attribute',
    'regex' => 'صيغة :attribute .غير صحيحة',
    'required' => ':attribute مطلوب.',
    'required_if' => ':attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless' => ':attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with' => ':attribute مطلوب إذا توفّر :values.',
    'required_with_all' => ':attribute مطلوب إذا توفّر :values.',
    'required_without' => ':attribute مطلوب إذا لم يتوفّر :values.',
    'required_without_all' => ':attribute مطلوب إذا لم يتوفّر :values.',
    'same' => 'يجب أن يتطابق :attribute مع :other',
    'size' => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية لـ :size',
        'file' => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت',
        'string' => 'يجب أن يحتوي النص :attribute على :size حروفٍ/حرفًا بالظبط',
        'array' => 'يجب أن يحتوي :attribute على :size عنصرٍ/عناصر بالظبط',
    ],
    'string' => 'يجب أن يكون :attribute نصآ.',
    'timezone' => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا',
    'unique' => 'قيمة :attribute مُستخدمة من قبل',
    'uploaded' => 'فشل في تحميل الـ :attribute',
    'url' => 'صيغة الرابط :attribute غير صحيحة',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name' => 'الاسم',
        'username' => 'اسم المُستخدم',
        'email' => 'البريد الالكتروني',
        'first_name' => 'الاسم الأول',
        'last_name' => 'اسم الاخير',
        'password' => 'كلمة السر',
        'password_confirmation' => 'تأكيد كلمة السر',
        'city' => 'المدينة',
        'country' => 'الدولة',
        'address' => 'عنوان السكن',
        'phone' => 'الهاتف',
        'mobile' => 'الجوال',
        'age' => 'العمر',
        'sex' => 'الجنس',
        'gender' => 'النوع',
        'day' => 'اليوم',
        'month' => 'الشهر',
        'year' => 'السنة',
        'hour' => 'ساعة',
        'minute' => 'دقيقة',
        'second' => 'ثانية',
        'title' => 'العنوان',
        'content' => 'المُحتوى',
        'description' => 'الوصف',
        'excerpt' => 'المُلخص',
        'date' => 'التاريخ',
        'time' => 'الوقت',
        'available' => 'مُتاح',
        'size' => 'الحجم',
        'image' => 'صوره',
        'permissions' => 'الصلاحيات',
        'start_date' => 'تاريخ البدايه',
        'end_date' => 'تاريخ الانتهاء',
        'ar' => [
            'name' => 'الاسم بالغه العربيه',
            'title' => 'العنوان بالغه العربيه',
            'description' => 'الوصف بالغه العربيه',
        ],

        'en' => [
            'name' => 'الاسم بالغه الانجليزيه',
            'title' => 'العنوان بالغه الانجليزيه',
            'description' => 'الوصف بالغه الانجليزيه',
        ],

        'category_id' => 'القسم',
        'purchase_price' => 'سعر الشرلء',
        'sale_price' => 'سعر البيع',
        'stock' => 'مخزن',
        'phone.0' => 'التلفون',
    ],

    'field_min_8' => 'الحقل لا بد أن لا يقل عن 8 خانات',
    'field_min_6' => 'الحقل لا بد أن لا يقل عن 6 خانات',
    'field_min_5' => 'الحقل لا بد أن لا يقل عن 5 خانات',
    'field_min_3' => 'الحقل لا بد أن لا يقل عن 3 خانات',
    'field_image' => 'الحقل لا بد أن يكون صورة',
    'field_required_name' => 'حقل الاسم مطلوب',
    'field_required_emails' => 'من فضلك اختر الايميلات',
    'Message Required' => 'من فضلك ادخل الرسالة',
    'field_required_ar_name' => 'حقل الاسم بالعربيه مطلوب',
    'field_required_en_name' => 'حقل الاسم بالانجليزيه مطلوب',
    'field_policies_ar_name' => 'حقل ساسيه الموقع بالعربيه مطلوب',
    'field_policies_en_name' => 'حقل ساسيه الموقع بالانجليزيه مطلوب',
    'field_about_ar_name' => 'حقل عن الموقع بالعربيه مطلوب',
    'field_about_en_name' => 'حقل عن الموقع بالانجليزيه مطلوب',
    'field_currency_ar_name' => 'حقل العمله بالعربيه مطلوب',
    'field_currency_en_name' => 'حقل العمله بالانجليزيه مطلوب',
    'field_delivery_price' => 'حقل سعر التوصيل مطلوب',
    'field_required_ar_description' => 'حقل الوصف بالعربيه مطلوب',
    'field_required_en_description' => 'حقل الوصف بالانجليزيه مطلوب',
    'field_required_ar_question' => 'حقل السؤال بالعربيه مطلوب',
    'field_required_en_question' => 'حقل السؤال بالانجليزيه مطلوب',
    'field_required_ar_answer' => 'حقل الاجابه بالعربيه مطلوب',
    'field_required_en_answer' => 'حقل الاجابه بالانجليزيه مطلوب',
    'field_required_price' => 'حقل السعر مطلوب',
    'field_required_quantity' => 'حقل العدد مطلوب',
    'field_required_image' => 'حقل الصوره مطلوب',
    'field_required_category' => 'حقل ألاقسام مطلوب',
    'field_required_code' => 'حقل الرمز مطلوب',
    'field_required_ar_product' => 'حقل المنتجات بالعربيه مطلوب',
    'field_required_en_product' => 'حقل المنتجات بالانجليزيه مطلوب',
    'field_required_amount' => 'حقل القيمة مطلوب',
    'field_required_comment' => 'حقل التعليق مطلوب',
    'field_rate_required' => 'حقل التقييم مطلوب',
    'field_required_status' => 'حقل الحاله مطلوب',
    'field_required_discount' => 'حقل التخفيض مطلوب',
    'field_email' => 'حقل لا بد أن يكون بريد إلكتروني',
    'field_required_email' => 'حقل البريد إلكتروني مطلوب',
    'field_required_address' => 'حقل العنوان مطلوب',
    'field_required_phone' => 'حقل الهاتف مطلوب',
    'field_required_payment_method' => 'حقل طريقه الدفع مطلوب',
    'field_required_url' => 'حقل العنوان مطلوب',
    'field_required_ordered' => 'حقل الترتيب مطلوب',
    'field_unique_ordered' => 'من فضلك اختر ترتيب اخر',
    'field_required_duration_in_day' => 'حقل المده بالايام مطلوب',
    'field_required_type' => 'حقل النوع مطلوب',
    'field_required_password' => 'حقل كلمه المرور مطلوب',
    'field_required_old_password' => 'حقل كلمه المرور القديمة مطلوبة',
    'password_confirmed' => 'كلمة المرور غير متطابقة',
    'field_numeric' => 'الحقل لا بد أن يكون رقم',
    'field_whatsapp' => 'حقل الواتساب مطلوب',
    'field_facebook' => 'حقل الفيس بوك مطلوب',
    'field_twitter' => 'حقل التويتر مطلوب',
    'field_instagram' => 'حقل الانستجرام مطلوب',
    'field_linkedin' => 'حقل لينكد إن مطلوب',
    'field_snapchat' => 'حقل سناب شات مطلوب',
    'field_exists' => 'حقل موجود من قبل',
    'field_exists_code' => 'هذا الكود مستخدم من قبل',
    'field_wrong_code' => 'هذا الكود غير صحيح',
    'field_exists_phone' => 'هذا الهاتف مستخدم من قبل',
    'field_exists_email' => 'هذا البريد الإلكتروني مستخدم من قبل',
    'field_required' => 'هذا الحقل مطلوب',
    'These credentials do not match our data.' => 'البيانات غير مسجله من قبل ,  من فضلك اعد المحاولة',
    'These credentials is wrong' => 'البيانات غير صحيحه ,  من فضلك اعد المحاولة',
    'Please Enter Correct saudi arabia phone' => 'من فضلك ادخل رقم سعودي صحيح',
    'Please Enter Correct date' => 'من فضلك ادخل تاريخ صحيح',
    'Please Enter The Start date' => 'من فضلك ادخل تاريخ البداية',
    'Please Enter The End date' => 'من فضلك ادخل تاريخ التهاية',

    'policy' => 'يجب أن توافق على سياستنا للتسجيل',

    'policy_check' => 'أوافق على أنني قد قرأت وأقر بـ',

    'attributes' => [
    'start_date' => 'تاريخ البداية',
    'end_date' => 'تاريخ الانتهاء',
    'permissions' => 'الصلاحيات',
]

];
