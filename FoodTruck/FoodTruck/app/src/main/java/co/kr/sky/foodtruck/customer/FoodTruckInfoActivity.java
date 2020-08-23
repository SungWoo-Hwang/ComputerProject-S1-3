package co.kr.sky.foodtruck.customer;

import android.content.Intent;
import android.location.Geocoder;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import net.daum.mf.map.api.MapPOIItem;
import net.daum.mf.map.api.MapPoint;
import net.daum.mf.map.api.MapView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import co.kr.sky.AccumThread;
import co.kr.sky.foodtruck.R;
import co.kr.sky.foodtruck.common.ActivityEx;
import co.kr.sky.foodtruck.common.DEFINE;
import co.kr.sky.foodtruck.obj.MemberObj;
import co.kr.sky.foodtruck.obj.MenuObj;

public class FoodTruckInfoActivity extends ActivityEx{

    private TextView common_title_tv;
    private EditText info;
    private EditText menu;
    private MemberObj obj;
    private Map<String, String> map = new HashMap<String, String>();
    private AccumThread mThread;
    ArrayList<MenuObj> arr = new ArrayList<MenuObj>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_foodtruckinfo);
        obj = getIntent().getParcelableExtra("obj");

        init();
        //메뉴 가져오기 api
        selmenu();
    }
    private void selmenu(){
        customProgressPop();
        map.clear();
        map.put("url", DEFINE.SERVER_URL + DEFINE.CUSTOMER_SEL_MENU);
        map.put("m_keyindex", obj.getKEYINDEX());

        //스레드 생성
        mThread = new AccumThread(getApplicationContext(), mAfterAccum, map, 0, 0, null);
        mThread.start();        //스레드 시작!!
    }
    private void init(){
        common_title_tv = (TextView)findViewById(R.id.common_title_tv);
        info = (EditText)findViewById(R.id.info);
        menu = (EditText)findViewById(R.id.menu);



        common_title_tv.setText(obj.getNAME());
        info.setText(obj.getINTRODUCE());

        findViewById(R.id.btn_hoogi).setOnClickListener(btnListener);
        findViewById(R.id.btn_order).setOnClickListener(btnListener);
        findViewById(R.id.common_left_btn).setOnClickListener(btnListener);

    }
    //버튼 리스너 구현 부분
    View.OnClickListener btnListener = new View.OnClickListener() {
        public void onClick(View v) {
            switch (v.getId()) {
                case R.id.btn_hoogi:
                    Intent it = new Intent(getApplicationContext() , HoogiActivity.class);
                    it.putExtra("obj" , obj);
                    startActivity(it);
                    break;
                case R.id.btn_order:
                    Intent it2 = new Intent(getApplicationContext() , OrderActivity.class);
                    it2.putExtra("obj" , obj);
                    startActivity(it2);
                    break;
                case R.id.common_left_btn:
                    finish();
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

                        JSONArray dataobj = jsonObject.getJSONArray("rc_data");
                        //채팅  db insert

                        for (int i = 0; i < dataobj.length(); i++) {
                            JSONObject resultListObject = dataobj.getJSONObject(i);
                            MenuObj item = new MenuObj(
                                    resultListObject.getString("KEYINDEX"),
                                    resultListObject.getString("M_KEYINDEX"),
                                    resultListObject.getString("NAME"),
                                    resultListObject.getString("PRICE"));
                            arr.add(item);
                        }
                    } else {
                        Toast.makeText(getApplicationContext(), "" + jsonObject.getString("rc_txt"), Toast.LENGTH_SHORT).show();
                        return;
                    }

                } catch (JSONException e) {
                    e.printStackTrace();
                }

                String resultMenu = "";
                for (int i=0; i< arr.size(); i++){
                    resultMenu = resultMenu + arr.get(i).getNAME() + " : " + arr.get(i).getPRICE() + "원\n";
                }
                menu.setText(resultMenu);
            }
        }
    };
}
