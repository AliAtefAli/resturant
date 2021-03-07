<?php

namespace App\Exports;


use App\Models\SubscriptionUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubscriptionUserExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $subscriptions = SubscriptionUser::with('subscription')
            ->where('start_date',  Carbon::tomorrow())
            ->whereNull('stopped_at');

        $subscriptions = $subscriptions->select("*", DB::raw("6371 * acos(cos(radians(" . lat() . "))
                                * cos(radians(lat)) * cos(radians(lng) - radians(" . lng() . "))
                                + sin(radians(" . lat() . ")) * sin(radians(lat))) AS distance"));
        $subscriptions = $subscriptions->having('distance', '<', 500);
        $subscriptions = $subscriptions->orderBy('distance', 'asc');
        $subscriptions = $subscriptions->get();

        $data[] = [
            'رقم الطلب',
            'اسم العميل',
            'بدايه الاشتراك',
            'نهايه الاشتراك',
            'الاستلام',
            'الهاتف',
            'الهاتف الاضافي',
            'لينك العنوان',
            'العنوان',
            'عدد الافراد',
            'نوع الخصم',
            'قيمه الخصم',
            'اسم الاشتراك',
            'السعر الكلي'];

        foreach ($subscriptions as $subscription)
        {
            if ($subscription->coupon_type == 'percent'){
                $coupon_type = 'نسبه';
                $coupon_amount = $subscription->coupon_amount . '%';
            }elseif($subscription->coupon_type == 'fixed'){
                $coupon_type = 'ثابت';
                $coupon_amount = $subscription->coupon_amount . 'ر.س';
            }elseif($subscription->coupon_type == null)
            {
                $coupon_type = 'لا يوجد';
                $coupon_amount = 'لا يوجد';
            }


            $data[] = [
                'رقم الطلب' => $subscription->id,
                'اسم العميل' => $subscription->user->name,
                'بدايه الاشتراك' => $subscription->start_date,
                'نهايه الاشتراك' => $subscription->end_date,
                'الاستلام' => $subscription->shipping_type,
                'الهاتف' => $subscription->user->phone,
                'الهاتف الاضافي' => ($subscription) ? $subscription->billing_phone : 'لا يوجد',
                'لينك العنوان' => 'https://www.google.com/maps/place/'. $subscription->billing_address,
                'العنوان' => $subscription->billing_address,
                'عدد الافراد' => $subscription->people_count,
                'نوع الخصم' => $coupon_type,
                'قيمه الخصم' => $coupon_amount,
                'اسم الاشتراك' => $subscription->subscription->name,
                'السعر الكلي' => $subscription->billing_total,
            ];
        }

        return collect($data);
    }

}
