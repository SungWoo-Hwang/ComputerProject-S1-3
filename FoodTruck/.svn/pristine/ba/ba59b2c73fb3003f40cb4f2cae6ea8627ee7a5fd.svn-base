package co.kr.sky.foodtruck.customer;

import android.content.Intent;
import android.location.Geocoder;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.util.Log;
import android.view.View;
import android.widget.Button;
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
import co.kr.sky.foodtruck.JoinActivity;
import co.kr.sky.foodtruck.R;
import co.kr.sky.foodtruck.common.ActivityEx;
import co.kr.sky.foodtruck.common.DEFINE;
import co.kr.sky.foodtruck.obj.MemberObj;

public class CustomerMyInfoActivity extends ActivityEx {


    private TextView point_txt;
    private Button btn7;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_customermyinfo);

        init();
    }

    private void init(){
        point_txt = (TextView)findViewById(R.id.point_txt);

        point_txt.setText("포인트 : 100점");

        findViewById(R.id.btn_myinfo).setOnClickListener(btnListener);
        findViewById(R.id.btn__1).setOnClickListener(btnListener);
        findViewById(R.id.btn__2).setOnClickListener(btnListener);
        findViewById(R.id.btn__3).setOnClickListener(btnListener);

    }
    //버튼 리스너 구현 부분
    View.OnClickListener btnListener = new View.OnClickListener() {
        public void onClick(View v) {
            switch (v.getId()) {
                case R.id.btn_myinfo:
                    Intent it = new Intent(getApplicationContext() , JoinActivity.class);
                    it.putExtra("UpdateYN" , "YES");
                    startActivity(it);
                    break;
                case R.id.btn__1:
                    startActivity(new Intent(getApplicationContext() , CustomerMainActivity.class));
                    finish();
                    overridePendingTransition(0, 0);
                    break;
                case R.id.btn__2:
                    break;
                case R.id.btn__3:
                    startActivity(new Intent(getApplicationContext() , CustomerMyInfoActivity.class));
                    finish();
                    overridePendingTransition(0, 0);
                    break;

            }
        }
    };

}
