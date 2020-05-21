package co.kr.sky.foodtruck.obj;


import android.os.Parcel;
import android.os.Parcelable;

public class OrderListObj implements Parcelable {

    public static Creator<OrderListObj> getCreator() {
        return CREATOR;
    }

    String NAME;
    String DATE;
    String M_NAME;
    String PRICE;

    public OrderListObj(String NAME, String DATE, String m_NAME, String PRICE) {
        this.NAME = NAME;
        this.DATE = DATE;
        M_NAME = m_NAME;
        this.PRICE = PRICE;
    }

    public String getNAME() {
        return NAME;
    }

    public void setNAME(String NAME) {
        this.NAME = NAME;
    }

    public String getDATE() {
        return DATE;
    }

    public void setDATE(String DATE) {
        this.DATE = DATE;
    }

    public String getM_NAME() {
        return M_NAME;
    }

    public void setM_NAME(String m_NAME) {
        M_NAME = m_NAME;
    }

    public String getPRICE() {
        return PRICE;
    }

    public void setPRICE(String PRICE) {
        this.PRICE = PRICE;
    }

    public OrderListObj(Parcel in) {
        readFromParcel(in);
    }
    @Override
    public void writeToParcel(Parcel dest, int flags) {

        dest.writeString(NAME);
        dest.writeString(DATE);
        dest.writeString(M_NAME);
        dest.writeString(PRICE);

    }
    private void readFromParcel(Parcel in){

        NAME= in.readString();
        DATE= in.readString();
        M_NAME= in.readString();
        PRICE= in.readString();

    }
    @SuppressWarnings("rawtypes")
    public static final Creator<OrderListObj> CREATOR = new Creator() {
        public Object createFromParcel(Parcel in) {
            return new OrderListObj(in);
        }

        public Object[] newArray(int size) {
            return new OrderListObj[size];
        }
    };

    @Override
    public int describeContents() {
        // TODO Auto-generated method stub
        return 0;
    }
}

