package co.kr.sky.foodtruck;

import androidx.appcompat.app.AppCompatActivity;
import co.kr.sky.AccumThread;
import co.kr.sky.foodtruck.common.ActivityEx;
import co.kr.sky.foodtruck.common.Check_Preferences;
import co.kr.sky.foodtruck.common.DEFINE;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class MainActivity extends ActivityEx {

    private Map<String, String> map = new HashMap<String, String>();
    private AccumThread mThread;

    private Button btn7;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        init();
    }

    private void setOnOff(){
        if(Check_Preferences.getAppPreferences(getApplicationContext() , "SHOP_KEEPER").equals("Y")){
            //영업중
            btn7.setText("영업 On");
        }else{
            btn7.setText("영업 Off");
        }
    }
    private void init(){
        btn7 = (Button)findViewById(R.id.btn7);
        findViewById(R.id.btn1).setOnClickListener(btnListener);
        findViewById(R.id.btn2).setOnClickListener(btnListener);
        findViewById(R.id.btn3).setOnClickListener(btnListener);
        findViewById(R.id.btn4).setOnClickListener(btnListener);
        findViewById(R.id.btn5).setOnClickListener(btnListener);
        findViewById(R.id.btn6).setOnClickListener(btnListener);
        findViewById(R.id.btn7).setOnClickListener(btnListener);

        setOnOff();
    }
    //버튼 리스너 구현 부분
    View.OnClickListener btnListener = new View.OnClickListener() {
        public void onClick(View v) {
            switch (v.getId()) {

                case R.id.btn1: //위치등록
                    startActivity(new Intent(getApplicationContext() , MapActivity.class));
                    break;
                case R.id.btn2: //가게소개입력
                    startActivity(new Intent(getApplicationContext() , IntroduceActivity.class));
                    break;
                case R.id.btn3: //매뉴정보입력
                    startActivity(new Intent(getApplicationContext() , MenuInfoInputActivity.class));
                    break;
                case R.id.btn4: //리뷰 보기
                    startActivity(new Intent(getApplicationContext() , ReviewActivity.class));
                    break;
                case R.id.btn5: //들어온 주문 보기
                    startActivity(new Intent(getApplicationContext() , OrderListActivity.class));
                    break;
                case R.id.btn6: //회전정보 수정
                    Intent it = new Intent(getApplicationContext() , JoinActivity.class);
                    it.putExtra("UpdateYN" , "YES");
                    startActivity(it);
                    break;
                case R.id.btn7: //영업 on/off
                    customProgressPop();
                    map.clear();
                    map.put("url", DEFINE.SERVER_URL + DEFINE.MEMBER_ON_OFF);
                    map.put("key_index", "" + Check_Preferences.getAppPreferences(getApplicationContext() , "KEYINDEX"));
                    map.put("onoff", Check_Preferences.getAppPreferences(getApplicationContext() , "SHOP_KEEPER").equals("Y") ? "N" : "Y");

                    //스레드 생성
                    mThread = new AccumThread(getApplicationContext(), mAfterAccum, map, 0, 0, null);
                    mThread.start();        //스레드 시작!!
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
                        Check_Preferences.setAppPreferences(getApplicationContext() , "SHOP_KEEPER" , pushobj.getString("SHOP_KEEPER"));
                        setOnOff();
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
