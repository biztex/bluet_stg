<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use tgMdk\TGMDK_Exception;
use tgMdk\TGMDK_MerchantUtility;
use App\Models\Reservation;

class PushController extends Controller
{

    public function mpi(Request $request)
    {
        $body = $request->getContent();
        Log::debug("body:" . $body);

        $hmac = $request->header('content-hmac');
        Log::debug("content-hmac:" . $hmac);

        try {
            if (TGMDK_MerchantUtility::checkMessage($body, $hmac)) {
	        // データ取得
                $numberOfNotify = $request->numberOfNotify;
                $pushTime = $request->pushTime;
                Log::debug("numberOfNotify:" . $numberOfNotify);
                Log::debug("pushTime:" . $pushTime);
	        for ($i = 1; $i <= $numberOfNotify; $i++) {
                    $zeropadding4 = sprintf('%04d', $i);
                    $order_id = $request->{'orderId' . $zeropadding4};
                    $amount = $request->{'amount' . $zeropadding4};
	            // 予約ステータス更新
                    $reservation = Reservation::where('order_id', $order_id)->first();
	            if ($reservation) {
	        	$reservation->status == '予約確定';
	        	$reservation->save();
                    }
                }
                Log::debug('入金通知データの検証に成功しました。');
                return response("OK", 200);

            } else {
                Log::debug('入金通知データの検証に失敗しました。');

            }

        } catch (TGMDK_Exception $e) {
            Log::error('入金通知データの検証中に例外が発生しました。');

        }

        return response("NG", 500);
    }

}
