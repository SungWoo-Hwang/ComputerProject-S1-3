package co.kr.sky.foodtruck;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import co.kr.sky.AccumThread;
import co.kr.sky.foodtruck.common.ActivityEx;
import co.kr.sky.foodtruck.common.Check_Preferences;
import co.kr.sky.foodtruck.common.DEFINE;
import co.kr.sky.foodtruck.customer.CustomerMainActivity;

public class LoginActivity extends ActivityEx {
    private Map<String, String> map = new HashMap<String, String>();
    private AccumThread mThread;
    private EditText edit_id , edit_pw;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        init();
    }

    private void init(){
        edit_id = (EditText)findViewById(R.id.edit_id);
        edit_pw = (EditText)findViewById(R.id.edit_pw);

        //점주
        edit_id.setText("snap40");
        edit_pw.setText("rbdyd3174");

        //고객
//        edit_id.setText("cc1");
//        edit_pw.setText("1234");

        findViewById(R.id.btn_login).setOnClickListener(btnListener);
        findViewById(R.id.btn_find_id).setOnClickListener(btnListener);
        findViewById(R.id.btn_find_pw).setOnClickListener(btnListener);
        findViewById(R.id.btn_join).setOnClickListener(btnListener);
        findViewById(R.id.btn_join2).setOnClickListener(btnListener);


        //test
        customProgressPop();
        map.clear();
        map.put("url", DEFINE.SERVER_URL + DEFINE.MEMBER_LOGIN);
        map.put("login_id", edit_id.getText().toString());
        map.put("login_pw", edit_pw.getText().toString());

        //스레드 생성
        mThread = new AccumThread(getApplicationContext(), mAfterAccum, map, 0, 0, null);
        mThread.start();        //스레드 시작!!


    }
    //버튼 리스너 구현 부분
    View.OnClickListener btnListener = new View.OnClickListener() {
        public void onClick(View v) {
            switch (v.getId()) {

                case R.id.btn_login:
                    if(edit_id.getText().toString().length() ==0 ||
                            edit_pw.getText().toString().length() ==0){
                        Toast.makeText(getApplicationContext(), "" + "모두 입력해주세요.", Toast.LENGTH_SHORT).show();
                        return;
                    }
                    customProgressPop();
                    map.clear();
                    map.put("url", DEFINE.SERVER_URL + DEFINE.MEMBER_LOGIN);
                    map.put("login_id", edit_id.getText().toString());
                    map.put("login_pw", edit_pw.getText().toString());

                    //스레드 생성
                    mThread = new AccumThread(getApplicationContext(), mAfterAccum, map, 0, 0, null);
                    mThread.start();        //스레드 시작!!
                    break;
                case R.id.btn_find_id:
                    break;
                case R.id.btn_find_pw:
                    break;
                case R.id.btn_join:
                    Intent it = new Intent(getApplicationContext() , JoinActivity.class);
                    it.putExtra("UpdateYN" , "NO");
                    it.putExtra("MemeberYN" , "MEMBER");
                    startActivity(it);
                    break;
                case R.id.btn_join2:
                    Intent it2 = new Intent(getApplicationContext() , JoinActivity.class);
                    it2.putExtra("UpdateYN" , "NO");
                    it2.putExtra("MemeberYN" , "CUSTOMER");
                    startActivity(it2);
                    break;
            }
        }
    };
    Handler mAfterAccum = new Handler() {
        @Override
        public void handleMessage(Message msg) {
            if (msg.arg1 == 0) {
                customProgressClose();
                String res = (String) msg.obj;
                // res = res.replace(" ", "").replace("\n" , "");
                Log.e("SKY" , "" + res);
                try {
                    JSONObject jsonObject = new JSONObject(res);                     //SUCCESS
                    //{"rc":"0000","rc_txt":"ok","rc_data":3397}
                    if (jsonObject.getString("rc").equals("000")) {
                        JSONObject pushobj = jsonObject.getJSONObject("rc_data");

                        Check_Preferences.setAppPreferences(getApplicationContext() , "KEYINDEX" , pushobj.getString("KEYINDEX"));
                        Check_Preferences.setAppPreferences(getApplicationContext() , "ID" , pushobj.getString("ID"));
                        Check_Preferences.setAppPreferences(getApplicationContext() , "PW" , pushobj.getString("PW"));
                        Check_Preferences.setAppPreferences(getApplicationContext() , "NAME" , pushobj.getString("NAME"));
                        Check_Preferences.setAppPreferences(getApplicationContext() , "PHONE" , pushobj.getString("PHONE"));
                        Check_Preferences.setAppPreferences(getApplicationContext() , "SHOP_KEEPER" , pushobj.getString("SHOP_KEEPER"));
                        Check_Preferences.setAppPreferences(getApplicationContext() , "IMG" , pushobj.getString("IMG"));
                        Check_Preferences.setAppPreferences(getApplicationContext() , "EMAIL" , pushobj.getString("EMAIL"));
                        Check_Preferences.setAppPreferences(getApplicationContext() , "KEEPER_YN" , pushobj.getString("KEEPER_YN"));
                        Check_Preferences.setAppPreferences(getApplicationContext() , "ADDRESS" , pushobj.getString("ADDRESS"));
                        Check_Preferences.setAppPreferences(getApplicationContext() , "WI" , pushobj.getString("WI"));
                        Check_Preferences.setAppPreferences(getApplicationContext() , "GI" , pushobj.getString("GI"));
                        Check_Preferences.setAppPreferences(getApplicationContext() , "INTRODUCE" , pushobj.getString("INTRODUCE"));
                        Check_Preferences.setAppPreferences(getApplicationContext() , "POINT" , pushobj.getString("POINT"));

                        if(pushobj.getString("SHOP_KEEPER").equals("CUSTOMER")){
                            startActivity(new Intent(getApplicationContext() , CustomerMainActivity.class));
                        }else{
                            startActivity(new Intent(getApplicationContext() , MainActivity.class));
                        }

                        return;
                    }else{
                        Toast.makeText(getApplicationContext(), "" + jsonObject.getString("rc_txt"), Toast.LENGTH_SHORT).show();
                    }

                } catch (JSONException e) {
                    e.printStackTrace();
                    customProgressClose();
                }
            }
        }
    };
}
