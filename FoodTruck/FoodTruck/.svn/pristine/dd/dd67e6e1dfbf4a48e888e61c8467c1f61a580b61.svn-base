package co.kr.sky.foodtruck.customer;

import android.content.Intent;
import android.location.Geocoder;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ListView;
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
import co.kr.sky.foodtruck.adapter.MenuListAdapter;
import co.kr.sky.foodtruck.adapter.OrderListAdapter;
import co.kr.sky.foodtruck.common.ActivityEx;
import co.kr.sky.foodtruck.common.Check_Preferences;
import co.kr.sky.foodtruck.common.DEFINE;
import co.kr.sky.foodtruck.obj.MemberObj;
import co.kr.sky.foodtruck.obj.MenuObj;
import co.kr.sky.foodtruck.obj.OrderListObj;

public class CustomerOrderActivity extends ActivityEx {
    private ListView orderList;
    private Map<String, String> map = new HashMap<String, String>();
    private AccumThread mThread;
    ArrayList<OrderListObj> arr = new ArrayList<OrderListObj>();

    private OrderListAdapter m_Adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_customerorder);

        init();
        SelectOrderApi();
    }

    private void init(){
        orderList = (ListView)findViewById(R.id.orderList);

        findViewById(R.id.btn__1).setOnClickListener(btnListener);
        findViewById(R.id.btn__2).setOnClickListener(btnListener);
        findViewById(R.id.btn__3).setOnClickListener(btnListener);

    }
    private void SelectOrderApi(){

        customProgressPop();
        map.clear();
        map.put("url", DEFINE.SERVER_URL + DEFINE.CUSTOMER_ORDER_LIST);
        map.put("m_keyindex", Check_Preferences.getAppPreferences(getApplicationContext() , "KEYINDEX"));

        //스레드 생성
        mThread = new AccumThread(getApplicationContext(), mAfterAccum, map, 0, 0, null);
        mThread.start();        //스레드 시작!!
    }

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
                            OrderListObj item = new OrderListObj(
                                    resultListObject.getString("NAME"),
                                    resultListObject.getString("DATE"),
                                    resultListObject.getString("M_NAME"),
                                    resultListObject.getString("PRICE"));
                            arr.add(item);
                        }
                        m_Adapter = new OrderListAdapter( CustomerOrderActivity.this , arr);
                        orderList.setAdapter(m_Adapter);
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

    //버튼 리스너 구현 부분
    View.OnClickListener btnListener = new View.OnClickListener() {
        public void onClick(View v) {
            switch (v.getId()) {

                case R.id.btn__1:
                    startActivity(new Intent(getApplicationContext() , CustomerMainActivity.class));
                    finish();
                    overridePendingTransition(0, 0);
                    break;
                case R.id.btn__2:
                    startActivity(new Intent(getApplicationContext() , CustomerOrderActivity.class));
                    finish();
                    overridePendingTransition(0, 0);
                    break;
                case R.id.btn__3:
                    break;

            }
        }
    };

}
