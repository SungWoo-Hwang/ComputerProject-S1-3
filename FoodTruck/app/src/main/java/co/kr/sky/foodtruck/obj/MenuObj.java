package co.kr.sky.foodtruck.obj;


import android.os.Parcel;
import android.os.Parcelable;

public class MenuObj implements Parcelable {

    public static Creator<MenuObj> getCreator() {
        return CREATOR;
    }

    String KEYINDEX;
    String M_KEYINDEX;
    String NAME;
    String PRICE;

    public MenuObj(String KEYINDEX, String m_KEYINDEX, String NAME, String PRICE) {
        this.KEYINDEX = KEYINDEX;
        M_KEYINDEX = m_KEYINDEX;
        this.NAME = NAME;
        this.PRICE = PRICE;
    }

    public String getKEYINDEX() {
        return KEYINDEX;
    }

    public void setKEYINDEX(String KEYINDEX) {
        this.KEYINDEX = KEYINDEX;
    }

    public String getM_KEYINDEX() {
        return M_KEYINDEX;
    }

    public void setM_KEYINDEX(String m_KEYINDEX) {
        M_KEYINDEX = m_KEYINDEX;
    }

    public String getNAME() {
        return NAME;
    }

    public void setNAME(String NAME) {
        this.NAME = NAME;
    }

    public String getPRICE() {
        return PRICE;
    }

    public void setPRICE(String PRICE) {
        this.PRICE = PRICE;
    }

    public MenuObj(Parcel in) {
        readFromParcel(in);
    }
    @Override
    public void writeToParcel(Parcel dest, int flags) {

        dest.writeString(KEYINDEX);
        dest.writeString(M_KEYINDEX);
        dest.writeString(NAME);
        dest.writeString(PRICE);

    }
    private void readFromParcel(Parcel in){

        KEYINDEX= in.readString();
        M_KEYINDEX= in.readString();
        NAME= in.readString();
        PRICE= in.readString();
    }
    @SuppressWarnings("rawtypes")
    public static final Creator<MenuObj> CREATOR = new Creator() {
        public Object createFromParcel(Parcel in) {
            return new MenuObj(in);
        }

        public Object[] newArray(int size) {
            return new MenuObj[size];
        }
    };

    @Override
    public int describeContents() {
        // TODO Auto-generated method stub
        return 0;
    }
}

