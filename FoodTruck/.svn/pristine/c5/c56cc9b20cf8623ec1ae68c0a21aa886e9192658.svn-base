package co.kr.sky.foodtruck.customer;

import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import co.kr.sky.AccumThread;
import co.kr.sky.foodtruck.R;
import co.kr.sky.foodtruck.adapter.HoogiListAdapter;
import co.kr.sky.foodtruck.adapter.MenuListAdapter;
import co.kr.sky.foodtruck.common.ActivityEx;
import co.kr.sky.foodtruck.common.Check_Preferences;
import co.kr.sky.foodtruck.common.DEFINE;
import co.kr.sky.foodtruck.obj.HoogiObj;
import co.kr.sky.foodtruck.obj.MemberObj;
import co.kr.sky.foodtruck.obj.MenuObj;

public class OrderActivity extends ActivityEx{

    private TextView common_title_tv;
    private ListView menuList;
    private TextView edit_body;
    private MemberObj obj;

    private Map<String, String> map = new HashMap<String, String>();
    private AccumThread mThread;
    ArrayList<MenuObj> arr = new ArrayList<MenuObj>();
    ArrayList<MenuObj> arr_order = new ArrayList<MenuObj>();

    private MenuListAdapter m_Adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_order);
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
        edit_body = (TextView)findViewById(R.id.edit_body);
        menuList = (ListView)findViewById(R.id.menuList);
        edit_body.setEnabled(false);

        edit_body.setText("주문해주세요.");
        common_title_tv.setText("주문");

        findViewById(R.id.btn_order).setOnClickListener(btnListener);
        findViewById(R.id.common_left_btn).setOnClickListener(btnListener);

    }
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

                        m_Adapter = new MenuListAdapter( OrderActivity.this , arr);
                        menuList.setOnItemClickListener(mItemClickListener);
                        menuList.setAdapter(m_Adapter);

                    } else {
                        Toast.makeText(getApplicationContext(), "" + jsonObject.getString("rc_txt"), Toast.LENGTH_SHORT).show();
                        return;
                    }

                } catch (JSONException e) {
                    e.printStackTrace();
                }

            }else if (msg.arg1 == 1) {
                customProgressClose();
                String res = (String) msg.obj;
                // res = res.replace(" ", "").replace("\n" , "");
                Log.e("SKY", "" + res);
                Toast.makeText(getApplicationContext() , "주문이 완료 되었습니다." , Toast.LENGTH_SHORT).show();
                edit_body.setText("주문해주세요.");
            }
        }
    };
    AdapterView.OnItemClickListener mItemClickListener = new AdapterView.OnItemClickListener() {
        public void onItemClick(AdapterView parent, View view, final int position, long id) {
            Log.e("SKY" , "SKY POSITION :: " + position);
//            AlertDialog.Builder alt_shut = new AlertDialog.Builder(SettingTab2Activity.this , AlertDialog.THEME_HOLO_LIGHT);
//            alt_shut.setTitle("알림");
//            alt_shut.setMessage("근로자의 얼굴을 등록 하시겠습니까?")
//                    .setCancelable(false)
//                    .setPositiveButton("확인", new DialogInterface.OnClickListener()
//                    {
//                        public void onClick(DialogInterface dialog, int id) {
//
//                            Intent it = new Intent(getApplicationContext() , FaceCameraActivity.class);
//                            it.putExtra("flag" , "worker_insert");
//                            it.putExtra("obj" , arr.get(position));
//                            startActivity(it);
//                        }
//                    })
//                    .setNegativeButton("취소", new DialogInterface.OnClickListener()
//                    {
//                        public void onClick(DialogInterface dialog, int id)
//                        {
//                            dialog.cancel();
//                        }
//                    });
//            AlertDialog alert_shut = alt_shut.create();
//            alert_shut.show();

            arr_order.add(arr.get(position));
            //edittext 새로고침
            String resultMergeStr = "";
            int sumPrice = 0;
            for (int i=0; i < arr_order.size(); i++){
                if(i==0)
                    resultMergeStr = "=====================\n";
                resultMergeStr = resultMergeStr + arr_order.get(i).getNAME() + " : " + arr_order.get(i).getPRICE() + "원\n";
                sumPrice = sumPrice + Integer.parseInt(arr_order.get(i).getPRICE());
            }
            resultMergeStr = resultMergeStr + "=====================\n";
            resultMergeStr = resultMergeStr + "총 금액 : " + sumPrice + "원";
            edit_body.setText(resultMergeStr);
        }
    };
    //버튼 리스너 구현 부분
    View.OnClickListener btnListener = new View.OnClickListener() {
        public void onClick(View v) {
            switch (v.getId()) {
                case R.id.btn_order:
                    if(arr_order.size() == 0){
                        Toast.makeText(getApplicationContext() , "메뉴를 선택해주세요." , Toast.LENGTH_SHORT).show();
                        return;
                    }
                    String n_keyindex = "";
                    for (int i=0; i < arr_order.size(); i ++){
                        if(i==0){
                            n_keyindex = arr_order.get(i).getKEYINDEX();
                        } else{
                            n_keyindex = n_keyindex + "," + arr_order.get(i).getKEYINDEX();
                        }


                    }

                    customProgressPop();
                    map.clear();
                    map.put("url", DEFINE.SERVER_URL + DEFINE.CUSTOMER_ORDER_MENU);
                    map.put("f_keyindex", obj.getKEYINDEX());       //음식점 인덱스
                    map.put("m_keyindex", Check_Preferences.getAppPreferences(getApplicationContext() , "KEYINDEX"));       //멤버 인데스
                    map.put("n_keyindex", n_keyindex);       //메뉴 인덱스(1,3,2,4)이런식으로..

                    //스레드 생성
                    mThread = new AccumThread(getApplicationContext(), mAfterAccum, map, 0, 1, null);
                    mThread.start();        //스레드 시작!!
                    break;
                case R.id.common_left_btn:
                    finish();
                    break;

            }
        }
    };

}
