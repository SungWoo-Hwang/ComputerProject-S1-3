package co.kr.sky.foodtruck;

import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.util.Log;
import android.widget.ListView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import co.kr.sky.AccumThread;
import co.kr.sky.foodtruck.adapter.OrderListAdapter;
import co.kr.sky.foodtruck.common.ActivityEx;
import co.kr.sky.foodtruck.common.Check_Preferences;
import co.kr.sky.foodtruck.common.DEFINE;
import co.kr.sky.foodtruck.customer.CustomerOrderActivity;
import co.kr.sky.foodtruck.obj.OrderListObj;

public class OrderListActivity extends ActivityEx{


    private ListView orderList;
    private Map<String, String> map = new HashMap<String, String>();
    private AccumThread mThread;
    ArrayList<OrderListObj> arr = new ArrayList<OrderListObj>();

    private OrderListAdapter m_Adapter;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_orderlist);

        init();
    }

    private void init(){
        orderList = (ListView)findViewById(R.id.orderList);

        SelectOrderApi();



    }
    private void SelectOrderApi(){

        customProgressPop();
        map.clear();
        map.put("url", DEFINE.SERVER_URL + DEFINE.MEMBER_ORDER_LIST);
        map.put("f_keyindex", Check_Preferences.getAppPreferences(getApplicationContext() , "KEYINDEX"));

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
                        m_Adapter = new OrderListAdapter( OrderListActivity.this , arr);
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
}
