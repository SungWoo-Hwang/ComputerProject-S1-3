package co.kr.sky.foodtruck;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.location.Address;
import android.location.Geocoder;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.util.Log;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import net.daum.mf.map.api.MapPoint;
import net.daum.mf.map.api.MapView;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import co.kr.sky.AccumThread;
import co.kr.sky.foodtruck.common.ActivityEx;
import co.kr.sky.foodtruck.common.Check_Preferences;
import co.kr.sky.foodtruck.common.DEFINE;

public class MapActivity extends ActivityEx implements  MapView.MapViewEventListener{
    final Geocoder geocoder = new Geocoder(this);

    private TextView address_txt;
    private EditText detail_address_edit;

    private RelativeLayout bodyview;
    private MapView mapview;

    //save data
    private double wi;
    private double gi;
    private String addressName = "";
    private String detailAddressName = "";

    private Map<String, String> map = new HashMap<String, String>();
    private AccumThread mThread;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_map);

        init();
    }

    private void init(){
        address_txt = (TextView)findViewById(R.id.address_txt);
        detail_address_edit = (EditText)findViewById(R.id.detail_address_edit);


        bodyview = (RelativeLayout)findViewById(R.id.bodyview);
        mapview = (MapView)findViewById(R.id.mapview);
        mapview.setMapViewEventListener(this);

        findViewById(R.id.savebtn).setOnClickListener(btnListener);

    }
    //버튼 리스너 구현 부분
    View.OnClickListener btnListener = new View.OnClickListener() {
        public void onClick(View v) {
            switch (v.getId()) {
                case R.id.savebtn:
                    detailAddressName = detail_address_edit.getText().toString();
                    if(wi == 0  || gi == 0){
                        Toast.makeText(getApplicationContext(), "" + "주소를 가져오지 못했습니다.", Toast.LENGTH_SHORT).show();
                        return;
                    }else if(addressName.equals("") || detailAddressName.equals("")){
                        Toast.makeText(getApplicationContext(), "" + "주소를 가져오지 못했습니다.", Toast.LENGTH_SHORT).show();
                        return;
                    }
                    customProgressPop();
                    map.clear();
                    map.put("url", DEFINE.SERVER_URL + DEFINE.MEMBER_MAP_UPDATE);
                    map.put("key_index", "" + Check_Preferences.getAppPreferences(getApplicationContext() , "KEYINDEX"));
                    map.put("wi", "" + wi);
                    map.put("gi", "" + gi);
                    map.put("address", "" + addressName + " " + detailAddressName);

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
    /* MapViewEventListener */
    @Override
    public void onMapViewInitialized(MapView mapView) {
    }

    @Override
    public void onMapViewDragStarted(MapView mapView, MapPoint mapPoint) {
    }

    @Override
    public void onMapViewDragEnded(MapView mapView, MapPoint mapPoint) {
    }

    @Override
    public void onMapViewSingleTapped(MapView mapView, MapPoint mapPoint) {
//        KaKaoMapUtils.getInstance().setSingleTapped(true);
    }

    @Override
    public void onMapViewDoubleTapped(MapView mapView, MapPoint mapPoint) {
    }

    @Override
    public void onMapViewLongPressed(MapView mapView, MapPoint mapPoint) {
    }

    @Override
    public void onMapViewCenterPointMoved(MapView mapView, MapPoint mapPoint) {
        Log.e("SKY" , "onMapViewCenterPointMoved :: " + mapPoint.getMapPointGeoCoord().latitude );
        Log.e("SKY" , "onMapViewCenterPointMoved :: " + mapPoint.getMapPointGeoCoord().longitude );

        List<Address> list = null;
        try {
            double d1 = mapPoint.getMapPointGeoCoord().latitude;
            double d2 = mapPoint.getMapPointGeoCoord().longitude;

            list = geocoder.getFromLocation(
                    d1, // 위도
                    d2, // 경도
                    10); // 얻어올 값의 개수
        } catch (IOException e) {
            e.printStackTrace();
            Log.e("SKY", "입출력 오류 - 서버에서 주소변환시 에러발생");
        }
        if (list != null) {
            if (list.size()==0) {
                Log.e("SKY" , "해당되는 주소 정보는 없습니다");
                wi = 0;
                gi = 0;
                addressName = "";
                detailAddressName = "";
                address_txt.setText("");
                detail_address_edit.setText("");
            } else {
                Log.e("SKY" , list.get(0).getAddressLine(0).toString());
                wi = mapPoint.getMapPointGeoCoord().latitude;
                gi = mapPoint.getMapPointGeoCoord().longitude;
                addressName = "" + list.get(0).getAddressLine(0).toString();
                address_txt.setText("" + list.get(0).getAddressLine(0).toString());

            }
        }




    }

    @Override
    public void onMapViewZoomLevelChanged(MapView mapView, int i) {
    }

    @Override
    public void onMapViewMoveFinished(MapView mapView, MapPoint mapPoint) {
        Log.e("SKY" , "onMapViewMoveFinished" );
//        if (KaKaoMapUtils.getInstance().isSingleTapped()) {
//            KaKaoMapUtils.getInstance().setSingleTapped(false);
//        } else {
//            getViewModel().setLatitude(mapPoint.getMapPointGeoCoord().latitude);
//            getViewModel().setLongitude(mapPoint.getMapPointGeoCoord().longitude);
//
//            getBaseActivity().showProgress(true);
//            getViewModel().sendCoordToAddress();
//        }
    }
    /* MapViewEventListener */

    /* GpsOffListener */
    /* GpsOffListener */
}
