package co.kr.sky.foodtruck;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import co.kr.sky.AccumThread;
import co.kr.sky.foodtruck.common.ActivityEx;
import co.kr.sky.foodtruck.common.Check_Preferences;
import co.kr.sky.foodtruck.common.DEFINE;

public class JoinActivity extends ActivityEx {

    private Map<String, String> map = new HashMap<String, String>();
    private AccumThread mThread;
    private EditText edit1 , edit2 , edit3, edit4, edit5, edit6;
    private TextView appnametxt;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_join);

        init();
    }

    private void init(){
        appnametxt = (TextView)findViewById(R.id.appnametxt);
        edit1 = (EditText)findViewById(R.id.edit1);
        edit2 = (EditText)findViewById(R.id.edit2);
        edit3 = (EditText)findViewById(R.id.edit3);
        edit4 = (EditText)findViewById(R.id.edit4);
        edit5 = (EditText)findViewById(R.id.edit5);
        edit6 = (EditText)findViewById(R.id.edit6);

        if(getIntent().getStringExtra("UpdateYN").equals("YES")){
            //업데이트
            appnametxt.setText("회원정보수정");
            edit1.setEnabled(false);
            edit2.setEnabled(false);
            edit3.setEnabled(false);
            edit4.setEnabled(false);

            edit1.setText("" + Check_Preferences.getAppPreferences(getApplicationContext() , "NAME"));
            edit2.setText("" + Check_Preferences.getAppPreferences(getApplicationContext() , "PHONE"));
            edit3.setText("" + Check_Preferences.getAppPreferences(getApplicationContext() , "ID"));
            edit4.setText("" + Check_Preferences.getAppPreferences(getApplicationContext() , "EMAIL"));
        }else{
            appnametxt.setText("회원정보");
        }
        findViewById(R.id.btn7).setOnClickListener(btnListener);
    }
    //버튼 리스너 구현 부분
    View.OnClickListener btnListener = new View.OnClickListener() {
        public void onClick(View v) {
            switch (v.getId()) {
                case R.id.btn7:
                    //모두 입력했는지 체크
                    //비밀번호 체크
                    if(edit1.getText().toString().length() ==0 ||
                            edit2.getText().toString().length() ==0 ||
                            edit3.getText().toString().length() ==0 ||
                            edit4.getText().toString().length() ==0 ||
                            edit5.getText().toString().length() ==0 ||
                            edit6.getText().toString().length() ==0){
                        Toast.makeText(getApplicationContext(), "" + "모두 입력해주세요.", Toast.LENGTH_SHORT).show();
                        return;
                    }else if(!edit5.getText().toString().equals(edit6.getText().toString())){
                        Toast.makeText(getApplicationContext(), "" + "비밀번호가 일치하지 않습니다.", Toast.LENGTH_SHORT).show();
                        return;
                    }
                    if(getIntent().getStringExtra("UpdateYN").equals("YES")){
                        //업데이트
                        customProgressPop();
                        map.clear();
                        map.put("url", DEFINE.SERVER_URL + DEFINE.MEMBER_INFO_UPDATE);
                        map.put("key_index", "" + Check_Preferences.getAppPreferences(getApplicationContext() , "KEYINDEX"));
                        map.put("pw", edit5.getText().toString());

                        //스레드 생성
                        mThread = new AccumThread(getApplicationContext(), mAfterAccum, map, 0, 0, null);
                        mThread.start();        //스레드 시작!!
                    }else{
                        //회원가입
                        customProgressPop();
                        map.clear();
                        map.put("url", DEFINE.SERVER_URL + DEFINE.MEMBER_REGISTER);
                        map.put("name", edit1.getText().toString());
                        map.put("phone", edit2.getText().toString());
                        map.put("memberid", edit3.getText().toString());
                        map.put("memberemail", edit4.getText().toString());
                        map.put("memberpw", edit5.getText().toString());
                        if(getIntent().getStringExtra("MemeberYN").equals("MEMBER")){
                            //점주
                            map.put("shopkeeper", "N");     //영업 최초 OFF
                        }else{
                            //고객
                            map.put("shopkeeper", "CUSTOMER");
                        }
                        //스레드 생성
                        mThread = new AccumThread(getApplicationContext(), mAfterAccum, map, 0, 0, null);
                        mThread.start();        //스레드 시작!!
                    }
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
                        Toast.makeText(getApplicationContext(), "회원가입이 완료 되었습니다.", Toast.LENGTH_SHORT).show();
                        finish();
                        return;
                    } else {
                        Toast.makeText(getApplicationContext(), "" + jsonObject.getString("rc_txt"), Toast.LENGTH_SHORT).show();
                        return;
                    }

                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }
    };

}
