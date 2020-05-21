package co.kr.sky.foodtruck.adapter;

import android.app.Activity;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import java.util.ArrayList;

import co.kr.sky.foodtruck.R;
import co.kr.sky.foodtruck.common.CommonUtil;
import co.kr.sky.foodtruck.obj.HoogiObj;
import co.kr.sky.foodtruck.obj.MenuObj;


public class MenuListAdapter extends BaseAdapter {

    private Activity activity;
    private static LayoutInflater inflater = null;
    ArrayList<MenuObj> items;
    CommonUtil dataSet = CommonUtil.getInstance();

    public MenuListAdapter(Activity a, ArrayList<MenuObj> m_board) {
        activity = a;
        inflater = (LayoutInflater) activity.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        items = m_board;

    }

    public int getCount() {
        return items.size();
    }

    public Object getItem(int position) {
        return position;
    }

    public long getItemId(int position) {
        return position;
    }

    static class ViewHolder {
        TextView item_id , item_price;
    }

    public View getView(final int position, View convertView, ViewGroup parent) {
        final MenuObj board = items.get(position);
        ViewHolder vh = new ViewHolder();
        if (convertView == null) {
            convertView = inflater.inflate(R.layout.menulist_item, null);
            vh.item_id         = (TextView) convertView.findViewById(R.id.item_id);
            vh.item_price         = (TextView) convertView.findViewById(R.id.item_price);
            convertView.setTag(vh);
        } else {
            vh = (ViewHolder) convertView.getTag();
        }



        vh.item_id.setText(board.getNAME());
        vh.item_price.setText(board.getPRICE() + "원");

        return convertView;
    }


}