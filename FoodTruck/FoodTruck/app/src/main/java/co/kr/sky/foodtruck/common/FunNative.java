package co.kr.sky.foodtruck.common;


import android.app.Activity;
import android.content.Intent;
import android.net.Uri;
import android.os.Handler;
import android.os.Message;
import android.util.Log;
import android.webkit.WebView;


public class FunNative {

	private WebView Webview_copy;
	CommonUtil dataSet = CommonUtil.getInstance();


	public void DownLoad(String url , Activity ac , WebView vc , String return_fun , Handler mAfterAccum){
		Log.e("SKY" , "--DownLoad-- :: ");
		Log.e("SKY" , "--DownLoad-- :: "+url);
		String val[] = url.split(",");
		for (int i = 0; i < val.length; i++) {
			Log.e("SKY" , "VAL["+i + "]  :: " + i + " --> " + val[i]);
		}
		Message msg2 = mAfterAccum.obtainMessage();
		msg2.obj = val[0];
		msg2.arg1 = 2;
		mAfterAccum.sendMessage(msg2);

	}

	public void Upload(String url , Activity ac , WebView vc , String return_fun , Handler mAfterAccum){
		Log.e("SKY" , "--Upload-- :: ");
		Log.e("SKY" , "--Upload-- :: "+url);
		String val[] = url.split(",");
		for (int i = 0; i < val.length; i++) {
			Log.e("SKY" , "VAL["+i + "]  :: " + i + " --> " + val[i]);
		}
		Message msg2 = mAfterAccum.obtainMessage();
		msg2.obj = val[0];
		msg2.arg1 = 1;
		mAfterAccum.sendMessage(msg2);

	}

	//로컬 사파리 브라우져 이동
	public void WebLoadUrl(String url , Activity ac , WebView vc , String return_fun , Handler mAfterAccum){
		Log.e("SKY" , "--WebLoadUrl-- :: ");
		String val[] = url.split(",");
		for (int i = 0; i < val.length; i++) {
			Log.e("SKY" , "VAL["+i + "]  :: " + i + " --> " + val[i]);
		}
		Intent intent = new Intent(Intent.ACTION_VIEW, Uri.parse(val[0]));
		ac.startActivity(intent);

		Log.e("SKY" , "javascript:"+return_fun + "('" + "true" +  "')");
		vc.loadUrl("javascript:"+return_fun + "('" + "true" +  "')");
	}

	public void GetPushToken(String url , Activity ac , WebView vc , String return_fun , Handler mAfterAccum){
		Log.e("SKY" , "--GetPushToken-- :: ");
		String val[] = url.split(",");
		for (int i = 0; i < val.length; i++) {
			Log.e("SKY" , "VAL["+i + "]  :: " + i + " --> " + val[i]);
		}

		Log.e("SKY" , "javascript:"+return_fun + "('" + Check_Preferences.getAppPreferences(ac , "TOKEN") +  "' , '" + "android" + "')");
		vc.loadUrl("javascript:"+return_fun + "('" + Check_Preferences.getAppPreferences(ac , "TOKEN") +  "' , '" + "android" + "')");

	}



}
