package co.kr.sky.foodtruck.common;

import android.app.Activity;
import android.content.Context;
import android.content.SharedPreferences;
import android.util.Log;

import java.util.Map;


public class Check_Preferences{
    public static void setAppPreferences(Activity context, String key, String value)
    {
        SharedPreferences pref = null;
        pref = context.getSharedPreferences("SKY", context.MODE_PRIVATE);
        SharedPreferences.Editor prefEditor = pref.edit();
        prefEditor.putString(key, value);
        prefEditor.commit();
    }
    public static void setAppPreferences(Context context, String key, String value)
    {
        SharedPreferences pref = null;
        pref = context.getSharedPreferences("SKY", context.MODE_PRIVATE);
        SharedPreferences.Editor prefEditor = pref.edit();
        prefEditor.putString(key, value);
        prefEditor.commit();
    }
    public static void setAppPreferences(Activity context, String key, Boolean value)
    {
        SharedPreferences pref = null;
        pref = context.getSharedPreferences("SKY", context.MODE_PRIVATE);
        SharedPreferences.Editor prefEditor = pref.edit();
        prefEditor.putBoolean(key, value);
        prefEditor.commit();
    }
    public static String getAppPreferences(Context context, String key)
    {
        String returnValue = null;
        SharedPreferences pref = null;
        pref = context.getSharedPreferences("SKY", context.MODE_PRIVATE);
        returnValue = pref.getString(key, "");
        return returnValue;
    }
    public static Boolean getAppPreferencesboolean(Context context, String key)
    {
        Boolean returnValue = false;
        SharedPreferences pref = null;
        pref = context.getSharedPreferences("SKY", context.MODE_PRIVATE);
        returnValue = pref.getBoolean(key, false);
        return returnValue;
    }
    public static Boolean getAppPreferencesbooleanfirst(Context context, String key)
    {
        Boolean returnValue = false;
        SharedPreferences pref = null;
        pref = context.getSharedPreferences("SKY", context.MODE_PRIVATE);
        returnValue = pref.getBoolean(key, true);
        return returnValue;
    }
    public static void setDBVersion(Activity context, String version, String value)
    {
        SharedPreferences pref = null;
        pref = context.getSharedPreferences("SKY", context.MODE_PRIVATE);
        SharedPreferences.Editor prefEditor = pref.edit();
        prefEditor.putString(version, value);
        prefEditor.commit();
    }

    public static String getDBVersion(Context context, String version)
    {
        String returnValue = null;
        SharedPreferences pref = null;
        pref = context.getSharedPreferences("SKY", context.MODE_PRIVATE);
        returnValue = pref.getString(version, "");
        return returnValue;
    }


    public static void RemoveAll(Context context){
        SharedPreferences pref = null;
        pref = context.getSharedPreferences("SKY", context.MODE_PRIVATE);

        Map<String,?> keys = pref.getAll();

        for(Map.Entry<String,?> entry : keys.entrySet()){
            Log.e("SKY",entry.getKey() + ": " +entry.getValue().toString());
            SharedPreferences pref00 = null;
        }
        SharedPreferences.Editor prefEditor = pref.edit();
        prefEditor.clear();
        prefEditor.commit();
    }

}
