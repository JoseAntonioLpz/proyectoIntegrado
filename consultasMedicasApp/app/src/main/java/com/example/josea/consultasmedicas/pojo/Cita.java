package com.example.josea.consultasmedicas.pojo;

import android.os.Parcel;
import android.os.Parcelable;

import java.util.Date;

/**
 * Created by josea on 23/05/2017.
 */

public class Cita implements Parcelable{

    private int id;
    private String seguridadSocial;
    private String type;
    private String reason;
    private String telephone;
    private Date fecha;

    public Cita(int id, String seguridadSocial, String type, String reason, String telephone, Date fecha) {
        this.id = id;
        this.seguridadSocial = seguridadSocial;
        this.type = type;
        this.reason = reason;
        this.telephone = telephone;
        this.fecha = fecha;
    }

    public Cita(){}

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getSeguridadSocial() {
        return seguridadSocial;
    }

    public void setSeguridadSocial(String seguridadSocial) {
        this.seguridadSocial = seguridadSocial;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    public String getReason() {
        return reason;
    }

    public void setReason(String reason) {
        this.reason = reason;
    }

    public String getTelephone() {
        return telephone;
    }

    public void setTelephone(String telephone) {
        this.telephone = telephone;
    }

    public Date getFecha() {
        return fecha;
    }

    public void setFecha(Date fecha) {
        this.fecha = fecha;
    }

    @Override
    public String toString() {
        return "Cita{" +
                "id=" + id +
                ", seguridadSocial='" + seguridadSocial + '\'' +
                ", type='" + type + '\'' +
                ", reason='" + reason + '\'' +
                ", telephone='" + telephone + '\'' +
                ", fecha=" + fecha +
                '}';
    }

    @Override
    public int describeContents() {
        return 0;
    }

    @Override
    public void writeToParcel(Parcel dest, int flags) {
        dest.writeInt(id);
        dest.writeString(seguridadSocial);
        dest.writeString(type);
        dest.writeString(reason);
        dest.writeString(telephone);
        dest.writeString(fecha.toString());
    }
    protected Cita(Parcel in) {
        id = in.readInt();
        seguridadSocial = in.readString();
        type = in.readString();
        reason = in.readString();
        telephone = in.readString();
        fecha = new Date();

    }

    public static final Creator<Cita> CREATOR = new Creator<Cita>() {
        @Override
        public Cita createFromParcel(Parcel in) {
            return new Cita(in);
        }

        @Override
        public Cita[] newArray(int size) {
            return new Cita[size];
        }
    };
}
