package co.kr.sky.foodtruck.customer;

import android.content.Intent;
import android.location.Geocoder;
import android.os.Bundle;
import android.os.Handler;
import android.os.Message;
import android.util.Log;
import android.view.View;
import android.widget.Button;
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
import co.kr.sky.foodtruck.IntroduceActivity;
import co.kr.sky.foodtruck.JoinActivity;
import co.kr.sky.foodtruck.MapActivity;
import co.kr.sky.foodtruck.MenuInfoInputActivity;
import co.kr.sky.foodtruck.OrderListActivity;
import co.kr.sky.foodtruck.R;
import co.kr.sky.foodtruck.ReviewActivity;
import co.kr.sky.foodtruck.common.ActivityEx;
import co.kr.sky.foodtruck.common.Check_Preferences;
import co.kr.sky.foodtruck.common.DEFINE;
import co.kr.sky.foodtruck.obj.MemberObj;

public class CustomerMainActivity extends ActivityEx implements MapView.POIItemEventListener{

    final Geocoder geocoder = new Geocoder(this);

    private Map<String, String> map = new HashMap<String, String>();
    private AccumThread mThread;
    ArrayList<MemberObj> arr = new ArrayList<MemberObj>();
    private MapView mapview;

    private Button btn7;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_customermain);

        init();
        SelectMapApi();
    }

    private void init(){
        mapview = (MapView)findViewById(R.id.mapview);
        mapview.setPOIItemEventListener(poiItemEventListener);

        findViewById(R.id.btn__1).setOnClickListener(btnListener);
        findViewById(R.id.btn__2).setOnClickListener(btnListener);
        findViewById(R.id.btn__3).setOnClickListener(btnListener);

    }
    private void SelectMapApi(){

        customProgressPop();
        map.clear();
        map.put("url", DEFINE.SERVER_URL + DEFINE.CUSTOMER_SEL_MAP);

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
                            if (!resultListObject.getString("WI").equals("")){
                                MemberObj item = new MemberObj(
                                        resultListObject.getString("KEYINDEX"),
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

                                double wi = Double.parseDouble(resultListObject.getString("WI"));
                                double gi = Double.parseDouble(resultListObject.getString("GI"));
                                Log.e("SKY" , "wi :: " + wi);

                                MapPoint mapPoint = MapPoint.mapPointWithGeoCoord(wi, gi);
                                MapPOIItem customMarker = new MapPOIItem();
                                customMarker.setItemName(resultListObject.getString("NAME"));
                                customMarker.setTag(i);
                                customMarker.setMapPoint(mapPoint);
                                customMarker.setMarkerType(MapPOIItem.MarkerType.CustomImage); // 마커타입을 커스텀 마커로 지정.
                                customMarker.setCustomImageResourceId(R.drawable.pin); // 마커 이미지.
                                customMarker.setCustomImageAutoscale(false); // hdpi, xhdpi 등 안드로이드 플랫폼의 스케일을 사용할 경우 지도 라이브러리의 스케일 기능을 꺼줌.
                                customMarker.setCustomImageAnchor(0.5f, 1.0f); // 마커 이미지중 기준이 되는 위치(앵커포인트) 지정 - 마커 이미지 좌측 상단 기준 x(0.0f ~ 1.0f), y(0.0f ~ 1.0f) 값.
                                mapview.addPOIItem(customMarker);

                            }
                        }
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
                    break;
                case R.id.btn__2:
                    startActivity(new Intent(getApplicationContext() , CustomerOrderActivity.class));
                    finish();
                    break;
                case R.id.btn__3:
                    startActivity(new Intent(getApplicationContext() , CustomerMyInfoActivity.class));
                    finish();
                    break;

            }
        }
    };
    @Override
    public void onPOIItemSelected(MapView mapView, MapPOIItem mapPOIItem) {
        Log.e("SKY" , "onPOIItemSelected :: " + mapPOIItem.getTag());
    }

    @Override
    public void onCalloutBalloonOfPOIItemTouched(MapView mapView, MapPOIItem mapPOIItem) {
        Log.e("SKY" , "onCalloutBalloonOfPOIItemTouched" + mapPOIItem.getTag());

    }

    @Override
    public void onCalloutBalloonOfPOIItemTouched(MapView mapView, MapPOIItem mapPOIItem, MapPOIItem.CalloutBalloonButtonType calloutBalloonButtonType) {
        Log.e("SKY" , "onCalloutBalloonOfPOIItemTouched");

    }

    @Override
    public void onDraggablePOIItemMoved(MapView mapView, MapPOIItem mapPOIItem, MapPoint mapPoint) {
        Log.e("SKY" , "onDraggablePOIItemMoved");

    }
    private MapView.POIItemEventListener poiItemEventListener = new MapView.POIItemEventListener() {
        @Override
        public void onPOIItemSelected(MapView mapView, MapPOIItem mapPOIItem) {
            //sample code 없음
            Log.e("111111111111111","진입");
        }

        @Override
        public void onCalloutBalloonOfPOIItemTouched(MapView mapView, MapPOIItem mapPOIItem) {
            Log.e("2222222222222222","진입 :: " + mapPOIItem.getTag());
            Intent it = new Intent(getApplicationContext() , FoodTruckInfoActivity.class);
            it.putExtra("obj" , arr.get(mapPOIItem.getTag()));
            startActivity(it);
        }

        @Override
        public void onCalloutBalloonOfPOIItemTouched(MapView mapView, MapPOIItem mapPOIItem, MapPOIItem.CalloutBalloonButtonType calloutBalloonButtonType) {
            //sample code 없음
            Log.e("333333333333","진입");
        }

        @Override
        public void onDraggablePOIItemMoved(MapView mapView, MapPOIItem mapPOIItem, MapPoint mapPoint) {
            //sample code 없음
            Log.e("444444444444444","진입");
        }
    };

}
