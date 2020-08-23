package co.kr.sky.foodtruck.common;

import android.app.Activity;
import android.app.DownloadManager;
import android.content.Context;
import android.content.pm.PackageInfo;
import android.graphics.Bitmap;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Typeface;
import android.graphics.drawable.Drawable;
import android.net.Uri;
import android.os.Build;
import android.os.Environment;
import android.os.Handler;
import android.util.Log;
import android.view.View;
import android.view.inputmethod.InputMethodManager;
import android.widget.EditText;
import android.widget.Toast;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.net.Inet4Address;
import java.net.InetAddress;
import java.net.NetworkInterface;
import java.net.SocketException;
import java.text.DecimalFormat;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Collections;
import java.util.Date;
import java.util.Enumeration;
import java.util.List;
import java.util.regex.Matcher;
import java.util.regex.Pattern;


public class CommonUtil {
	private static CommonUtil _instance;


	public String idBySerialNumber;
	public Boolean LIFE;
	public Handler hm;
	public String VERSION;
	public String REG_ID;

	public Activity ac;

	public static ArrayList<String> Place_arr = new ArrayList<String>();

	private static final String Email_PATTERN = "^[_a-zA-Z0-9-\\.]+@[\\.a-zA-Z0-9-]+\\.[a-zA-Z]+$";
	private static final String Passwrod_PATTERN = "^(?=.*[a-zA-Z]+)(?=.*[!@#$%^*+=-]|.*[0-9]+).{6,16}$";

	public static Typeface font = null;
	public static void setFont(Context context) {

		if(font != null){
			return;
		}
		font = Typeface.createFromAsset(context.getAssets(), "coolvetica.ttf");
	}

	public static Typeface lsfont = null;
	public static void setLSFont(Context context) {

		if(lsfont != null){
			return;
		}
		lsfont = Typeface.createFromAsset(context.getAssets(), "coolvetica.ttf");
	}

	static {
		_instance = new CommonUtil();
		try {
//            _instance.SERVER    = 	   		"http://ec2-13-115-119-239.ap-northeast-1.compute.amazonaws.com/BigWordEgs/";
//			_instance.Local_Path = 	   	    "/data/data/co.kr.bigwordenglish/databases";
			_instance.idBySerialNumber = 	   		"";
			_instance.VERSION = 	   		"";
			_instance.LIFE = 	   		false;
			_instance.hm = null;
			_instance.REG_ID = "";




		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

	public static CommonUtil getInstance() {
		return _instance;
	}

	public int GetYYYY(){
		Calendar cal = Calendar.getInstance();
		int year = cal.get ( cal.YEAR );
		return  year;
	}
	public int GetMM(){
		Calendar cal = Calendar.getInstance();
		int month = cal.get ( cal.MONTH );
		return  (month+1);
	}
	public int GetDD(){
		Calendar cal = Calendar.getInstance();
		int day = cal.get ( cal.DATE );
		return  day;
	}

	public ArrayList<String> Trafficarr(){
		ArrayList<String> arr = new ArrayList<String>();
		arr.add("모두");
		arr.add("버스");
		arr.add("항공");
		arr.add("전철");
		arr.add("철도(KTX)");
		arr.add("기타");
		return arr;
	}

	public static String geApplicationVersion(Context cv) {
		String version;
		try {
			PackageInfo i = cv.getPackageManager().getPackageInfo(cv.getPackageName(), 0);
			version = i.versionName;
			return version;
		} catch(Exception e) {
		}
		return "";
	}
	public static String getIPAddress(boolean useIPv4) {
		try {
			List<NetworkInterface> interfaces = Collections.list(NetworkInterface.getNetworkInterfaces());
			for (NetworkInterface intf : interfaces) {
				List<InetAddress> addrs = Collections.list(intf.getInetAddresses());
				for (InetAddress addr : addrs) {
					if (!addr.isLoopbackAddress()) {
						String sAddr = addr.getHostAddress();
						//boolean isIPv4 = InetAddressUtils.isIPv4Address(sAddr);
						boolean isIPv4 = sAddr.indexOf(':')<0;

						if (useIPv4) {
							if (isIPv4)
								return sAddr;
						} else {
							if (!isIPv4) {
								int delim = sAddr.indexOf('%'); // drop ip6 zone suffix
								return delim<0 ? sAddr.toUpperCase() : sAddr.substring(0, delim).toUpperCase();
							}
						}
					}
				}
			}
		} catch (Exception ex) { } // for now eat exceptions
		return "";
	}

	/**
	 * Image SDCard Save (input Bitmap -> saved file JPEG)
	 * Writer intruder(Kwangseob Kim)
	 * @param bitmap : input bitmap file
	 * @param folder : input folder name
	 * @param name   : output file name
	 */
	public static void saveBitmaptoJpeg(Bitmap bitmap, String folder, String name){
		String ex_storage = Environment.getExternalStorageDirectory().getAbsolutePath();
		// Get Absolute Path in External Sdcard
		String foler_name = "/"+folder+"/";
		String file_name = name+".jpg";
		String string_path = ex_storage+foler_name;
		Log.e("SKY", "string_path :: " + string_path);

		File file_path;
		try{
			file_path = new File(string_path);
			if(!file_path.isDirectory()){
				file_path.mkdirs();
			}
			FileOutputStream out = new FileOutputStream(string_path+file_name);

			bitmap.compress(Bitmap.CompressFormat.JPEG, 100, out);
			out.close();

		}catch(FileNotFoundException exception){
			Log.e("FileNotFoundException", exception.getMessage());
		}catch(IOException exception){
			Log.e("IOException", exception.getMessage());
		}
	}

	/**
	 * Image SDCard Save (input Bitmap -> saved file JPEG)
	 * Writer intruder(Kwangseob Kim)
	 * @param bitmap : input bitmap file
	 * @param folder : input folder name
	 * @param name   : output file name
	 */
	public static void saveBitmaptoJpeg2(Bitmap bitmap, String folder, String name){
		String ex_storage = Environment.getExternalStorageDirectory().getAbsolutePath();
		// Get Absolute Path in External Sdcard
		String foler_name = "/"+folder;
		String file_name = name+".jpg";
		String string_path = ex_storage+foler_name;
		Log.e("SKY", "string_path :: " + string_path);
		Log.e("SKY" , "string_path+file_name " + string_path+file_name);

		File file_path;
		try{
			file_path = new File(string_path);
			if(!file_path.isDirectory()){
				file_path.mkdirs();
			}
			FileOutputStream out = new FileOutputStream(string_path+file_name);

			bitmap.compress(Bitmap.CompressFormat.JPEG, 100, out);
			out.close();
			Log.e("SKY" , "string_path+file_name end");

		}catch(FileNotFoundException exception){
			Log.e("FileNotFoundException", exception.getMessage());
		}catch(IOException exception){
			Log.e("IOException", exception.getMessage());
		}
	}
	public static String getLocalIpAddress() {
		try {
			for (Enumeration<NetworkInterface> en = NetworkInterface.getNetworkInterfaces(); en.hasMoreElements();) {
				NetworkInterface intf = en.nextElement();
				for (Enumeration<InetAddress> enumIpAddr = intf.getInetAddresses(); enumIpAddr.hasMoreElements();) {
					InetAddress inetAddress = enumIpAddr.nextElement();
					if (!inetAddress.isLoopbackAddress() && inetAddress instanceof Inet4Address) {
						return inetAddress.getHostAddress();
					}
				}
			}
		} catch (SocketException ex) {
			ex.printStackTrace();
		}
		return null;
	}

	public void FileDown(Context cv , String url , String title){
		Log.e("SKY" , "DOWON url :: " + url);
		Log.e("SKY" , "DOWON title :: " + title);
		String title1[] = url.split("\\.");
		Log.e("SKY" , "title1 size :: " + title1.length);
		title = title + "." + title1[title1.length-1];
		Log.e("SKY" , "DOWON title :: " + title);

		Uri source = Uri.parse(url);
		// Make a new request pointing to the .apk url
		DownloadManager.Request request = new DownloadManager.Request(source);
		// appears the same in Notification bar while downloading
		request.setDescription("Description for the DownloadManager Bar");
		request.setTitle(title);
		if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.HONEYCOMB) {
			request.allowScanningByMediaScanner();
			request.setNotificationVisibility(DownloadManager.Request.VISIBILITY_VISIBLE_NOTIFY_COMPLETED);
		}
		// save the file in the "Downloads" folder of SDCARD
		request.setDestinationInExternalPublicDir(Environment.DIRECTORY_DOWNLOADS, title);
		// get download service and enqueue file
		DownloadManager manager = (DownloadManager) cv.getSystemService(Context.DOWNLOAD_SERVICE);
		manager.enqueue(request);
		Toast.makeText(cv , "다운로드 완료" , Toast.LENGTH_SHORT).show();
	}


	/**
	 * 이메일이 올바른지 확인
	 * @param email
	 * @return boolean
	 */
	public static boolean checkEmail(String email){
		Pattern pattern = Pattern.compile(Email_PATTERN);
		Matcher matcher = pattern.matcher(email);
		return matcher.matches();
	}

	/**
	 * 패스워드가 올바른지 확인
	 * @param passwd
	 * @return boolean
	 */
	public static boolean checkPasswd(String passwd) {
		Pattern pattern = Pattern.compile(Passwrod_PATTERN);
		Matcher matcher = pattern.matcher(passwd);
		return matcher.matches();
	}

	/**
	 * 키보드 내리기
	 * @param context
	 * @param et
	 */
	public static void hideKeyboard(final Context context, final EditText et){
		et.postDelayed(new Runnable() {                // 키보드 내리기
			public void run() {
				InputMethodManager imm = (InputMethodManager) context.getSystemService(Context.INPUT_METHOD_SERVICE);
				imm.hideSoftInputFromWindow(et.getWindowToken(), 0);
			}
		}, 100);
	}

	/**
	 * 키보드 띄우기
	 * @param context
	 * @param et
	 */
	public static void showKeyboard(final Context context, final EditText et){
		et.postDelayed(new Runnable() {
			public void run() {
				InputMethodManager mgr = (InputMethodManager) context.getSystemService(Context.INPUT_METHOD_SERVICE);
				mgr.showSoftInput(et, InputMethodManager.SHOW_FORCED);
			}
		}, 200);
	}

	/**
	 * 문자열 -> 원화 형식으로 변경
	 * @param comma 문자열
	 * @return
	 */
	public static String setComma(String comma){
		int result = Integer.parseInt(comma);
		return new DecimalFormat("#,###").format(result);
	}

	/**
	 * 숫자를 2자리 수로 표현
	 * @param num 숫자
	 * @return
	 */
	public static String getTwoDateFormat(int num){
		DecimalFormat decimalFormat = new DecimalFormat("00");
		return decimalFormat.format(num);
	};


	public static String dateSubString(String date) {
		if (date.length() == 19) {
			date = date.substring(0, 10);
			return date;
		} else {
			return date;
		}
	}

	/**
	 * 특정 날짜에 대하여 요일을 구함(일 ~ 토)
	 * @param date
	 * @param dateType
	 * @return
	 * @throws Exception
	 */
	public static String getDateDay(String date, String dateType) throws Exception {

		String day = "" ;

		SimpleDateFormat dateFormat = new SimpleDateFormat(dateType) ;
		Date nDate = dateFormat.parse(date) ;

		Calendar cal = Calendar.getInstance() ;
		cal.setTime(nDate);

		int dayNum = cal.get(Calendar.DAY_OF_WEEK) ;

		switch(dayNum) {
			case 1:
				day = "일";
				break;
			case 2:
				day = "월";
				break;
			case 3:
				day = "화";
				break;
			case 4:
				day = "수";
				break;
			case 5:
				day = "목";
				break;
			case 6:
				day = "금";
				break;
			case 7:
				day = "토";
				break;
		}
		return day ;
	}

	public static Bitmap getBitmapFromView(View view) {
		Bitmap returnedBitmap = Bitmap.createBitmap(view.getWidth(), view.getHeight(), Bitmap.Config.ARGB_8888);
		Canvas canvas = new Canvas(returnedBitmap);
		Drawable bgDrawable =view.getBackground();
		if (bgDrawable!=null)
			bgDrawable.draw(canvas);
		else
			canvas.drawColor(Color.WHITE);
		view.draw(canvas);
		return returnedBitmap;
	}

}
