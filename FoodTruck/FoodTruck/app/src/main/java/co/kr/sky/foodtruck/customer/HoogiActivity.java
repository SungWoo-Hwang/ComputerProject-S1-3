package co.kr.sky.foodtruck.customer;

import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import net.daum.mf.map.api.MapPOIItem;
import net.daum.mf.map.api.MapPoint;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import co.kr.sky.AccumThread;
import co.kr.sky.foodtruck.R;
import co.kr.sky.foodtruck.adapter.HoogiListAdapter;
import co.kr.sky.foodtruck.common.ActivityEx;
import co.kr.sky.foodtruck.common.Check_Preferences;
import co.kr.sky.foodtruck.common.DEFINE;
import co.kr.sky.foodtruck.obj.HoogiObj;
import co.kr.sky.foodtruck.obj.MemberObj;
import co.kr.sky.foodtruck.obj.MenuObj;

public class HoogiActivity extends ActivityEx{

    private TextView common_title_tv;
    private EditText body_txt;
    private ListView reviewList;
    private MemberObj obj;
    private Map<String, String> map = new HashMap<String, String>();
    private AccumThread mThread;
    ArrayList<HoogiObj> arr = new ArrayList<HoogiObj>();
    private HoogiListAdapter m_Adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_hoogi);
        obj = getIntent().getParcelableExtra("obj");

        init();
        //메뉴 가져오기 api

    }

    private void init(){
        common_title_tv = (TextView)findViewById(R.id.common_title_tv);
        body_txt = (EditText)findViewById(R.id.body_txt);
        reviewList = (ListView) findViewById(R.id.reviewList);



        common_title_tv.setText("후기");

        findViewById(R.id.btn_send).setOnClickListener(btnListener);
        findViewById(R.id.common_left_btn).setOnClickListener(btnListener);
        selectList();
    }
    private void selectList(){
        customProgressPop();
        map.clear();
        map.put("url", DEFINE.SERVER_URL + DEFINE.CUSTOMER_HOOGI_SELECT);
        map.put("k_keyindex", obj.getKEYINDEX());



        //스레드 생성
        mThread = new AccumThread(getApplicationContext(), mAfterAccum, map, 0, 1, null);
        mThread.start();        //스레드 시작!!
    }

    //버튼 리스너 구현 부분
    View.OnClickListener btnListener = new View.OnClickListener() {
        public void onClick(View v) {
            switch (v.getId()) {
                case R.id.btn_send:
                    if(body_txt.getText().toString().equals("")){
                        Toast.makeText(getApplicationContext() , "내용을 입력해주세요." , Toast.LENGTH_SHORT).show();
                        return;
                    }
                    customProgressPop();
                    map.clear();
                    map.put("url", DEFINE.SERVER_URL + DEFINE.CUSTOMER_HOOGI_INSERT);
                    map.put("m_keyindex", Check_Preferences.getAppPreferences(getApplicationContext() , "KEYINDEX"));
                    map.put("k_keyindex", obj.getKEYINDEX());
                    map.put("review", body_txt.getText().toString());


                    //스레드 생성
                    mThread = new AccumThread(getApplicationContext(), mAfterAccum, map, 0, 0, null);
                    mThread.start();        //스레드 시작!!
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
                Log.e("SKY", "" + res);
                try {
                    JSONObject jsonObject = new JSONObject(res);                     //SUCCESS
                    //{"rc":"0000","rc_txt":"ok","rc_data":3397}
                    if (jsonObject.getString("rc").equals("000")) {
                        Toast.makeText(getApplicationContext(), "정상 등록 되었습니다.", Toast.LENGTH_SHORT).show();
                        selectList();
                    } else {
                        Toast.makeText(getApplicationContext(), "" + jsonObject.getString("rc_txt"), Toast.LENGTH_SHORT).show();
                        return;
                    }

                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }else if(msg.arg1 == 1){
                customProgressClose();
                String res = (String) msg.obj;
                // res = res.replace(" ", "").replace("\n" , "");
                Log.e("SKY", "" + res);

                arr.clear();
                try {
                    JSONObject jsonObject = new JSONObject(res);                     //SUCCESS
                    //{"rc":"0000","rc_txt":"ok","rc_data":3397}
                    if (jsonObject.getString("rc").equals("000")) {

                        JSONArray dataobj = jsonObject.getJSONArray("rc_data");
                        //채팅  db insert

                        for (int i = 0; i < dataobj.length(); i++) {
                            JSONObject resultListObject = dataobj.getJSONObject(i);
                            HoogiObj item = new HoogiObj(
                                    resultListObject.getString("KEYINDEX"),
                                    resultListObject.getString("M_KEYINDEX"),
                                    resultListObject.getString("K_KEYINDEX"),
                                    resultListObject.getString("REVIEW"),
                                    resultListObject.getString("DATE"),
                                    resultListObject.getString("ID"),
                                    resultListObject.getString("PW"),
                                    resultListObject.getString("NAME"),
                                    resultListObject.getString("PHONE"),
                                    resultListObject.getString("SHOP_KEEPER"),
                                    resultListObject.getString("IMG"),
                                    resultListObject.getString("EMAIL"),
                                    resultListObject.getString("KEEPER_YN"),
                                    resultListObject.getString("ADDRESS"),
                                    resultListObject.getString("WI"),
                                    resultListObject.getString("GI"),
                                    resultListObject.getString("INTRODUCE"),
                                    resultListObject.getString("POINT"));
                            arr.add(item);
                        }

                        m_Adapter = new HoogiListAdapter( HoogiActivity.this , arr);
                        //reviewList.setOnItemClickListener(mItemClickListener);
                        reviewList.setAdapter(m_Adapter);


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
