package co.kr.sky.foodtruck.obj;


import android.os.Parcel;
import android.os.Parcelable;

public class HoogiObj implements Parcelable {

    public static Creator<HoogiObj> getCreator() {
        return CREATOR;
    }

    String KEYINDEX;
    String M_KEYINDEX;
    String K_KEYINDEX;
    String REVIEW;
    String DATE;
    String ID;
    String PW;
    String NAME;
    String PHONE;
    String SHOP_KEEPER;
    String IMG;
    String EMAIL;
    String KEEPER_YN;
    String ADDRESS;
    String WI;
    String GI;
    String INTRODUCE;
    String POINT;

    public HoogiObj(String KEYINDEX, String m_KEYINDEX, String k_KEYINDEX, String REVIEW, String DATE, String ID, String PW, String NAME, String PHONE, String SHOP_KEEPER, String IMG, String EMAIL, String KEEPER_YN, String ADDRESS, String WI, String GI, String INTRODUCE, String POINT) {
        this.KEYINDEX = KEYINDEX;
        M_KEYINDEX = m_KEYINDEX;
        K_KEYINDEX = k_KEYINDEX;
        this.REVIEW = REVIEW;
        this.DATE = DATE;
        this.ID = ID;
        this.PW = PW;
        this.NAME = NAME;
        this.PHONE = PHONE;
        this.SHOP_KEEPER = SHOP_KEEPER;
        this.IMG = IMG;
        this.EMAIL = EMAIL;
        this.KEEPER_YN = KEEPER_YN;
        this.ADDRESS = ADDRESS;
        this.WI = WI;
        this.GI = GI;
        this.INTRODUCE = INTRODUCE;
        this.POINT = POINT;
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

    public String getK_KEYINDEX() {
        return K_KEYINDEX;
    }

    public void setK_KEYINDEX(String k_KEYINDEX) {
        K_KEYINDEX = k_KEYINDEX;
    }

    public String getREVIEW() {
        return REVIEW;
    }

    public void setREVIEW(String REVIEW) {
        this.REVIEW = REVIEW;
    }

    public String getDATE() {
        return DATE;
    }

    public void setDATE(String DATE) {
        this.DATE = DATE;
    }

    public String getID() {
        return ID;
    }

    public void setID(String ID) {
        this.ID = ID;
    }

    public String getPW() {
        return PW;
    }

    public void setPW(String PW) {
        this.PW = PW;
    }

    public String getNAME() {
        return NAME;
    }

    public void setNAME(String NAME) {
        this.NAME = NAME;
    }

    public String getPHONE() {
        return PHONE;
    }

    public void setPHONE(String PHONE) {
        this.PHONE = PHONE;
    }

    public String getSHOP_KEEPER() {
        return SHOP_KEEPER;
    }

    public void setSHOP_KEEPER(String SHOP_KEEPER) {
        this.SHOP_KEEPER = SHOP_KEEPER;
    }

    public String getIMG() {
        return IMG;
    }

    public void setIMG(String IMG) {
        this.IMG = IMG;
    }

    public String getEMAIL() {
        return EMAIL;
    }

    public void setEMAIL(String EMAIL) {
        this.EMAIL = EMAIL;
    }

    public String getKEEPER_YN() {
        return KEEPER_YN;
    }

    public void setKEEPER_YN(String KEEPER_YN) {
        this.KEEPER_YN = KEEPER_YN;
    }

    public String getADDRESS() {
        return ADDRESS;
    }

    public void setADDRESS(String ADDRESS) {
        this.ADDRESS = ADDRESS;
    }

    public String getWI() {
        return WI;
    }

    public void setWI(String WI) {
        this.WI = WI;
    }

    public String getGI() {
        return GI;
    }

    public void setGI(String GI) {
        this.GI = GI;
    }

    public String getINTRODUCE() {
        return INTRODUCE;
    }

    public void setINTRODUCE(String INTRODUCE) {
        this.INTRODUCE = INTRODUCE;
    }

    public String getPOINT() {
        return POINT;
    }

    public void setPOINT(String POINT) {
        this.POINT = POINT;
    }

    public HoogiObj(Parcel in) {
        readFromParcel(in);
    }
    @Override
    public void writeToParcel(Parcel dest, int flags) {

        dest.writeString(KEYINDEX);
        dest.writeString(M_KEYINDEX);
        dest.writeString(K_KEYINDEX);
        dest.writeString(REVIEW);
        dest.writeString(DATE);
        dest.writeString(ID);
        dest.writeString(PW);
        dest.writeString(NAME);
        dest.writeString(PHONE);
        dest.writeString(SHOP_KEEPER);
        dest.writeString(IMG);
        dest.writeString(EMAIL);
        dest.writeString(KEEPER_YN);
        dest.writeString(ADDRESS);
        dest.writeString(WI);
        dest.writeString(GI);
        dest.writeString(INTRODUCE);
        dest.writeString(POINT);

    }
    private void readFromParcel(Parcel in){

        KEYINDEX= in.readString();
        M_KEYINDEX= in.readString();
        K_KEYINDEX= in.readString();
        REVIEW= in.readString();
        DATE= in.readString();
        ID= in.readString();
        PW= in.readString();
        NAME= in.readString();
        PHONE= in.readString();
        SHOP_KEEPER= in.readString();
        IMG= in.readString();
        EMAIL= in.readString();
        KEEPER_YN= in.readString();
        ADDRESS= in.readString();
        WI= in.readString();
        GI= in.readString();
        INTRODUCE= in.readString();
        POINT= in.readString();
    }
    @SuppressWarnings("rawtypes")
    public static final Creator<HoogiObj> CREATOR = new Creator() {
        public Object createFromParcel(Parcel in) {
            return new HoogiObj(in);
        }

        public Object[] newArray(int size) {
            return new HoogiObj[size];
        }
    };

    @Override
    public int describeContents() {
        // TODO Auto-generated method stub
        return 0;
    }
}

