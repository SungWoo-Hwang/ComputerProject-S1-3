package co.kr.sky.foodtruck;

import android.app.AlertDialog;
import android.app.NotificationChannel;
import android.app.NotificationManager;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.PackageInfo;
import android.content.pm.PackageManager;
import android.content.pm.Signature;
import android.graphics.Color;
import android.net.Uri;
import android.os.Build;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.util.Base64;
import android.util.Log;


import java.security.MessageDigest;
import java.util.HashMap;
import java.util.Map;

import androidx.core.app.ActivityCompat;
import co.kr.sky.AccumThread;
import co.kr.sky.foodtruck.common.ActivityEx;
import co.kr.sky.foodtruck.common.PermissionUtils;


public class IntroActivity extends ActivityEx {
    private int time = 0;
    private AccumThread mThread;
    private Map<String, String> map = new HashMap<String, String>();

    @SuppressWarnings("deprecation")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_intro);

        Log.e("SKY" , "INTRO");


        getAppKeyHash();

        if(Build.VERSION.SDK_INT > Build.VERSION_CODES.LOLLIPOP) {   // 롤리팝보다 버전이 높으면 추가 마진
            if (!PermissionUtils.canAccessCamera(IntroActivity.this) ||
                    !PermissionUtils.canWhitePhone(IntroActivity.this) ||
                    !PermissionUtils.canAccessPhone(IntroActivity.this)) {  // 폰 정보 권한이 없다면
                Log.i("SKY", "폰권한이 없다면");
                ActivityCompat.requestPermissions(IntroActivity.this, PermissionUtils.PHONE_PERMS, 1);
            } else {
                // 권한 있음
                Log.e("SKY", "권한 있음");
                mHandler.postDelayed(r, time);
            }
        } else {
            mHandler.postDelayed(r, time);
        }


    }
    private void getAppKeyHash() {
        try {
            PackageInfo info = getPackageManager().getPackageInfo(getPackageName(), PackageManager.GET_SIGNATURES);
            for (Signature signature : info.signatures) {
                MessageDigest md;
                md = MessageDigest.getInstance("SHA");
                md.update(signature.toByteArray());
                String something = new String(Base64.encode(md.digest(), 0));
                Log.e("Hash key", something);
            }
        } catch (Exception e) {
            // TODO Auto-generated catch block
            Log.e("name not found", e.toString());
        }
    }

    Handler mHandler = new Handler();
    Runnable r= new Runnable() {
        @Override
        public void run() {
            //첫실행
            startActivity(new Intent(getApplicationContext()  , LoginActivity.class));
            overridePendingTransition(0,0);
            finish();
        }
    };
    Handler mAfterAccum = new Handler() {
        @Override
        public void handleMessage(Message msg) {
            if (msg.arg1 == 1) {
                String res = (String) msg.obj;

                Log.e("SKY" , "res :: " + res);
                String version;
                PackageInfo i = null;
                try {
                    i = IntroActivity.this.getPackageManager().getPackageInfo(IntroActivity.this.getPackageName(), 0);
                    version = i.versionName.trim();

                    float serverVersion = Float.parseFloat(res);
                    float appVersion = Float.parseFloat(version);

                    if(serverVersion != appVersion){
                        final AlertDialog.Builder builder = new AlertDialog.Builder(IntroActivity.this , AlertDialog.THEME_DEVICE_DEFAULT_LIGHT);
                        builder.setMessage("업데이트 되었습니다. 구글플레이어 스토어로 이동합니다");
                        builder.setPositiveButton("확인", new DialogInterface.OnClickListener() {
                            @Override
                            public void onClick(DialogInterface dialog, int which) {
                                //어플 다운로드 페이지 이동(구글 스토어 이동
                                startActivity(new Intent(Intent.ACTION_VIEW, Uri.parse("market://details?id=" + getPackageName())));
                                finish();
                            }
                        });
                        final AlertDialog dialog = builder.create();
                        dialog.show();
                    }else{
                        startActivity(new Intent(getApplicationContext()  , MainActivity.class));
                        overridePendingTransition(0,0);
                        finish();
                    }
                } catch (PackageManager.NameNotFoundException e) {
                    e.printStackTrace();
                }

            }
        }
    };
    public void onRequestPermissionsResult(int requestCode, String permissions[], int[] grantResults) {
        switch (requestCode) {
            case 1:

                if (!PermissionUtils.canAccessCamera(IntroActivity.this) ||
                        PermissionUtils.canWhitePhone(IntroActivity.this) ||
                        PermissionUtils.canAccessPhone(IntroActivity.this)

                                ) {    // 폰 권한을 획득했다면
                    mHandler.postDelayed(r, time);
                } else {
                    AlertDialog.Builder alert = new AlertDialog.Builder(IntroActivity.this, AlertDialog.THEME_HOLO_LIGHT);
                    alert.setTitle("알림");
                    alert.setMessage("이앱은 모두 허용하여야만 사용이 가능한 어플리케이션 입니다.\n다시 이앱에 대한 권한을 설정하기 위해서 '설정/애플리케이션관리자/앱/권한' 으로 이동하여 모두 허용으로 변경해주세요.");
                    alert.setPositiveButton("확인", new DialogInterface.OnClickListener() {
                        public void onClick(DialogInterface dialog, int whichButton) {
                            ActivityCompat.requestPermissions(IntroActivity.this, PermissionUtils.PHONE_PERMS, 1);
                            mHandler.postDelayed(r, time);
                        }
                    });
                    alert.setNegativeButton("취소", new DialogInterface.OnClickListener() {
                        public void onClick(DialogInterface dialog, int whichButton) {
                            finish();
                        }
                    });
                    alert.show();
                }
                break;
            default:
                super.onRequestPermissionsResult(requestCode, permissions, grantResults);
                break;
        }
    }
}

