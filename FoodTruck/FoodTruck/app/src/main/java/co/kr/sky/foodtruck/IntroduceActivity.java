package co.kr.sky.foodtruck;

import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import co.kr.sky.AccumThread;
import co.kr.sky.foodtruck.common.ActivityEx;
import co.kr.sky.foodtruck.common.Check_Preferences;
import co.kr.sky.foodtruck.common.DEFINE;

public class IntroduceActivity extends ActivityEx {
    private Map<String, String> map = new HashMap<String, String>();
    private AccumThread mThread;
    private ImageView img;
    private EditText introduce_edit;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_introduce);

        init();
    }

    private void init(){
        img = (ImageView)findViewById(R.id.img);
        introduce_edit = (EditText)findViewById(R.id.introduce_edit);

        introduce_edit.setText(Check_Preferences.getAppPreferences(this , "INTRODUCE"));
        findViewById(R.id.img_btn).setOnClickListener(btnListener);
        findViewById(R.id.savebtn).setOnClickListener(btnListener);
    }
    //버튼 리스너 구현 부분
    View.OnClickListener btnListener = new View.OnClickListener() {
        public void onClick(View v) {
            switch (v.getId()) {

                case R.id.img_btn:
                    break;
                case R.id.savebtn:
                    customProgressPop();
                    map.clear();
                    map.put("url", DEFINE.SERVER_URL + DEFINE.MEMBER_INTRODUCE);
                    map.put("key_index", "" + Check_Preferences.getAppPreferences(getApplicationContext() , "KEYINDEX"));
                    map.put("introduce", introduce_edit.getText().toString());

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
                        Toast.makeText(getApplicationContext(), "" + "저장 되었습니다.", Toast.LENGTH_SHORT).show();
                        Check_Preferences.setAppPreferences(getApplicationContext() , "INTRODUCE" , "" + introduce_edit.getText().toString());
                        finish();
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
