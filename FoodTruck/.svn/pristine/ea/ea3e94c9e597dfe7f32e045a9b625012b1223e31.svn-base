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
import co.kr.sky.foodtruck.obj.MenuObj;
import co.kr.sky.foodtruck.obj.OrderListObj;


public class OrderListAdapter extends BaseAdapter {

    private Activity activity;
    private static LayoutInflater inflater = null;
    ArrayList<OrderListObj> items;
    CommonUtil dataSet = CommonUtil.getInstance();

    public OrderListAdapter(Activity a, ArrayList<OrderListObj> m_board) {
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
        TextView item_food_nm , item_date , item_body;
    }

    public View getView(final int position, View convertView, ViewGroup parent) {
        final OrderListObj board = items.get(position);
        ViewHolder vh = new ViewHolder();
        if (convertView == null) {
            convertView = inflater.inflate(R.layout.orderilist_item, null);
            vh.item_food_nm         = (TextView) convertView.findViewById(R.id.item_food_nm);
            vh.item_date         = (TextView) convertView.findViewById(R.id.item_date);
            vh.item_body         = (TextView) convertView.findViewById(R.id.item_body);
            convertView.setTag(vh);
        } else {
            vh = (ViewHolder) convertView.getTag();
        }



        vh.item_food_nm.setText(board.getNAME());
        vh.item_date.setText(board.getDATE());
        vh.item_body.setText(board.getM_NAME()  + ": "+ board.getPRICE() + "원");

        return convertView;
    }


}