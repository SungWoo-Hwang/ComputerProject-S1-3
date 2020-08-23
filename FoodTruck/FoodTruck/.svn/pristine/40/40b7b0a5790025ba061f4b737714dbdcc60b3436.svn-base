package co.kr.sky.foodtruck;

import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.LinearLayout;
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
import co.kr.sky.foodtruck.adapter.MenuListAdapter;
import co.kr.sky.foodtruck.common.ActivityEx;
import co.kr.sky.foodtruck.common.Check_Preferences;
import co.kr.sky.foodtruck.common.DEFINE;
import co.kr.sky.foodtruck.customer.OrderActivity;
import co.kr.sky.foodtruck.obj.MenuObj;

public class MenuInfoInputActivity extends ActivityEx {

    private LinearLayout centerview;
    private Map<String, String> map = new HashMap<String, String>();
    private AccumThread mThread;
    private int menuCount = 0;
    private EditText[] menuName = new EditText[100];
    private EditText[] menuPrice= new EditText[100];;
    ArrayList<MenuObj> arr = new ArrayList<MenuObj>();

    private ListView menuList;
    private MenuListAdapter m_Adapter;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menuinfoinput);

        init();
        //메뉴 가져오기 api
        selmenu();
    }

    private void init(){
        menuList = (ListView)findViewById(R.id.menuList);
        centerview = (LinearLayout)findViewById(R.id.centerview);


        findViewById(R.id.plus_btn).setOnClickListener(btnListener);
        findViewById(R.id.savebtn).setOnClickListener(btnListener);
    }
    private void selmenu(){
        customProgressPop();
        map.clear();
        map.put("url", DEFINE.SERVER_URL + DEFINE.CUSTOMER_SEL_MENU);
        map.put("m_keyindex", Check_Preferences.getAppPreferences(getApplicationContext() , "KEYINDEX"));

        //스레드 생성
        mThread = new AccumThread(getApplicationContext(), mAfterAccum, map, 0, 1, null);
        mThread.start();        //스레드 시작!!
    }
    //버튼 리스너 구현 부분
    View.OnClickListener btnListener = new View.OnClickListener() {
        public void onClick(View v) {
            switch (v.getId()) {

                case R.id.plus_btn:
                    View view = mLayoutInflater.inflate(R.layout.menuinfoinput, null);
                    menuName[menuCount] = (EditText)view.findViewById(R.id.menuname_edit);
                    menuPrice[menuCount] = (EditText)view.findViewById(R.id.price_edit);
                    centerview.addView(view);
                    menuCount++;
                    break;
                case R.id.savebtn:
                    String resultStr1 = "";
                    String resultStr2 = "";
                    if(menuCount > 0){
                        boolean flag = false;
                        for (int i=0; i < menuCount; i ++){
                            Log.e("SKY" , "menuName :: " + menuName[i].getText().toString() + "// menuPrice :: " + menuPrice[i].getText().toString());
                            if(menuName[i].getText().toString().length() > 0 && menuPrice[i].getText().toString().length() > 0){
                                flag = false;
                            }else {
                                flag = true;
                            }
                        }
                        if(flag){
                            Toast.makeText(getApplicationContext() , "빈칸이 없도록 입력해주세요" , Toast.LENGTH_LONG).show();
                            return;
                        }else{
                            for (int i=0; i < menuCount; i ++){
                                Log.e("SKY" , "menuName :: " + menuName[i].getText().toString() + "// menuPrice :: " + menuPrice[i].getText().toString());
                                if(menuName[i].getText().toString().length() > 0 && menuPrice[i].getText().toString().length() > 0){
                                    if(i ==0){
                                        resultStr1 = menuName[i].getText().toString();
                                        resultStr2 = menuPrice[i].getText().toString();
                                    }else{
                                        resultStr1+= "," + menuName[i].getText().toString();
                                        resultStr2+= "," + menuPrice[i].getText().toString();
                                    }
                                }
                            }
                            Log.e("SKY" , "resultStr1 :: " + resultStr1);
                            Log.e("SKY" , "resultStr2 :: " + resultStr2);
                            customProgressPop();
                            map.clear();
                            map.put("url", DEFINE.SERVER_URL + DEFINE.MEMBER_MENU_INSERT);
                            map.put("m_keyindex", "" + Check_Preferences.getAppPreferences(getApplicationContext() , "KEYINDEX"));
                            map.put("name", resultStr1);
                            map.put("price", resultStr2);

                            //스레드 생성
                            mThread = new AccumThread(getApplicationContext(), mAfterAccum, map, 0, 0, null);
                            mThread.start();        //스레드 시작!!

                        }
                    }else{
                        Toast.makeText(getApplicationContext() , "메뉴를 추가해주세요" , Toast.LENGTH_LONG).show();
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
                        Toast.makeText(getApplicationContext(), "" + "저장 되었습니다.", Toast.LENGTH_SHORT).show();
                        finish();
                        return;
                    }else{
                        Toast.makeText(getApplicationContext(), "" + jsonObject.getString("rc_txt"), Toast.LENGTH_SHORT).show();
                    }

                } catch (JSONException e) {
                    e.printStackTrace();
                    customProgressClose();
                }
            }else if (msg.arg1 == 1) {
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
                        m_Adapter = new MenuListAdapter( MenuInfoInputActivity.this , arr);
                        //menuList.setOnItemClickListener(mItemClickListener);
                        menuList.setAdapter(m_Adapter);


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
