package co.kr.sky.foodtruck.obj;


import android.os.Parcel;
import android.os.Parcelable;

public class MemberObj implements Parcelable {

    public static Creator<MemberObj> getCreator() {
        return CREATOR;
    }


    String KEYINDEX;
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

    public MemberObj(String KEYINDEX, String ID, String PW, String NAME, String PHONE, String SHOP_KEEPER, String IMG, String EMAIL, String KEEPER_YN, String ADDRESS, String WI, String GI, String INTRODUCE, String POINT) {
        this.KEYINDEX = KEYINDEX;
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

    public MemberObj(Parcel in) {
        readFromParcel(in);
    }
    @Override
    public void writeToParcel(Parcel dest, int flags) {

        dest.writeString(KEYINDEX);
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
    public static final Creator<MemberObj> CREATOR = new Creator() {
        public Object createFromParcel(Parcel in) {
            return new MemberObj(in);
        }

        public Object[] newArray(int size) {
            return new MemberObj[size];
        }
    };

    @Override
    public int describeContents() {
        // TODO Auto-generated method stub
        return 0;
    }
}

